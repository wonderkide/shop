<?php
use frontend\components\widgets\ProductNew;

$this->registerCssFile(Yii::$app->assetManager->getPublishedUrl('@MDAsset')."/css/flexslider.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className(), frontend\assets\MDAsset::className()],]);
?>

<!--new-->
<?= ProductNew::widget(); ?>
<!--//new-->

<!--gallery-->
<div class="gallery">
        <div class="container">
                <div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
                        <h3 class="title">Popular<span> Products</span></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit curabitur </p>
                </div>
                <div class="gallery-info">
                        <div class="col-md-3 gallery-grid wow flipInY animated" data-wow-delay=".5s">
                                <a href="products.html"><img src="<?= Yii::$app->assetManager->getPublishedUrl('@MDAsset') ?>/images/g1.jpg" class="img-responsive" alt=""/></a>
                                <div class="gallery-text simpleCart_shelfItem">
                                        <h5><a class="name" href="single.html">Baby Girls' Dress </a></h5>
                                        <p><span class="item_price">100$</span></p>
                                        <h4 class="sizes">Sizes: <a href="#"> s</a> - <a href="#">m</a> - <a href="#">l</a> - <a href="#">xl</a> </h4>
                                        <ul>
                                                <li><a href="#"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span></a></li>
                                                <li><a class="item_add" href="#"><span class="glyphicon glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
                                                <li><a href="#"><span class="glyphicon glyphicon glyphicon-heart-empty" aria-hidden="true"></span></a></li>
                                        </ul>
                                </div>
                        </div>
                        <div class="col-md-3 gallery-grid gallery-grid1 wow flipInY animated" data-wow-delay=".7s">
                                <a href="products.html"><img src="<?= Yii::$app->assetManager->getPublishedUrl('@MDAsset') ?>/images/g2.jpg" class="img-responsive" alt=""/></a>
                                <div class="gallery-text simpleCart_shelfItem">
                                        <h5><a class="name" href="single.html">Pokemon Onesies</a></h5>
                                        <p><span class="item_price">79$</span></p>
                                        <h4 class="sizes">Sizes: <a href="#"> s</a> - <a href="#">m</a> - <a href="#">l</a> - <a href="#">xl</a> </h4>
                                        <ul>
                                                <li><a href="#"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span></a></li>
                                                <li><a class="item_add" href="#"><span class="glyphicon glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
                                                <li><a href="#"><span class="glyphicon glyphicon glyphicon-heart-empty" aria-hidden="true"></span></a></li>
                                        </ul>
                                </div>
                        </div>
                        <div class="col-md-3 gallery-grid gallery-grid2 wow flipInY animated" data-wow-delay=".9s">
                                <a href="products.html"><img src="<?= Yii::$app->assetManager->getPublishedUrl('@MDAsset') ?>/images/g3.jpg" class="img-responsive" alt=""/></a>
                                <div class="gallery-text simpleCart_shelfItem">
                                        <h5><a class="name" href="single.html">Doctor Play Set</a></h5>
                                        <p><span class="item_price">30$</span></p>
                                        <h4 class="sizes">Sizes: <a href="#"> s</a> - <a href="#">m</a> - <a href="#">l</a> - <a href="#">xl</a> </h4>
                                        <ul>
                                                <li><a href="#"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span></a></li>
                                                <li><a class="item_add" href="#"><span class="glyphicon glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
                                                <li><a href="#"><span class="glyphicon glyphicon glyphicon-heart-empty" aria-hidden="true"></span></a></li>
                                        </ul>
                                </div>
                        </div>
                        <div class="col-md-3 gallery-grid wow flipInY animated" data-wow-delay="1.1s">
                                <a href="products.html"><img src="<?= Yii::$app->assetManager->getPublishedUrl('@MDAsset') ?>/images/g4.jpg" class="img-responsive" alt=""/></a>
                                <div class="gallery-text simpleCart_shelfItem">
                                        <h5><a class="name" href="single.html">Cap & Gloves Set</a></h5>
                                        <p><span class="item_price">15$</span></p>
                                        <h4 class="sizes">Sizes: <a href="#"> s</a> - <a href="#">m</a> - <a href="#">l</a> - <a href="#">xl</a> </h4>
                                        <ul>
                                                <li><a href="#"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span></a></li>
                                                <li><a class="item_add" href="#"><span class="glyphicon glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
                                                <li><a href="#"><span class="glyphicon glyphicon glyphicon-heart-empty" aria-hidden="true"></span></a></li>
                                        </ul>
                                </div>
                        </div>
                        <div class="col-md-3 gallery-grid wow flipInY animated" data-wow-delay=".5s">
                                <a href="products.html"><img src="<?= Yii::$app->assetManager->getPublishedUrl('@MDAsset') ?>/images/g5.jpg" class="img-responsive" alt=""/></a>
                                <div class="gallery-text simpleCart_shelfItem">
                                        <h5><a class="name" href="single.html">Full Sleeves Romper</a></h5>
                                        <p><span class="item_price">60$</span></p>
                                        <h4 class="sizes">Sizes: <a href="#"> s</a> - <a href="#">m</a> - <a href="#">l</a> - <a href="#">xl</a> </h4>
                                        <ul>
                                                <li><a href="#"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span></a></li>
                                                <li><a class="item_add" href="#"><span class="glyphicon glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
                                                <li><a href="#"><span class="glyphicon glyphicon glyphicon-heart-empty" aria-hidden="true"></span></a></li>
                                        </ul>
                                </div>
                        </div>
                        <div class="col-md-3 gallery-grid gallery-grid1 wow flipInY animated" data-wow-delay=".7s">
                                <a href="products.html"><img src="<?= Yii::$app->assetManager->getPublishedUrl('@MDAsset') ?>/images/g6.jpg" class="img-responsive" alt=""/></a>
                                <div class="gallery-text simpleCart_shelfItem">
                                        <h5><a class="name" href="single.html">Party Wear Frock</a></h5>
                                        <p><span class="item_price">80$</span></p>
                                        <h4 class="sizes">Sizes: <a href="#"> s</a> - <a href="#">m</a> - <a href="#">l</a> - <a href="#">xl</a> </h4>
                                        <ul>
                                                <li><a href="#"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span></a></li>
                                                <li><a class="item_add" href="#"><span class="glyphicon glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
                                                <li><a href="#"><span class="glyphicon glyphicon glyphicon-heart-empty" aria-hidden="true"></span></a></li>
                                        </ul>
                                </div>
                        </div>
                        <div class="col-md-3 gallery-grid gallery-grid2 wow flipInY animated" data-wow-delay=".9s">
                                <a href="products.html"><img src="<?= Yii::$app->assetManager->getPublishedUrl('@MDAsset') ?>/images/g7.jpg" class="img-responsive" alt=""/></a>
                                <div class="gallery-text simpleCart_shelfItem">
                                        <h5><a class="name" href="single.html">Bear Diaper Bag</a></h5>
                                        <p><span class="item_price">110$</span></p>
                                        <h4 class="sizes">Sizes: <a href="#"> s</a> - <a href="#">m</a> - <a href="#">l</a> - <a href="#">xl</a> </h4>
                                        <ul>
                                                <li><a href="#"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span></a></li>
                                                <li><a class="item_add" href="#"><span class="glyphicon glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
                                                <li><a href="#"><span class="glyphicon glyphicon glyphicon-heart-empty" aria-hidden="true"></span></a></li>
                                        </ul>
                                </div>
                        </div>
                        <div class="col-md-3 gallery-grid wow flipInY animated" data-wow-delay="1.1s">
                                <a href="products.html"><img src="<?= Yii::$app->assetManager->getPublishedUrl('@MDAsset') ?>/images/g8.jpg" class="img-responsive" alt=""/></a>
                                <div class="gallery-text simpleCart_shelfItem">
                                        <h5><a class="name" href="single.html">Battery Police Bike</a></h5>
                                        <p><span class="item_price">300$</span></p>
                                        <h4 class="sizes">Sizes: <a href="#"> s</a> - <a href="#">m</a> - <a href="#">l</a> - <a href="#">xl</a> </h4>
                                        <ul>
                                                <li><a href="#"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span></a></li>
                                                <li><a class="item_add" href="#"><span class="glyphicon glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
                                                <li><a href="#"><span class="glyphicon glyphicon glyphicon-heart-empty" aria-hidden="true"></span></a></li>
                                        </ul>
                                </div>
                        </div>
                        <div class="clearfix"></div>
                </div>
        </div>
</div>
<!--//gallery-->
<!--trend-->
<div class="trend wow zoomIn animated" data-wow-delay=".5s">
        <div class="container">
                <div class="trend-info">
                        <section class="slider grid">
                                <div class="flexslider trend-slider">
                                        <ul class="slides">
                                                <li>
                                                        <div class="col-md-5 trend-left">
                                                                <img src="<?= Yii::$app->assetManager->getPublishedUrl('@MDAsset') ?>/images/t1.png" alt=""/>
                                                        </div>
                                                        <div class="col-md-7 trend-right">
                                                                <h4>TOP 10 TRENDS <span>FOR YOU</span></h4>
                                                                <h5>Flat 20% OFF</h5>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus, justo ac volutpat vestibulum, dolor massa pharetra nunc, nec facilisis lectus nulla a tortor. Duis ultrices nunc a nisi malesuada suscipit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam eu bibendum felis. Sed viverra dapibus tincidunt.</p>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                </li>
                                                <li>
                                                        <div class="col-md-5 trend-left">
                                                                <img src="<?= Yii::$app->assetManager->getPublishedUrl('@MDAsset') ?>/images/t2.png" alt=""/>
                                                        </div>
                                                        <div class="col-md-7 trend-right">
                                                                <h4>TOP 10 TRENDS <span>FOR YOU</span></h4>
                                                                <h5>Flat 20% OFF</h5>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus, justo ac volutpat vestibulum, dolor massa pharetra nunc, nec facilisis lectus nulla a tortor. Duis ultrices nunc a nisi malesuada suscipit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam eu bibendum felis. Sed viverra dapibus tincidunt.</p>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                </li>
                                                <li>
                                                        <div class="col-md-5 trend-left">
                                                                <img src="<?= Yii::$app->assetManager->getPublishedUrl('@MDAsset') ?>/images/t3.png" alt=""/>
                                                        </div>
                                                        <div class="col-md-7 trend-right">
                                                                <h4>TOP 10 TRENDS <span>FOR YOU</span></h4>
                                                                <h5>Flat 20% OFF</h5>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus, justo ac volutpat vestibulum, dolor massa pharetra nunc, nec facilisis lectus nulla a tortor. Duis ultrices nunc a nisi malesuada suscipit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam eu bibendum felis. Sed viverra dapibus tincidunt.</p>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                </li>
                                                <li>
                                                        <div class="col-md-5 trend-left">
                                                                <img src="<?= Yii::$app->assetManager->getPublishedUrl('@MDAsset') ?>/images/t4.png" alt=""/>
                                                        </div>
                                                        <div class="col-md-7 trend-right">
                                                                <h4>TOP 10 TRENDS <span>FOR YOU</span></h4>
                                                                <h5>Flat 20% OFF</h5>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus, justo ac volutpat vestibulum, dolor massa pharetra nunc, nec facilisis lectus nulla a tortor. Duis ultrices nunc a nisi malesuada suscipit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam eu bibendum felis. Sed viverra dapibus tincidunt.</p>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                </li>
                                        </ul>
                                </div>
                        </section>
                </div>
        </div>
</div>
<!--//trend-->