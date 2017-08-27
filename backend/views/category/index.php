<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-category-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            'detail',
            //'parent',
            //'setting:ntext',
            // 'sort',
             'on_menu',
             'active',

            ['class' => 'yii\grid\ActionColumn',
                        'template' => '{up} {down} {child} {update} {delete}',
                        'buttons' => [
                            'up' => function ($url, $model, $key) {
                            return Html::a('<span class="glyphicon glyphicon-arrow-up"></span>', '/category/sorting/' . $model->id . '?action=up');
                            },
                            'down' => function ($url, $model, $key) {
                                return Html::a('<span class="glyphicon glyphicon-arrow-down"></span>', '/category/sorting/' . $model->id . '?action=down');
                            },
                            'child' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-list"></span>', '/category/child/' . $model->id, [ 'title' => Yii::t('app', 'Sub Category')]);
                            },
                        ]
            ],
        ],
    ]); ?>
</div>
