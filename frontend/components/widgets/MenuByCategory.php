<?php
namespace frontend\components\widgets;

use Yii;
use yii\base\Widget;
use common\models\ProductCategory;

class MenuByCategory extends Widget {
    //public $log = null;

    public function init() {

    }

    public function run() {

        $model = ProductCategory::find()->where(['on_menu' => 1, 'parent' => 0])->orderBy(['sort'=>SORT_ASC])->all();
        return $this->render('MenuByCategory', 
                [
                    'model' => $model,
                ]);
    }
    
    public function findParent($id){
        $model = ProductCategory::find()->where(['on_menu' => 1, 'parent' => $id])->limit(4)->orderBy(['sort'=>SORT_ASC])->all();
        if($model){
            return $model;
        }
        return null;
    }
    
    public function checkActive($action) {
        if(Yii::$app->controller->action->controller->id == 'product' && Yii::$app->controller->action->id == 'category'){
            if(Yii::$app->controller->action->controller->id.'/'.Yii::$app->controller->action->id.'/'.Yii::$app->controller->action->controller->actionParams["slug"]==$action){
                return 'active';
            }
        }
        else{
            if(Yii::$app->controller->action->controller->id.'/'.Yii::$app->controller->action->id == $action){
                return 'active';
            }
        }
        return;
    }


}
