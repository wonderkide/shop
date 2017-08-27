<?php
namespace frontend\components\widgets;

use yii\base\Widget;
use common\models\Product;
use common\models\ProductDetail;

class ProductNew extends Widget {
    //public $log = null;

    public function init() {

    }

    public function run() {

        $new = Product::find()->where(['group' => 1])->all();
        return $this->render('ProductNew', 
                [
                    'new' => $new,
                ]);
    }
    
    public function getFirstIMG($id){
        $model = ProductDetail::find()->where(['id_product' => $id])->one();
        if($model){
            return json_decode($model->images)[0];
        }
        return null;
    }
    public function getColor($id) {
        $model = ProductDetail::find(['id', 'color'])->where(['id_product' => $id])->all();
        if($model){
            $color = [];
            foreach ($model as $key => $row) {
                //array_push($color, $row->color);
                $color[$key] = $row->color;
            }
            return $color;
        }
        return null;
    }
    public function getIMG($param) {
        
    }


}
