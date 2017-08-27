<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TagsSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'จัดการ Sub menu : '.$id->label;
$this->params['breadcrumbs'][] = ['label' => 'Main Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tags-model-index">

    <h1><?php //echo Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่ม  sub menu', [Url::to('/mainmenu/createchild/'.$id->id)], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'label',
            'url:url',
            // 'parent_id',
            /*[
                        'class' => 'yii\grid\DataColumn',
                        'attribute' => 'group',
                        'format' => 'text',
                        'value' => function ($data) {
                            return Yii::$app->params['tagGroup'][$data->group];
                        },
            ],*/

            //['class' => 'yii\grid\ActionColumn'],
            ['class' => 'yii\grid\ActionColumn',
                        'template' => '{up} {down} {update} {delete}',
                        'buttons' => [
                            'up' => function ($url, $model, $key) {
                            return Html::a('<span class="glyphicon glyphicon-arrow-up"></span>', '/mainmenu/sorting/' . $model->id . '?action=up&menu=child');
                            },
                            'down' => function ($url, $model, $key) {
                                return Html::a('<span class="glyphicon glyphicon-arrow-down"></span>', '/mainmenu/sorting/' . $model->id . '?action=down&menu=child');
                            },
                        ]
            ],
        ],
    ]); ?>

</div>