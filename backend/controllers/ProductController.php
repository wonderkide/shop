<?php

namespace backend\controllers;

use Yii;
use common\models\Product;
use backend\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use frontend\components\helpFunction;
use common\models\ProductDetail;
use backend\components\UploadFile;

/**
 * ProductController implements the CRUD actions for Product model.
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
        ];
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();
        $group = $this->getGroup();
        $cat = $this->getCategory();
        $LockStatus = true;
        
        if ($model->load(Yii::$app->request->post())) {
            $detail = [];
            if(Yii::$app->request->post()["many-color"]){
                array_push($detail, "color");
            }
            if(Yii::$app->request->post()["many-size"]){
                array_push($detail, "size");
            }
            $model->is_detail = json_encode($detail);
            
            if($model->save()){
                return $this->redirect('/product/detail?id=' . $model->id);
            }
        }
        return $this->render('create', [
            'model' => $model,
            'group' => $group,
            'cat' => $cat,
            'status' => $LockStatus,
        ]);
        
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $group = $this->getGroup();
        $cat = $this->getCategory();
        
        $LockStatus = true;
        if($this->checkStatus($model)){
            $LockStatus = FALSE;
        }

        if ($model->load(Yii::$app->request->post())) {
            $detail = [];
            if(Yii::$app->request->post()["many-color"]){
                array_push($detail, "color");
            }
            if(Yii::$app->request->post()["many-size"]){
                array_push($detail, "size");
            }
            if($model->is_detail != json_encode($detail)){
                $model->is_detail = json_encode($detail);
                $model->status = 0;
            }
            if($model->save()){
                return $this->redirect(['index']);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'group' => $group,
                'cat' => $cat,
                'status' => $LockStatus,
            ]);
        }
    }
    
    protected function checkStatus($model) {
        $pDetail = json_decode($model->is_detail);
        if(in_array("color", $pDetail) && in_array("size", $pDetail)){
            $detail = ProductDetail::findAll(['id_product'=>$model->id]);
            if($detail){
                $flag = TRUE;
                foreach ($detail as $row) {
                    if(empty($row->images) || empty($row->all)){
                        $flag = FALSE;
                    }
                }
                return $flag;
            }
        }
        else if(in_array("color", $pDetail) && !in_array("size", $pDetail)){
            $detail = ProductDetail::findAll(['id_product'=>$model->id]);
            if($detail){
                $flag = TRUE;
                foreach ($detail as $row) {
                    if(empty($row->images) || !$row->quantity){
                        $flag = FALSE;
                    }
                }
                return $flag;
            }
        }
        else if(!in_array("color", $pDetail) && in_array("size", $pDetail)){
            $detail = ProductDetail::findOne(['id_product'=>$model->id]);
            if($detail && $detail->images && $detail->all){
                return TRUE;
            }
        }
        else{
            if($model->image && $model->quantity && $model->quantity > 0){
                return TRUE;
            }
        }
        return FALSE;
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if($model){
            $this->delDetail($id);
            $imgOld = json_decode($model->image);
            if($imgOld){
                UploadFile::removeIMG($imgOld);
            }
            $model->delete();
        }
        //$this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
    protected function delDetail($id) {
        $model = ProductDetail::findAll(['id_product'=>$id]);
        if($model){
            foreach ($model as $row) {
                $imgOld = json_decode($row->images);
                if($imgOld){
                    UploadFile::removeIMG($imgOld);
                }
                $row->delete();
            }
        }
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    protected function getGroup() {
        $model = \common\models\ProductGroup::findAll(['active'=>1]);
        if($model){
            return $this->genGroup($model);
        }
        return null;
    }
    
    protected function getCategory() {
        $model = \common\models\ProductCategory::findAll(['active'=>1, 'parent'=>0]);
        if($model){
            return $this->genCategory($model);
        }
        return null;
    }
    
    protected function genGroup($model) {
        $data = [];
        if($model){
            foreach ($model as $key => $row) {
                $data[$row->id] = $row->name;
            }
        }
        return $data;
    }
    protected function genCategory($model) {
        $data = [];
        if($model){
            foreach ($model as $key => $row) {
                $parent = \common\models\ProductCategory::findAll(['active'=>1, 'parent'=>$row->id]);
                if($parent){
                    foreach ($parent as $key2 => $prow) {
                        
                        $data[$row->name][$prow->id] = $prow->name;
                    }
                }
                else{
                    $data['Other'][$row->id] = $row->name;
                    //$data[$row->id] = $row->name;
                }
            }
        }
        //var_dump($data);exit();
        return $data;
    }
    
    public function actionDetail($id) {
        $model = ProductDetail::findAll(['id_product'=>$id]);
        $parent = $this->findModel($id);
        $count_old = count($model);
        $upload = ProductDetail::findOne(['id_product'=>$id]);
        if(!$upload){
            $upload = new ProductDetail();
        }
        /*if(!$model){
            $model = new ProductDetail();
        }*/
        if(isset($_GET['size'])){
            $active = 'size';
        }
        else{
            $active = 'color';
        }
        
        if (Yii::$app->request->post()) {
            $upload_dir = 'products';
            //$all_path = UploadFile::upload('imageFile', $upload_dir, 400, 500);
            
            //var_dump($all_path);exit();

            $colors = $_POST['pick_color'];
            $count_new = count($colors);
            if($count_new >= $count_old){
                foreach ($colors as $key => $row) {
                    if($count_old > 0){
                        
                        $ArrimgName = 'imageFile-' . $row;
                        $img = UploadFile::getInstancesByName($ArrimgName);
                        $all_path = UploadFile::upload($img, $upload_dir, 400, 500);
                        
                        $detail = ProductDetail::findOne($model[$key]->id);
                        if($all_path){
                            $imgOld = json_decode($detail->images);
                            if($imgOld){
                                UploadFile::removeIMG($imgOld);
                            }
                            $detail->images = json_encode($all_path);
                        }
                        
                        $detail->color = $row;
                        $detail->save();
                        $count_old -= 1;
                    }
                    else{
                        $ArrimgName = 'imageFile-' . $row;
                        $img = UploadFile::getInstancesByName($ArrimgName);
                        $all_path = UploadFile::upload($img, $upload_dir, 400, 500);
                        $detail = new ProductDetail();
                        $detail->id_product = $id;
                        $detail->color = $row;
                        $detail->images = json_encode($all_path);
                        $detail->save();
                    }
                }
            }
            else{
                
                foreach ($model as $key => $row) {
                    if($count_new > 0){
                        //var_dump($key);
                        
                        $ArrimgName = 'imageFile-' . $colors[$key];
                        //var_dump($_FILES);exit();
                        $img = UploadFile::getInstancesByName($ArrimgName);
                        $all_path = UploadFile::upload($img, $upload_dir, 400, 500);
                        if($all_path){
                            $imgOld = json_decode($row->images);
                            if($imgOld){
                                UploadFile::removeIMG($imgOld);
                            }
                            $row->images = json_encode($all_path);
                        }
                        $row->color = $colors[$key];
                        $row->save();
                        $count_new -= 1;
                    }
                    else{
                        $imgOld = json_decode($row->images);
                        if($imgOld){
                            UploadFile::removeIMG($imgOld);
                        }
                        $row->delete();
                    }
                }
            }
            return $this->redirect(['index']);
            //var_dump($_POST['pick_color']);exit();
        }
        //var_dump($model);
        return $this->render('detail', [
                'model' => $model,
                'parent' => $parent,
                'upload' => $upload,
                'active' => $active,
        ]);
    }
    
    public function actionSizeColor() {
        if (Yii::$app->request->post()) {
            if(isset(Yii::$app->request->post()["ProductDetail"])){
                $detail = Yii::$app->request->post()["ProductDetail"];
                foreach ($detail as $key => $value) {
                    //var_dump($value);exit();
                    $model = $this->findDetailModel($key);
                    if($model){
                        $model->all = json_encode($value);
                        $model->save();
                    }
                }
                return $this->redirect('/product/detail?id=' . $model->id_product . '&size=active');
            }
        }
        
        return $this->redirect(['index']);
    }
    
    public function actionQttColor($id) {
        $model = ProductDetail::findAll(['id_product'=>$id]);
        if (Yii::$app->request->post()) {
            foreach ($model as $key => $row) {
                if(isset(Yii::$app->request->post()["qtt-for-".$row->id]) && Yii::$app->request->post()["qtt-for-".$row->id] != ""){
                    $row->quantity = Yii::$app->request->post()["qtt-for-".$row->id];
                    $row->save();
                }
            }
            return $this->redirect('/product/detail?id=' . $id /*. '&size=active'*/);
        }
        $parent = $this->findModel($id);
        $upload = new ProductDetail();
        if(isset($_GET['size'])){
            $active = 'size';
        }
        else{
            $active = 'color';
        }
        return $this->render('detail', [
                'model' => $model,
                'parent' => $parent,
                'upload' => $upload,
                'active' => $active,
        ]);
    }
    
    public function actionUpdateSize($id) {
        $upload = ProductDetail::findOne(['id_product'=>$id]);
        if(!$upload){
            $upload = new ProductDetail();
            $upload->scenario = 'new-size';
            $upload->id_product = $id;
        }
        else{
            $upload->scenario = 'update-size';
        }
        if ($upload->load(Yii::$app->request->post())) {

                
            //var_dump($upload->size[0]);exit();
            if($upload->size[0]['size'] != '' && $upload->size[0]['qtt'] != ''){
                $upload->all = json_encode($upload->size);
            }
            $upload->size = null;
            $upload_dir = 'products';
            $upload->imageFile = UploadFile::getInstances($upload, 'imageFile');
            $all_path = UploadFile::upload($upload->imageFile, $upload_dir, 400, 500);
            if($all_path){
                $imgOld = json_decode($upload->images);
                if($imgOld){
                    UploadFile::removeIMG($imgOld);
                }
                $upload->images = json_encode($all_path);
            }

            if($upload->save()){
                return $this->redirect('/product/detail?id=' . $id);
            }
            
        }
        $model = ProductDetail::findAll(['id_product'=>$id]);
        $parent = $this->findModel($id);
        if(isset($_GET['size'])){
            $active = 'size';
        }
        else{
            $active = 'color';
        }
        return $this->render('detail', [
                'model' => $model,
                'parent' => $parent,
                'upload' => $upload,
                'active' => $active,
        ]);
    }
    
    public function actionUpdateProduct($id) {
        $model = $this->findModel($id);
        if(!$model->image || empty($model->image)){
            $model->scenario = 'new-detail';
        }
        $child = ProductDetail::findAll(['id_product'=>$id]);
        if ($model->load(Yii::$app->request->post())) {
            $upload_dir = 'products';
            $model->imageFile = UploadFile::getInstances($model, 'imageFile');
            $all_path = UploadFile::upload($model->imageFile, $upload_dir, 400, 500);
            if($all_path){
                $imgOld = json_decode($model->image);
                if($imgOld){
                    UploadFile::removeIMG($imgOld);
                }
                $model->image = json_encode($all_path);
                
            }
            if($model->save()){
                return $this->redirect('/product/detail?id=' . $model->id);
            }
        }
        $upload = new ProductDetail();
        if(isset($_GET['size'])){
            $active = 'size';
        }
        else{
            $active = 'color';
        }
        if(!$model->imageFile){
            $model->imageFile = null;
        }
        return $this->render('detail', [
                'model' => $child,
                'parent' => $model,
                'upload' => $upload,
                'active' => $active,
        ]);
        //return $this->redirect('/product/detail?id=' . $model->id);
    }
    
    public function actionCleardetail($id) {
        $model = ProductDetail::findAll(['id_product'=>$id]);
        if($model){
            foreach ($model as $row) {
                $imgOld = json_decode($row->images);
                if($imgOld){
                    UploadFile::removeIMG($imgOld);
                }
                $row->delete();
            }
        }
        return $this->redirect(['index']);
    }
    
    protected function findDetailModel($id)
    {
        if (($model = ProductDetail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
}
