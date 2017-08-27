<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MainMenu */

$this->title = 'Update sub category : ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Main Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $perentModel->name . ' Menu', 'url' => ['child', 'id'=>$perentModel->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="main-menu-update">

    <h1><?php //echo Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'perentModel' => $perentModel,
    ]) ?>

</div>
