<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerJsFile(
    Yii::$app->assetManager->getPublishedUrl('@admAsset').'/js/multiInput.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
?>

<div class="detail-model-form">

    <?php $form = ActiveForm::begin([
        'action' => '/product/size-color'
    ]); ?>

    <div class="detail-form">
        <?php
        foreach ($model as $key => $row) {

        ?>
        <div id="form-group-<?= $row->id ?>" class="form-group">
            <label class="control-label" for="is_detail">Color <?= $key+1 ?> <span class="color-preview" style="background: <?= $row->color ?>"></span></label>
            <?php 
                $data = json_decode($row->all);
            ?>
            <input id="input-data-<?= $row->id ?>" type="hidden" value="<?= count((array)$data)?>" />
            <div id="pd-<?= $row->id ?>" class="multiple-input">
                <table class="multiple-input-list table table-condensed table-renderer">
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
                        <tr id="row-<?= $row->id ?>-<?= $dcount ?>" class="multiple-input-list__item">
                            <td class="list-cell__size">
                                <div class="form-group field-productdetail-<?= $row->id ?>-<?= $dcount ?>-size">
                                    <input type="text" id="productdetail-<?= $row->id ?>-<?= $dcount ?>-size" class="form-control" name="ProductDetail[<?= $row->id ?>][<?= $dcount ?>][size]" value="<?= $drow->size ?>">
                                </div>
                            </td>
                            <td class="list-cell__qtt">
                                <div class="form-group field-productdetail-<?= $row->id ?>-<?= $dcount ?>-qtt">
                                    <input type="text" id="productdetail-<?= $row->id ?>-<?= $dcount ?>-qtt" class="form-control" name="ProductDetail[<?= $row->id ?>][<?= $dcount ?>][qtt]" value="<?= $drow->qtt ?>">
                                </div>
                            </td>
                            <?php
                            if($key>0){
                            ?>
                            <td class="list-cell__button">
                                <div id="btn-<?= $row->id ?>-<?= $dcount ?>" class="btn multiple-input-list__btn js-input-remove btn btn-danger">
                                    <i class="glyphicon glyphicon-remove"></i>
                                </div>
                            </td>
                            <?php
                            }else{
                            ?>
                            <td class="list-cell__button">
                                <div id="btn-<?= $row->id ?>" class="btn multiple-input-list__btn js-input-plus btn btn-default">
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
                                <div class="form-group field-productdetail-<?= $row->id ?>-<?= $dcount ?>-size">
                                    <input type="text" id="productdetail-<?= $row->id ?>-<?= $dcount ?>-size" class="form-control" name="ProductDetail[<?= $row->id ?>][<?= $dcount ?>][size]">
                                </div>
                            </td>
                            <td class="list-cell__qtt">
                                <div class="form-group field-productdetail-<?= $row->id ?>-<?= $dcount ?>-qtt">
                                    <input type="text" id="productdetail-<?= $row->id ?>-<?= $dcount ?>-qtt" class="form-control" name="ProductDetail[<?= $row->id ?>][<?= $dcount ?>][qtt]">
                                </div>
                            </td>
                            <td class="list-cell__button">
                                <div id="btn-<?= $row->id ?>" class="btn multiple-input-list__btn js-input-plus btn btn-default">
                                    <i class="glyphicon glyphicon-plus"></i>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
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
