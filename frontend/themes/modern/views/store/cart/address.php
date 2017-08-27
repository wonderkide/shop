<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\widgets\Select2;
use yii\web\View;

use kartik\widgets\Alert;
$this->registerCssFile(Yii::$app->assetManager->getPublishedUrl('@MDAsset')."/jquery.Thailand.js/dist/jquery.Thailand.min.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className(), frontend\assets\MDAsset::className()],]);
$this->registerJsFile(
    Yii::$app->assetManager->getPublishedUrl('@MDAsset').'/jquery.Thailand.js/dependencies/JQL.min.js',
    ['depends' => [\yii\web\JqueryAsset::className(),frontend\assets\MDAsset::className()]]
);
$this->registerJsFile(
    Yii::$app->assetManager->getPublishedUrl('@MDAsset').'/jquery.Thailand.js/dependencies/typeahead.bundle.js',
    ['depends' => [\yii\web\JqueryAsset::className(),frontend\assets\MDAsset::className()]]
);
$this->registerJsFile(
    Yii::$app->assetManager->getPublishedUrl('@MDAsset').'/jquery.Thailand.js/dist/jquery.Thailand.min.js',
    ['depends' => [\yii\web\JqueryAsset::className(),frontend\assets\MDAsset::className()]]
);
$this->registerJsFile(
    Yii::$app->assetManager->getPublishedUrl('@MDAsset').'/jquery.Thailand.js/jquery.Thailand.main.js',
    ['depends' => [\yii\web\JqueryAsset::className(),frontend\assets\MDAsset::className()]]
);
?>
<!--breadcrumbs-->
<div class="breadcrumbs">
        <div class="container">
                <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                        <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                        <li class="active">Address</li>
                </ol>
        </div>
</div>
<?php
?>
<!--//breadcrumbs-->
<!--<div class="cart-items head">
    <div class="container">
        <h3 class="wow fadeInUp animated" data-wow-delay=".5s">My Shopping Cart(<span id="simpleCart_quantity" class="simpleCart_quantity"> 0 </span>)</h3>
    </div>
</div>-->
<?php
if($err):
?>
<div class="cart-step-error">
    <div class="container">
        <?php
        echo Alert::widget([
            'type' => Alert::TYPE_DANGER,
            'title' => ' มีบางอย่างผิดพลาด!',
            'icon' => 'glyphicon glyphicon-remove-sign',
            'body' => 'กรุณาลองใหม่อีกครั้ง',
            'showSeparator' => true,
            'delay' => 10000,
            'options' => ['class' => 'step-error'],
        ]);
        ?>
    </div>
</div>
<?php
endif;
?>
<div class="cart-step">
    <div class="container">
        <!--<a class="btn btn-primary">STEP 1</a>
        <a class="btn btn-primary">STEP 2</a>
        <a class="btn btn-primary">STEP 3</a>
        <a class="btn btn-primary">STEP 4</a>-->
        <div class="steps clearfix">
            <ul role="tablist">
                <li role="tab" class="first done" aria-disabled="false" aria-selected="false">
                    <a id="example-basic-t-0" href="#example-basic-h-0" aria-controls="example-basic-p-0">
                        <span class="number">1.</span> ตะกร้าสินค้า
                    </a>
                </li>
                <li role="tab" class="current" aria-disabled="false" aria-selected="true">
                    <a id="example-basic-t-1" href="#example-basic-h-1" aria-controls="example-basic-p-1">
                        <!--<span class="current-info audible">current step: </span>-->
                        <span class="number">2.</span> ที่อยู่สำหรับจัดส่ง
                    </a>
                </li>
                <li role="tab" class="disabled" aria-disabled="true">
                    <a id="example-basic-t-2" href="#example-basic-h-2" aria-controls="example-basic-p-2">
                        <span class="number">3.</span> ยืนยันการสั่งซื้อ
                    </a>
                </li>
                <li role="tab" class="disabled last" aria-disabled="true">
                    <a id="example-basic-t-2" href="#example-basic-h-2" aria-controls="example-basic-p-2">
                        <span class="number">3.</span> ชำระเงิน
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--cart-items-->
<div class="cart-items cart-address">
            <div class="address-block wow fadeInUp animated" data-wow-delay=".5s">
                <h3 class="">My Address</h3>
                
                <div class="address-selected">
                    <p><a class="btn btn-default btn-address add" role="button">เพิ่มที่อยู่ใหม่</a></p>
                    <?php $formadd = ActiveForm::begin(); ?>
                    <?php
                    echo $formadd->field($addmodel, 'address')->widget(Select2::classname(), [
                        'data' => $address,
                        'options' => ['placeholder' => 'Select address ...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                    <div class="form-group text-center">
                        <?= Html::submitButton('Create', ['class' => 'btn btn-warning']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>


                
                

                <div class="address-form">
                    <div id="address-form-loader">
                        <div uk-spinner></div> รอสักครู่ กำลังโหลดฐานข้อมูล...
                    </div>

                    <?php $form = ActiveForm::begin(['id' => 'address-form',
                            'options' => [
                                'class' => 'user-address',
                                'style' => 'display:none;',
                                'autocomplete' => 'off'
                            ]
                        ]); ?>

                        <?= $form->field($newaddress, 'number')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($newaddress, 'building')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($newaddress, 'soi')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($newaddress, 'road')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($newaddress, 'mu')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($newaddress, 'district')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($newaddress, 'amphoe')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($newaddress, 'province')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($newaddress, 'zipcode')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($newaddress, 'note')->textarea(['rows' => 6]) ?>
                    <div class="form-group">
                        <?= Html::submitButton($newaddress->isNewRecord ? 'Create' : 'Update', ['class' => $newaddress->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
            
</div>
<!--//cart-items-->
<?php
$this->registerJs(
    "$('.btn-address.add').on('click', function() {
        console.log('change');
        $('.address-selected').hide();
        $('.address-form').show();
    });",
    View::POS_END
);