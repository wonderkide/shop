<?php
namespace frontend\components\widgets;

use yii\base\Widget;
use common\models\MainMenu;

class mainMenuBlock extends Widget {
    //public $log = null;

    public function init() {

    }

    public function run() {

        $model = MainMenu::find()->where(['active' => 1, 'parent' => 0])->orderBy(['sort'=>SORT_ASC])->all();
        return $this->render('mainMenu', 
                [
                    'model' => $model,
                ]);
    }
    
    public function findParent($id){
        $model = MainMenu::find()->where(['active' => 1, 'parent' => $id])->limit(4)->orderBy(['sort'=>SORT_ASC])->all();
        if($model){
            return $model;
        }
        return null;
    }


}
