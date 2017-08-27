<?php

namespace frontend\controllers;

use Yii;
use common\models\Product;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;
use frontend\components\helpFunction;

/**
 * BlogController implements the CRUD actions for Blog model.
 */
class ProductController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            /*'access'=>[
                'class'=>AccessControl::className(),
                'denyCallback' => function ($rule, $action) {
                    throw new ForbiddenHttpException('คุณไม่ได้รับอนุญาติให้เข้าใช้งาน!');
                },
                'rules'=>[
                    [
                        'allow'=>true,
                        'actions'=>['index','view','create','update'],
                        'roles'=>['Author']
                    ],
                    [
                        'allow'=>true,
                        'actions'=>['delete'],
                        'roles'=>['Management']
                    ]
                ]
            ]*/
        ];
    }

    /**
     * Lists all Blog models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BlogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Blog();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionCategory($slug)
    {
        //var_dump($slug);
        //$this->findModel($id)->delete();

        return $this->render('category', [
                //'model' => $model,
            ]);
    }
    public function actionDetail($slug)
    {
        $color = null;
        $size = null;
        $img = null;
        if(isset($_GET['color']) && $_GET['color'] != ''){
            $color = '#' . $_GET['color'];
        }
        $model = $this->findModelSlug($slug);
        $check = json_decode($model->is_detail);
        if(empty($check)){
            $detail = null;
            $img = json_decode($model->image);
        }
        else{
            $detail = $this->getAllDetail($model->id);
            if(in_array("color", $check) && in_array("size", $check)){
                if($color){
                    $forColor = $this->getDetail($model->id, $color);
                    
                }
                else{
                    $forColor = $this->getDetail($model->id);
                }
                $size = json_decode($forColor->all);
                $img = json_decode($forColor->images);
                $color = $forColor->color;
                
            }
            else if(in_array("color", $check) && !in_array("size", $check)){
                if($color){
                    $forColor = $this->getDetail($model->id, $color);
                    
                }
                else{
                    $forColor = $this->getDetail($model->id);
                }
                //$size = json_decode($forColor->all);
                $img = json_decode($forColor->images);
                $color = $forColor->color;
            }
            else if(!in_array("color", $check) && in_array("size", $check)){
                $forSize = $this->getDetail($model->id);
                $size = json_decode($forSize->all);
                $img = json_decode($forSize->images);
            }
            
        }
        //var_dump($_GET['color']);exit();
        return $this->render('detail', [
                'model' => $model,
                'detail' => $detail,
                'size' => $size,
                'img' => $img,
                'color' => $color,
            ]);
    }

    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    protected function findModelSlug($name)
    {
        $name = helpFunction::removeSlugURL($name);
        if (($model = Product::find()->where(['name' => $name])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    protected function getAllDetail($id){
        $detail = \common\models\ProductDetail::findAll(['id_product' => $id]);
        return $detail;
    }
    protected function getDetail($id, $color=null) {
        if($color){
            $detail = \common\models\ProductDetail::findOne(['id_product' => $id, 'color' => $color]);
        }else{
            $detail = \common\models\ProductDetail::findOne(['id_product' => $id]);
        }
        if(!$detail){
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        return $detail;
    }
}
