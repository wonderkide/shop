<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\SwitchInput;

/* @var $this yii\web\View */
/* @var $model common\models\ProductCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-category-form">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'detail')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'setting')->textarea(['rows' => 6]) ?>

                <?php //echo $form->field($model, 'sort')->textInput() ?>

                <?php echo $form->field($model, 'on_menu')->widget(SwitchInput::classname(), []); ?>

                <?php echo $form->field($model, 'active')->widget(SwitchInput::classname(), []); ?>

                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>

</div>
