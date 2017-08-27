<?php

namespace backend\controllers;

use Yii;
use common\models\ProductCategory;
use backend\models\ProductCategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CategoryController implements the CRUD actions for ProductCategory model.
 */
class CategoryController extends Controller
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
     * Lists all ProductCategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductCategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductCategory model.
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
     * Creates a new ProductCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductCategory();
        $model->on_menu = 1;
        $model->active = 1;

        if ($model->load(Yii::$app->request->post())) {
            $model->parent = 0;
            $model->active = 1;
            $model->sort = $this->getSorting($model->parent);
            if($model->save()){
                return $this->redirect(['index']);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ProductCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ProductCategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProductCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProductCategory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionSorting($id) {
        $model = ProductCategory::findOne($id);
        $sort = $model->sort;

        $condition = ['>', 'sort', $sort];
        $orderBy = ['sort' => SORT_ASC];


        if (isset($_GET['action']) && $_GET['action'] == 'up') {
            $condition = ['<', 'sort', $sort];
            $orderBy = ['sort' => SORT_DESC];
        }


        $nextModel = ProductCategory::find()->where($condition)->andWhere(['parent'=>$model->parent])->orderBy($orderBy)->one();

        if (!empty($model) && !empty($nextModel)) {
            $model->sort = $nextModel->sort;
            $nextModel->sort = $sort;
            $nextModel->update();
            $model->update();
        }
        if(isset($_GET['menu']) && $_GET['menu'] == 'child') {
            return $this->redirect(['child', 'id' => $model->parent]);
        }
        else{
            return $this->redirect(['/category']);
        }
    }

    private function getSorting($parent) {
        $sort = 1;
        $model = ProductCategory::find()->where(['parent' => $parent])->orderBy(['sort' => SORT_DESC])->one();
        if (!empty($model)) {
            $sort +=$model->sort;
        }
        return $sort;
    }
    
    
    // Child MENU
    public function actionChild($id) {
        $searchModel = new ProductCategorySearch();
        $dataProvider = $searchModel->searchChild(Yii::$app->request->queryParams, $id);
        $perentModel = $this->findModel($id);

        return $this->render('child', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id' => $perentModel,
        ]);
    }
    
    public function actionCreatechild($id)
    {
        $model = new ProductCategory();
        $perentModel = $this->findModel($id);
        $model->parent = $id;
        $model->on_menu = 1;
        $model->active = 1;
        if ($model->load(Yii::$app->request->post())) {
            $model->sort = $this->getSorting($model->parent);
            if($model->save()){
                return $this->redirect(['child', 'id' => $id]);
            }
        } else {
            return $this->render('createchild', [
                'model' => $model,
                'perentModel' => $perentModel,
            ]);
        }
    }

    /**
     * Updates an existing TagsModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdatechild($id)
    {
        $model = $this->findModel($id);
        $perentModel = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['child', 'id' => $model->parent_id]);
        } else {
            return $this->render('updatechild', [
                'model' => $model,
                'perentModel' => $perentModel,
            ]);
        }
    }
}
