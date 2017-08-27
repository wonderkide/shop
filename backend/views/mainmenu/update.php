<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MainMenu */

$this->title = 'Update Main Menu: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Main Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="main-menu-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
