<?php

namespace backend\components;

use Yii;
use yii\base\Object;
use yii\imagine\Image;
use yii\helpers\Html;

class UploadFile extends Object{
    public $name;
    public $tempName;
    public $type;
    public $size;
    public $error;
    
    public static $cool_extensions = Array('jpg','png','gif');
    private static $_files;

    public function __toString()
    {
        return $this->name;
    }
    
    public static function getInstance($model, $attribute)
    {
        $name = Html::getInputName($model, $attribute);
        return static::getInstanceByName($name);
    }
    
    public static function getInstances($model, $attribute)
    {
        $name = Html::getInputName($model, $attribute);
        return static::getInstancesByName($name);
    }
    
    public static function getInstanceByName($name)
    {
        $files = self::loadFiles();
        return isset($files[$name]) ? new static($files[$name]) : null;
    }
    
    public static function getInstancesByName($name)
    {
        $files = self::loadFiles();
        if (isset($files[$name])) {
            return [new static($files[$name])];
        }
        $results = [];
        foreach ($files as $key => $file) {
            if (strpos($key, "{$name}[") === 0) {
                $results[] = new static($file);
            }
        }
        return $results;
    }
    public static function reset()
    {
        self::$_files = null;
    }
    public function saveAs($file, $deleteTempFile = true)
    {
        if ($this->error == UPLOAD_ERR_OK) {
            if ($deleteTempFile) {
                return move_uploaded_file($this->tempName, $file);
            } elseif (is_uploaded_file($this->tempName)) {
                return copy($this->tempName, $file);
            }
        }
        return false;
    }
    
    /**
     * @return string original file base name
     */
    public function getBaseName()
    {
        // https://github.com/yiisoft/yii2/issues/11012
        $pathInfo = pathinfo('_' . $this->name, PATHINFO_FILENAME);
        return mb_substr($pathInfo, 1, mb_strlen($pathInfo, '8bit'), '8bit');
    }

    /**
     * @return string file extension
     */
    public function getExtension()
    {
        return strtolower(pathinfo($this->name, PATHINFO_EXTENSION));
    }

    /**
     * @return bool whether there is an error with the uploaded file.
     * Check [[error]] for detailed error code information.
     */
    public function getHasError()
    {
        return $this->error != UPLOAD_ERR_OK;
    }
    
    
    private static function loadFiles()
    {
        if (self::$_files === null) {
            self::$_files = [];
            if (isset($_FILES) && is_array($_FILES)) {
                foreach ($_FILES as $class => $info) {
                    self::loadFilesRecursive($class, $info['name'], $info['tmp_name'], $info['type'], $info['size'], $info['error']);
                }
            }
        }
        return self::$_files;
    }
    private static function loadFilesRecursive($key, $names, $tempNames, $types, $sizes, $errors)
    {
        if (is_array($names)) {
            foreach ($names as $i => $name) {
                self::loadFilesRecursive($key . '[' . $i . ']', $name, $tempNames[$i], $types[$i], $sizes[$i], $errors[$i]);
            }
        } elseif ((int)$errors !== UPLOAD_ERR_NO_FILE) {
            self::$_files[$key] = [
                'name' => $names,
                'tempName' => $tempNames,
                'type' => $types,
                'size' => $sizes,
                'error' => $errors,
            ];
        }
    }
    
    public static function upload($img, $dir, $width=400, $height=400, $tmb=true)
    {
        /*$img = self::getInstancesByName($name);
        if(!$img){
            return null;
        }*/
        $alias = Yii::getAlias('@fweb');
        $dir = '/uploads/' . $dir . '/';
        $fullPath = $alias.$dir;
        self::checkDir($fullPath);
        $path = [];
        if (is_array($img)) {
            foreach ($img as $file) {
                if (in_array($file->extension, self::$cool_extensions)){
                    $fileName = UploadFile::random_string(20) . '.' . $file->extension;
                    $absolutePath = $dir . $fileName;
                    array_push($path, $absolutePath);
                    $file->saveAs($fullPath . $fileName);
                    if($tmb){
                        self::createThumbnail($fullPath, $fileName, $width, $height);
                    }
                }
            }
            return $path;
        } else {
            if (in_array($file->extension, self::$cool_extensions)){
                $fileName = UploadFile::random_string(20) . '.' . $file->extension;
                $absolutePath = $dir . $fileName;
                array_push($path, $absolutePath);
                $file->saveAs($fullPath . $fileName);
                if($tmb){
                    self::createThumbnail($fullPath, $fileName, $width, $height);
                }
            }
            return $path;
        }
        return false;
    }
    
    public static function removeIMG($img) {
        if(is_array($img)){
            $alias = Yii::getAlias('@fweb');
            foreach ($img as $row) {
                if(file_exists(getcwd().$alias.$row)){
                    unlink(getcwd().$alias.$row);
                }
            }
        }
    }
    
    private static function checkDir($dir) {
        if(!is_dir($dir)){
            mkdir ($dir);
            chmod ($dir, 0777);
        }
    }
    
    function random_string($length) {
        $key = '';
        $keys = array_merge(range(0, 9), range('a', 'z'));

        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }

        return $key;
    }
    private static function createThumbnail($dir,$fileName, $width, $height){
        self::checkDir($dir.'thumbnails/');
        $file = $dir.$fileName;
        Image::thumbnail($file, $width, $height)->save($dir.'thumbnails/'.$fileName, ['quality' => 80]);
        return;
    }
    
}