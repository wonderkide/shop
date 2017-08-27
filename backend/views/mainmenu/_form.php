<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MainMenu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="main-menu-form">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'label')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

                <?php //echo $form->field($model, 'parent')->textInput() ?>

                <?php //echo $form->field($model, 'sort')->textInput() ?>

                <?php //echo $form->field($model, 'active')->textInput() ?>

                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>

</div>
