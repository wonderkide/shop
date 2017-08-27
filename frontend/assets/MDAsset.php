<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class MDAsset extends AssetBundle
{
    //public $basePath = '@MDAsset';
    //public $baseUrl = '@web';
    public $sourcePath = '@MDAsset';
    public $css = [
        'css/style.css',
        //'css/flexslider.css',
        //'css/flexslider1.css',
        //'css/jquery-ui.css',
        'css/animate.min.css',
        'css/style-update.css',
    ];
    public $js = [
        'js/modernizr.custom.js',
        'js/simpleCart.min.js',
        'js/wow.min.js',
        'js/move-top.js',
        'js/easing.js',
        //'js/imagezoom.js',
        //'js/jquery-ui.js',
        'js/jquery.countdown.min.js',
        'js/jquery.flexslider.js',
        //'js/jquery.jscrollpane.min.js',
        //'js/jquery.mousewheel.js',
        'js/main.js',
        //'js/uisearch.js',
        //'js/cart.js',
        
        'js/bootstrap.js',
        'js/custom.js',
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
