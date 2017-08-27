<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TagsModel */

$this->title = 'เพิ่ม Sub menu';
$this->params['breadcrumbs'][] = ['label' => 'Main Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $perentModel->label . ' Menu', 'url' => ['child', 'id'=>$perentModel->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tags-model-create">

    <h1><?php //echo Html::encode($this->title) ?></h1>

    <?= $this->render('_formchild', [
        'model' => $model,
        'perentModel' => $perentModel,
    ]) ?>

</div>