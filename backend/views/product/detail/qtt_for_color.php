<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\components\helpFunction;
use kartik\widgets\TouchSpin;

$this->registerJsFile(
    Yii::$app->assetManager->getPublishedUrl('@admAsset').'/js/multiInput.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
?>

<div class="detail-model-form">

    <?php $form = ActiveForm::begin([
        'action' => '/product/qtt-color?id='.$parent->id,
        //'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <div class="detail-form">
        <?php
         foreach ($model as $key => $row) {
        ?>
        <div class="qtt-color-form">
        <div class="color-detail">
            <label class="control-label" for="is_detail">Color <?= $key+1 ?> <span class="color-preview" style="background: <?= $row->color ?>"></span></label>
        </div>
        <?php
                echo TouchSpin::widget([
                    'name' => 'qtt-for-' . $row->id,
                    'value' => $row->quantity,
                    'pluginOptions' => ['verticalbuttons' => true]
                ]);
        ?>
        </div>
        <?php
        }
        ?>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Update', ['class' => 'btn btn-primary']) ?>
        <a class="btn btn-danger" href="/product/cleardetail?id=<?= $parent->id ?>" role="button">Not set</a>
    </div>

    <?php ActiveForm::end(); ?>


</div>
