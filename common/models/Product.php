<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "db_product".
 *
 * @property integer $id
 * @property string $name
 * @property string $detail
 * @property double $price
 * @property string $is_detail
 * @property string $size
 * @property string $color
 * @property string $image
 * @property integer $quantity
 * @property integer $category
 * @property integer $group
 * @property integer $status
 */
class Product extends \yii\db\ActiveRecord
{
    public $imageFile;
    /**
     * @inheritdoc
     */
    
    public static function tableName()
    {
        return 'db_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'price', /*'size', 'color', 'image', 'quantity',*/ 'category', 'group', 'status'], 'required'],
            [['detail', 'size', 'color', 'image'], 'string'],
            [['price'], 'number'],
            [['quantity', 'category', 'group', 'status'], 'integer'],
            [['name'], 'string', 'max' => 255],
            //[['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 10],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxFiles' => 10],
            ['imageFile', 'required', 'on' => 'new-detail']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'detail' => 'Detail',
            'price' => 'Price',
            'size' => 'Size',
            'color' => 'Color',
            'image' => 'Image',
            'quantity' => 'Quantity',
            'category' => 'Category',
            'group' => 'Group',
            'status' => 'Status',
            'is_detail' => 'รายละเอียดสินค้า',
        ];
    }
    
    public function upload($path)
    {
        //$path = [];
        if ($this->validate()) { 
            //foreach ($this->imageFile as $file) {
                //var_dump($file);exit();
                //$save = Yii::getAlias('uploads').'/product/' . Product::random_string(20) . '.' . $this->imageFile->extension;
                //array_push($path, $save);
                $this->imageFile->saveAs(Yii::getAlias('uploads').$path);
                //$this->imageFile = null;
            //}
            return true;
        } else {
            return false;
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

}
