<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            //'detail:ntext',
            'price',
            'is_detail',
            //'size:ntext',
            // 'color:ntext',
            // 'image:ntext',
             'quantity',
            // 'category',
            // 'group',
             'status',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{detail} {update} {delete}',
                'buttons' => [
                            'detail' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-wrench"></span>', '/product/detail?id=' . $model->id, [ 'title' => Yii::t('app', 'Product Detail')]);
                            },
                        ]
            ],
        ],
    ]); ?>
</div>
