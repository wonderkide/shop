<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use unclead\multipleinput\MultipleInput;
use kartik\widgets\Select2;
use kartik\widgets\TouchSpin;
use kartik\checkbox\CheckboxX;
use kartik\widgets\SwitchInput;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'detail')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'price')->textInput() ?>

                <?php //echo $form->field($model, 'is_detail')->textarea(['rows' => 6]) ?>
                
                <div class="form-group">
                    <label class="control-label" for="is_detail"><?= $model->getAttributeLabel("is_detail") ?></label>
                    <br>
                <?php
                //  Inline label alignment options - left, right, or enclosed. Also note checkbox with initial values.
                $detail = json_decode($model->is_detail);
                if(!$detail){
                    $detail = [];
                }
                echo CheckboxX::widget([
                    'name'=>'many-color',
                    'value'=>in_array("color", $detail)?1:0,
                    'options'=>['id'=>'many-color'],
                    'pluginOptions'=>['threeState'=>false]
                ]);
                echo '<label class="cbx-label" for="many-color">Many Colors</label>';
                ?>
                <span style="border-left: 1px solid #ddd; margin:0 15px 0 11px;"></span>
                <?php
                
                echo CheckboxX::widget([
                    'name'=>'many-size',
                    'value'=>in_array("size", $detail)?1:0,
                    'options'=>['id'=>'many-size'],
                    'pluginOptions'=>['threeState'=>false]
                ]);
                echo '<label class="cbx-label" for="many-size">Many Size</label>';
                ?>
                </div>
                <?php
                    /*echo $form->field($model, 'size')->widget(MultipleInput::className(), [
                        'max'               => 8,
                        'min'               => 1, // should be at least 2 rows
                        'allowEmptyList'    => false,
                        'enableGuessTitle'  => true,
                        //'addButtonPosition' => MultipleInput::POS_HEADER // show add button in the header
                    ])
                    ->label(false);*/

                ?>
                
                <?php
                /*echo $form->field($model, 'image')->widget(
                    ElFinderInput::className(),
                    ['connectorRoute' => 'el-finder/connector',]
                )*/
                ?>

                <?php //echo $form->field($model, 'imageFile')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>
                

                <?php
                    /*echo $form->field($model, 'quantity')->widget(TouchSpin::classname(), 
                    ['options' => 
                        [
                            'class' => 'form-control setsession'], 
                            'pluginOptions' => [
                                'verticalbuttons' => true, 
                                'min' => 0, 'max' => 1000000000, 
                                //'step' => 1, 
                                //'decimals' => 2, 
                                //'forcestepdivisibility' => 'none'
                            ],
                    ]);*/
                ?>
                
                <?php
                echo $form->field($model, 'category')->widget(Select2::classname(), [
                    'data' => $cat,
                    'options' => ['placeholder' => 'Select a Category ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>

                <?php
                echo $form->field($model, 'group')->widget(Select2::classname(), [
                    'data' => $group,
                    'options' => ['placeholder' => 'Select a group ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>

                <?php echo $form->field($model, 'status')->widget(SwitchInput::classname(), ['disabled' => $status]); ?>

                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>

</div>
