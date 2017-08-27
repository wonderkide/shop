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
        'action' => '/product/update-product?id='.$parent->id,
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <div class="detail-form">
        <div class="img-detail">
            <?php
            $allIMG = json_decode($parent->image);
            if($allIMG){

            ?>
            <div class="img-detail-block">
                <?php
                foreach ($allIMG as $irow) {
                ?>
                <div class="col-md-3 col-sm-4 col-xs-6">
                <img src="<?= helpFunction::getFrontendUrl(). $irow ?>" class="img-responsive" />
                </div>
                <?php } ?>
                <div class="clearfix"></div>
            </div>
            <?php } ?>
        </div>
        <?= $form->field($parent, 'imageFile[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>
        <?php
                    echo $form->field($parent, 'quantity')->widget(TouchSpin::classname(), 
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
                    ]);
                ?>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Update', ['class' => 'btn btn-primary']) ?>
        <a class="btn btn-danger" href="/product/cleardetail?id=<?= $parent->id ?>" role="button">Not set</a>
    </div>

    <?php ActiveForm::end(); ?>


</div>
