<?php

use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;
use backend\components\helpFunction;

?>

<div class="detail-model-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="detail-form">
        <div class="row">
            <?php 
            if($model){
            foreach ($model as $key => $row) {
            ?>
            <div class="block-<?= $key+1 ?>">
                <div class="col-md-10 col-xs-10">
                    <div class="input-block-<?= $key+1 ?>">
                        <label class="control-label">Color <?= $key+1 ?></label>
                        <div class="spectrum-group input-group input-group-html5">
                            <span id="cp<?= $key+1 ?>-cont" class="input-group-sp input-group-addon addon-text" style="width:60px">
                                <input type="text" id="cp<?= $key+1 ?>-source" class="spectrum-source" name="cp<?= $key+1 ?>-source" value="<?= $row->color ?>" style="display:none">
                                <div class="sp-replacer sp-krajee">
                                </div>
                            </span>
                            <input type="text" id="cp<?= $key+1 ?>" class="spectrum-input form-control" name="pick_color[]" value="<?= $row->color ?>"></div>
                        <div class="img-detail" id="for-color-<?= $key+1 ?>">
                            <?php
                            $allIMG = json_decode($row->images);
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
                            <label class="control-label">Images for Color <?= $key+1 ?></label>
                            <input id="img-cp<?= $key+1 ?>" name="imageFile-<?= $row->color ?>[]" type="file" multiple="multiple" accept="image/*">
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-xs-2">
                    <div class="btn-block-<?= $key+1 ?>">
                        <label class="control-label"><?= $key==0?'Add':'Remove' ?></label>
                        <button id="btn-block-<?= $key+1 ?>" class="btn btn-<?= $key==0?'default':'danger' ?> input-group <?= $key==0?'plus':'minus' ?>" type="button" style="padding:6px 15px;">
                            <i class="glyphicon glyphicon-<?= $key==0?'plus':'minus' ?>"></i>
                        </button>
                    </div>
                </div>
            </div>
            <?php
            }}
            ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Update', ['class' => 'btn btn-primary']) ?>
        <a class="btn btn-danger" href="/product/cleardetail?id=<?= $parent->id ?>" role="button">Not set</a>
    </div>

    <?php ActiveForm::end(); ?>


</div>
<input type="hidden" id="data-count" name="data-count" value="<?= count($model) ?>">
<?php 
$this->registerJs(
    'var kvPalette_01af55ff=[["rgb(0, 0, 0)","rgb(67, 67, 67)","rgb(102, 102, 102)","rgb(204, 204, 204)","rgb(217, 217, 217)","rgb(255, 255, 255)"],["rgb(152, 0, 0)","rgb(255, 0, 0)","rgb(255, 153, 0)","rgb(255, 255, 0)","rgb(0, 255, 0)","rgb(0, 255, 255)","rgb(74, 134, 232)","rgb(0, 0, 255)","rgb(153, 0, 255)","rgb(255, 0, 255)"],["rgb(230, 184, 175)","rgb(244, 204, 204)","rgb(252, 229, 205)","rgb(255, 242, 204)","rgb(217, 234, 211)","rgb(208, 224, 227)","rgb(201, 218, 248)","rgb(207, 226, 243)","rgb(217, 210, 233)","rgb(234, 209, 220)"],["rgb(221, 126, 107)","rgb(234, 153, 153)","rgb(249, 203, 156)","rgb(255, 229, 153)","rgb(182, 215, 168)","rgb(162, 196, 201)","rgb(164, 194, 244)","rgb(159, 197, 232)","rgb(180, 167, 214)","rgb(213, 166, 189)"],["rgb(204, 65, 37)","rgb(224, 102, 102)","rgb(246, 178, 107)","rgb(255, 217, 102)","rgb(147, 196, 125)","rgb(118, 165, 175)","rgb(109, 158, 235)","rgb(111, 168, 220)","rgb(142, 124, 195)","rgb(194, 123, 160)"],["rgb(166, 28, 0)","rgb(204, 0, 0)","rgb(230, 145, 56)","rgb(241, 194, 50)","rgb(106, 168, 79)","rgb(69, 129, 142)","rgb(60, 120, 216)","rgb(61, 133, 198)","rgb(103, 78, 167)","rgb(166, 77, 121)"],["rgb(91, 15, 0)","rgb(102, 0, 0)","rgb(120, 63, 4)","rgb(127, 96, 0)","rgb(39, 78, 19)","rgb(12, 52, 61)","rgb(28, 69, 135)","rgb(7, 55, 99)","rgb(32, 18, 77)","rgb(76, 17, 48)"]];window.spectrum_659a43ea = {"showInput":true,"showInitial":true,"showPalette":true,"showSelectionPalette":true,"showAlpha":true,"allowEmpty":true,"preferredFormat":"hex","theme":"sp-krajee","palette":kvPalette_01af55ff};',
    View::POS_HEAD
);