<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\components\helpFunction;
use yii\web\View;

$this->registerJsFile(
    Yii::$app->assetManager->getPublishedUrl('@admAsset').'/js/multiInput.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);

?>

<div class="detail-model-form">

    <?php $form = ActiveForm::begin([
        'action' => '/product/update-size?id='.$parent->id,
        'options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="detail-form">
        <div class="img-detail">
            <?php
            $allIMG = json_decode($upload->images);
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
        <?= $form->field($upload, 'imageFile[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>
            <?php 
                $data = json_decode($upload->all);
            ?>
            <input id="input-data-size" type="hidden" value="<?= count((array)$data)?>" />
            <div id="pd-size" class="multiple-input">
                <table class="multiple-input-list table table-condensed table-renderer <?= !empty($upload->getErrors('all')) ? 'form-group has-error':'form-group' ?>">
                    <thead>
                        <tr><th class="list-cell__size">Size</th>
                        <th class="list-cell__qtt">Quantity</th>
                        <th class="list-cell__button"></th></tr>
                    </thead>
                    <tbody>
                        <?php 
                        $dcount = 0;
                        if(count($data) > 0){
                            
                            foreach ($data as $key => $drow) {
                        ?>
                        <tr id="row-size-<?= $dcount ?>" class="multiple-input-list__item">
                            <td class="list-cell__size">
                                <div class="form-group field-productdetail-0-<?= $dcount ?>-size">
                                    <input type="text" id="productdetail-0-<?= $dcount ?>-size" class="form-control" name="ProductDetail[size][<?= $dcount ?>][size]" value="<?= $drow->size ?>">
                                </div>
                            </td>
                            <td class="list-cell__qtt">
                                <div class="form-group field-productdetail-0-<?= $dcount ?>-qtt">
                                    <input type="text" id="productdetail-0-<?= $dcount ?>-qtt" class="form-control" name="ProductDetail[size][<?= $dcount ?>][qtt]" value="<?= $drow->qtt ?>">
                                </div>
                            </td>
                            <?php
                            if($key>0){
                            ?>
                            <td class="list-cell__button">
                                <div id="btn-size-<?= $dcount ?>" class="btn multiple-input-list__btn js-input-remove btn btn-danger">
                                    <i class="glyphicon glyphicon-remove"></i>
                                </div>
                            </td>
                            <?php
                            }else{
                            ?>
                            <td class="list-cell__button">
                                <div id="btn-size" class="btn multiple-input-list__btn js-input-plus btn btn-default">
                                    <i class="glyphicon glyphicon-plus"></i>
                                </div>
                            </td>
                            <?php } ?>
                            
                        </tr>
                        <?php $dcount +=1;
                        }}else{
                        ?>
                        <tr class="multiple-input-list__item">
                            <td class="list-cell__size">
                                <div class="form-group field-productdetail-0-<?= $dcount ?>-size">
                                    <input type="text" id="productdetail-0-<?= $dcount ?>-size" class="form-control" name="ProductDetail[size][<?= $dcount ?>][size]">
                                </div>
                            </td>
                            <td class="list-cell__qtt">
                                <div class="form-group field-productdetail-0-<?= $dcount ?>-qtt">
                                    <input type="text" id="productdetail-0-<?= $dcount ?>-qtt" class="form-control" name="ProductDetail[size][<?= $dcount ?>][qtt]">
                                </div>
                            </td>
                            <td class="list-cell__button">
                                <div id="btn-0" class="btn multiple-input-list__btn js-input-plus btn btn-default">
                                    <i class="glyphicon glyphicon-plus"></i>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php
                if(!empty($upload->getErrors('all'))){
                ?>
                
                <div id="size-error" class="form-group has-error">
                    <div class="help-block"><?= $upload->getErrors('all')[0] ?></div>
                </div>
                <?php } ?>
            </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Update', ['class' => 'btn btn-primary']) ?>
        <a class="btn btn-danger" href="/product/cleardetail?id=<?= $parent->id ?>" role="button">Not set</a>
    </div>

    <?php ActiveForm::end(); ?>


</div>
<?php 
$this->registerJs(
    '$(".form-group.has-error input").change(function(){
        if($("#productdetail-0-0-qtt").val() != "" && $("#productdetail-0-0-size").val() != ""){
            $(".multiple-input-list.table").removeClass("has-error").addClass("has-success");
            $("#size-error").removeClass("has-error").addClass("has-success").hide();
        }
        
    });',
    View::POS_END
);