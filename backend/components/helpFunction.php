<?php
namespace backend\components;

use yii\helpers\Url;

class helpFunction{
    public function getFrontendUrl() {
        $home = Url::home(true);
        $baseUrl = str_replace("admin","www",$home);
        return $baseUrl;
    }
}