<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\widgets\Select2;
use yii\web\View;

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

<?= $this->render('cart/_step', ['err' => $err, 'step' => $step]); ?>

<!--cart-items-->
<div class="cart-items cart-address" page="address">
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
                    <p><a class="btn btn-default btn-address form" role="button">เลือกที่อยู่</a></p>
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
        $('.address-selected').hide();
        $('.address-form').show();
    });
    $('.btn-address.form').on('click', function() {
        $('.address-selected').show();
        $('.address-form').hide();
    });",
    View::POS_END
);