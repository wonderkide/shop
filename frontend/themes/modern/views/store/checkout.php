<?php
use yii\web\View;
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
                        <li class="active">Check Out page</li>
                </ol>
        </div>
</div>
<?php /*
<div class="simpleCart_items"> </div>
 * 
 */
        ?>
<!--//breadcrumbs-->
<!--cart-items-->
<div class="cart-items">
        <div class="container">
            <h3 class="wow fadeInUp animated" data-wow-delay=".5s">My Shopping Cart(<span id="simpleCart_quantity" class="simpleCart_quantity"> 0 </span>)</h3>
                <?php /*
                <div class="cart-header wow fadeInUp animated" data-wow-delay=".5s">
                        <div class="alert-close"> </div>
                        <div class="cart-sec simpleCart_shelfItem">
                                <div class="cart-item cyc">
                                        <a href="single.html"><img src="<?= Yii::$app->assetManager->getPublishedUrl('@MDAsset') ?>/images/g1.jpg" class="img-responsive" alt=""></a>
                                </div>
                                <div class="cart-item-info">
                                        <h4><a href="single.html"> Lorem Ipsum is not simply </a><span>Pickup time :</span></h4>
                                        <ul class="qty">
                                                <li><p>Min. order value :</p></li>
                                                <li><p>FREE delivery</p></li>
                                        </ul>
                                        <div class="delivery">
                                                <p>Service Charges : $10.00</p>
                                                <span>Delivered in 1-1:30 hours</span>
                                                <div class="clearfix"></div>
                                        </div>	
                                </div>
                                <div class="clearfix"></div>
                        </div>
                </div>
                <div class="cart-header1 wow fadeInUp animated" data-wow-delay=".7s">
                        <div class="alert-close1"> </div>
                        <div class="cart-sec simpleCart_shelfItem">
                                <div class="cart-item cyc">
                                        <a href="single.html"><img src="<?= Yii::$app->assetManager->getPublishedUrl('@MDAsset') ?>/images/g5.jpg" class="img-responsive" alt=""></a>
                                </div>
                                <div class="cart-item-info">
                                        <h4><a href="single.html"> Lorem Ipsum is not simply </a><span>Pickup time :</span></h4>
                                        <ul class="qty">
                                                <li><p>Min. order value :</p></li>
                                                <li><p>FREE delivery</p></li>
                                        </ul>
                                        <div class="delivery">
                                        <p>Service Charges : $10.00</p>
                                        <span>Delivered in 1-1:30 hours</span>
                                        <div class="clearfix"></div>
                                </div>	
                           </div>
                           <div class="clearfix"></div>
                        </div>
                </div>
                <div class="cart-header2 wow fadeInUp animated" data-wow-delay=".9s">
                        <div class="alert-close2"> </div>
                        <div class="cart-sec simpleCart_shelfItem">
                                <div class="cart-item cyc">
                                        <a href="single.html"><img src="<?= Yii::$app->assetManager->getPublishedUrl('@MDAsset') ?>/images/g9.jpg" class="img-responsive" alt=""></a>
                                </div>
                                <div class="cart-item-info">
                                        <h4><a href="single.html"> Lorem Ipsum is not simply </a><span>Pickup time :</span></h4>
                                        <ul class="qty">
                                                <li><p>Min. order value :</p></li>
                                                <li><p>FREE delivery</p></li>
                                        </ul>
                                        <div class="delivery">
                                                <p>Service Charges : $10.00</p>
                                                <span>Delivered in 1-1:30 hours</span>
                                                <div class="clearfix"></div>
                                        </div>	
                                </div>
                                <div class="clearfix"></div>
                        </div>
                </div>		
                 * 
                 */?>
        </div>
</div>
<input class="assets" type="hidden" value="<?= Yii::$app->assetManager->getPublishedUrl('@MDAsset') ?>">
<!--//cart-items-->