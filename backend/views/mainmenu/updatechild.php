<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MainMenu */

$this->title = 'Update sub Menu : ' . $model->label;
$this->params['breadcrumbs'][] = ['label' => 'Main Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $perentModel->label . ' Menu', 'url' => ['child', 'id'=>$perentModel->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="main-menu-update">

    <h1><?php //echo Html::encode($this->title) ?></h1>

    <?= $this->render('_formchild', [
        'model' => $model,
        'perentModel' => $perentModel,
    ]) ?>

</div>
