<?php
use yii\web\View;
use kartik\widgets\Alert;
$this->registerJsFile(
    Yii::$app->assetManager->getPublishedUrl('@MDAsset').'/js/checkout.js',
    ['depends' => [\yii\web\JqueryAsset::className(),frontend\assets\MDAsset::className()]]
);
?>
<!--breadcrumbs-->
<div class="breadcrumbs">
        <div class="container">
                <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                        <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                        <li class="active">Check Cart</li>
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
<div class="cart-items">
        <div class="container items">
            <h3 class="wow fadeInUp animated" data-wow-delay=".5s">My Shopping Cart(<span id="simpleCart_quantity" class="simpleCart_quantity"> 0 </span>)</h3>
            <table class="table table-striped">
                <thead>
                    <tr class="info">
                        <td>
                            <div class="cart-item cyc">&nbsp;</div>
                            <div class="cart-item-info">
                                <div class="item-name">รายละเอียดสินค้า</div>
                                <div class="item-price">ราคา</div>
                                <div class="item-qt">จำนวน</div>
                                <div class="item-price-total">รวม</div>
                            </div>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
</div>
<input class="assets" type="hidden" value="<?= Yii::$app->assetManager->getPublishedUrl('@MDAsset') ?>">
<!--//cart-items-->