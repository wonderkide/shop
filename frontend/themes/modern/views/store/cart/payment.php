<?php
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

<?= $this->render('cart/_step', ['err' => $err, 'step' => $step]); ?>

<!--cart-items-->
<div class="cart-items" page="confirm">
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
<!--//cart-items-->