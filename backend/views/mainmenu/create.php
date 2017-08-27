<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\MainMenu */

$this->title = 'Create Main Menu';
$this->params['breadcrumbs'][] = ['label' => 'Main Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-menu-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
