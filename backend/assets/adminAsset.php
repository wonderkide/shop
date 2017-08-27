<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class adminAsset extends AssetBundle
{
    public $sourcePath = '@admAsset';
    
    public $css = [
        'css/main.css',
        //'css/flexslider.css',
        //'css/flexslider1.css',
        //'css/jquery-ui.css',
        //'css/animate.min.css',
        //'css/style-update.css',
    ];
    public $js = [
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    
    public function init() {
        $this->publishOptions['forceCopy'] = (YII_ENV == 'dev') ? TRUE : FALSE;
        parent::init();
    }
}
