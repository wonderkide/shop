<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
//use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
//use frontend\assets\AppAsset;
use frontend\assets\MDAsset;
use common\widgets\Alert;
use yii\web\View;
use yii\helpers\Url;
use frontend\components\widgets\MenuByCategory;
//AppAsset::register($this);
MDAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    
</head>
<body>
<?php $this->beginBody() ?>

<!--header-->
	<div class="header">
		<div class="top-header navbar navbar-default"><!--header-one-->
			<div class="container">
				<div class="nav navbar-nav wow fadeInLeft animated" data-wow-delay=".5s">
                                    <?php
                                    if(Yii::$app->user->isGuest):
                                    ?>
					<p>Welcome to Modern Shoppe <a href="<?= Url::to(['store/register']); ?>">Register </a> Or <a href="<?= Url::to(['store/signin']); ?>">Sign In </a></p>
                                    
                                    <?php 
                                    else:
                                    ?>
                                        <p>Hello <a class="usr-name" id="user-<?= Yii::$app->user->identity->id ?>" href="<?= Url::to(['store/register']); ?>"><?= Yii::$app->user->identity->username ?></a> Or <?= Html::a('ออกจากระบบ', [Url::to('store/logout')], ['class' => '','data-method' => 'post']) ?></p>
                                    <?php endif; ?>
                                </div>
				<div class="nav navbar-nav navbar-right social-icons wow fadeInRight animated" data-wow-delay=".5s">
					<ul>
						<li><a href="#"> </a></li>
						<li><a href="#" class="pin"> </a></li>
						<li><a href="#" class="in"> </a></li>
						<li><a href="#" class="be"> </a></li>
						<li><a href="#" class="you"> </a></li>
						<li><a href="#" class="vimeo"> </a></li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="header-two navbar navbar-default"><!--header-two-->
			<div class="container">
				<div class="nav navbar-nav header-two-left">
					<ul>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 892</li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">mail@example.com</a></li>			
					</ul>
				</div>
				<div class="nav navbar-nav logo wow zoomIn animated" data-wow-delay=".7s">
					<h1><a href="/">Modern <b>Shoppe</b><span class="tag">Everything for Kids world </span> </a></h1>
				</div>
				<div class="nav navbar-nav navbar-right header-two-right">
					<div class="header-right my-account">
						<a href="<?= Url::to(['store/contact']); ?>"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> CONTACT US</a>						
					</div>
					<div class="header-right cart">
						<a href="#"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a>
                                                <h4><a href="<?= Url::to(['store/cart']); ?>">
								<span class="simpleCart_total"> $0.00 </span> (<span id="simpleCart_quantity" class="simpleCart_quantity"> 0 </span>) 
						</a></h4>
						<div class="cart-box">
							<p><a href="javascript:;" class="simpleCart_empty">Empty cart</a></p>
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="top-nav navbar navbar-default"><!--header-three-->
			<div class="container">
				<?= MenuByCategory::widget(); ?>
			</div>
		</div>
	</div>
	<!--//header-->
	<!--banner-->
	<!--<div class="banner">
		<div class="container">
			<div class="banner-text">			
				<div class="col-sm-5 banner-left wow fadeInLeft animated" data-wow-delay=".5s">			
					<h2>On Entire Fashion range</h2>
					<h3>Coming Soon </h3>
					<h4>Our New Designs</h4>
					<div class="count main-row">
						<ul id="example">
							<li><span class="hours">00</span><p class="hours_text">Hours</p></li>
							<li><span class="minutes">00</span><p class="minutes_text">Minutes</p></li>
							<li><span class="seconds">00</span><p class="seconds_text">Seconds</p></li>
						</ul>
							<div class="clearfix"> </div>
                                                        <?php /*
							<!--<script type="text/javascript" src="js/jquery.countdown.min.js"></script>
							<script type="text/javascript">
								$('#example').countdown({
									date: '12/24/2020 15:59:59',
									offset: -8,
									day: 'Day',
									days: 'Days'
								}, function () {
									alert('Done!');
								});
							</script>-->
                                                         * 
                                                         */?>
					</div>

				</div>
				<div class="col-sm-7 banner-right wow fadeInRight animated" data-wow-delay=".5s">			
					<section class="slider grid">
						<div class="flexslider">
							<ul class="slides">
								<li>
									<h4>-30%</h4>
									<img src="<?= Yii::$app->assetManager->getPublishedUrl('@MDAsset') ?>/images/b1.png" alt="">
								</li>
								<li>
									<h4>-25%</h4>
									<img src="<?= Yii::$app->assetManager->getPublishedUrl('@MDAsset') ?>/images/b2.png" alt="">
								</li>
								<li>
									<h4>-32%</h4>
									<img src="<?= Yii::$app->assetManager->getPublishedUrl('@MDAsset') ?>/images/b3.png" alt="">
								</li>
							</ul>
						</div>
					</section>

				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>-->
	<!--//banner-->

    <div class="wrap-content">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>

    <!--footer-->
    <div class="footer">
            <div class="container">
                    <div class="footer-info">
                            <div class="col-md-4 footer-grids wow fadeInUp animated" data-wow-delay=".5s">
                                    <h4 class="footer-logo"><a href="index.html">Modern <b>Shoppe</b> <span class="tag">Everything for Kids world </span> </a></h4>
                                    <p>© 2016 Modern Shoppe . All rights reserved | Design by <a href="http://w3layouts.com" target="_blank">W3layouts</a></p>
                            </div>
                            <div class="col-md-4 footer-grids wow fadeInUp animated" data-wow-delay=".7s">
                                    <h3>Popular</h3>
                                    <ul>
                                            <li><a href="about.html">About Us</a></li>
                                            <li><a href="products.html">new</a></li>
                                            <li><a href="contact.html">Contact Us</a></li>
                                            <li><a href="faq.html">FAQ</a></li>
                                            <li><a href="checkout.html">Wishlist</a></li>
                                    </ul>
                            </div>
                            <div class="col-md-4 footer-grids wow fadeInUp animated" data-wow-delay=".9s">
                                    <h3>Subscribe</h3>
                                    <p>Sign Up Now For More Information <br> About Our Company </p>
                                    <form>
                                            <input type="text" placeholder="Enter Your Email" required="">
                                            <input type="submit" value="Go">
                                    </form>
                            </div>
                            <div class="clearfix"></div>
                    </div>
            </div>
    </div>
    <input class="assets" type="hidden" value="<?= Yii::$app->assetManager->getPublishedUrl('@MDAsset') ?>">
<?php
$this->registerJs(
    "setTimeout(function(){new WOW().init();}, 80);
        
    var defaults = {
        containerID: 'toTop', // fading element id
        containerHoverID: 'toTopHover', // fading element hover id
        scrollSpeed: 1200,
        easingType: 'linear' 
    };
			
    $().UItoTop({ easingType: 'easeOutQuart' });
    
    $('.scroll').click(function(event){		
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
    });
    
    //countdown banner
    $('#example').countdown({
            date: '12/24/2020 15:59:59',
            offset: -8,
            day: 'Day',
            days: 'Days'
    }, function () {
            alert('Done!');
    });
    
    $('.flexslider').flexslider({
        animation: 'pagination',
        start: function(slider){
          $('body').removeClass('loading');
        }
    });
    simpleCart.currency('THB');",
    View::POS_END
);
?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
