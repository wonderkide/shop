<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_user',
            'address',
            'price',
            'discount',
            // 'total',
            // 'quantity',
            // 'description:ntext',
            // 'create_at',
            // 'create_ip',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
