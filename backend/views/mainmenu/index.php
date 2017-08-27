<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MainMenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Main Menus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-menu-index">

    <h1><?php //echo Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Main Menu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'label',
            'url:url',
            //'parent',
            //'sort',
            // 'active',

            ['class' => 'yii\grid\ActionColumn',
                        'template' => '{up} {down} {child} {update} {delete}',
                        'buttons' => [
                            'up' => function ($url, $model, $key) {
                            return Html::a('<span class="glyphicon glyphicon-arrow-up"></span>', '/mainmenu/sorting/' . $model->id . '?action=up');
                            },
                            'down' => function ($url, $model, $key) {
                                return Html::a('<span class="glyphicon glyphicon-arrow-down"></span>', '/mainmenu/sorting/' . $model->id . '?action=down');
                            },
                            'child' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-list"></span>', '/mainmenu/child/' . $model->id, [ 'title' => Yii::t('app', 'Sub Menu')]);
                            },
                        ]
            ],
        ],
    ]); ?>
</div>
