<?php
use yii\helpers\Url;
use frontend\components\widgets\mainMenuBlock;
?>
<nav class="navbar" role="navigation">
        <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                </button>
        </div>
        <!--navbar-header-->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav top-nav-info">
                    <?php 
                    foreach ($model as $row) {
                        $parent = mainMenuBlock::findParent($row->id);
                        if(!$parent){
                        ?>
                            <li><a href="<?= Url::to([$row->url]); ?>" class="active"><?= $row->label ?></a></li>
                        <?php
                        }else{
                        ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= $row->label ?><b class="caret"></b></a>
                                <ul class="dropdown-menu multi-column multi-column-new-style">
                                        <div class="row">
                                            <div class="dropdown-new-style">
                                                <?php
                                                $count = count($parent);
                                                $grid = 12/$count;
                                                foreach ($parent as $prow) {
                                                ?>
                                                
                                                <div class="col-sm-<?= $grid ?> menu-grids">
                                                        <ul class="multi-column-dropdown">
                                                                <li><h3><a class="list" href="products.html"><?= $prow->label ?></a></h6></li>
                                                                <h4>Baby Gear</h4>
                                                                <li><a class="list" href="products.html">Baby Walkers</a></li>

                                                        </ul>
                                                </div>
                                                <?php 
                                                }
                                                ?>
                                                <div class="clearfix"> </div>
                                            </div>
                                        </div>
                                </ul>
                        </li>
                        <?php
                        }

                    }
                    ?>
                    <?php /*
                        <li><a href="<?= Url::to(); ?>" class="active">Home</a></li>
                        <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Baby<b class="caret"></b></a>
                                <ul class="dropdown-menu multi-column multi-column1">
                                        <div class="row">
                                                <div class="col-sm-4 menu-grids menulist1">
                                                        <h4>Bath & Care</h4>
                                                        <ul class="multi-column-dropdown ">
                                                                <li><a class="list" href="products.html">Diapering</a></li>
                                                                <li><a class="list" href="products.html">Baby Wipes</a></li>
                                                                <li><a class="list" href="products.html">Baby Soaps</a></li>
                                                                <li><a class="list" href="products.html">Lotions & Oils </a></li>
                                                                <li><a class="list" href="products.html">Powders</a></li>
                                                                <li><a class="list" href="products.html">Shampoos</a></li>
                                                        </ul>
                                                        <ul class="multi-column-dropdown">
                                                                <li><a class="list" href="products.html">Body Wash</a></li>
                                                                <li><a class="list" href="products.html">Cloth Diapers</a></li>
                                                                <li><a class="list" href="products.html">Baby Nappies</a></li>
                                                                <li><a class="list" href="products.html">Medical Care</a></li>
                                                                <li><a class="list" href="products.html">Grooming</a></li>
                                                                <li><h6><a class="list" href="products.html">Combo Packs</a></h6></li>
                                                        </ul>
                                                </div>																		
                                                <div class="col-sm-2 menu-grids">
                                                        <h4>Baby Clothes</h4>
                                                        <ul class="multi-column-dropdown">
                                                                <li><a class="list" href="products.html">Onesies & Rompers</a></li>
                                                                <li><a class="list" href="products.html">Frocks</a></li>
                                                                <li><a class="list" href="products.html">Socks & Tights</a></li>
                                                                <li><a class="list" href="products.html">Sweaters & Caps</a></li>
                                                                <li><a class="list" href="products.html">Night Wear</a></li>
                                                                <li><a class="list" href="products.html">Quilts & Wraps</a></li>
                                                        </ul>
                                                </div>
                                                <div class="col-sm-3 menu-grids">
                                                        <ul class="multi-column-dropdown">
                                                                <li><a class="list" href="products.html">Blankets</a></li>
                                                                <li><a class="list" href="products.html">Gloves & Mittens</a></li>
                                                                <h4>Shop by Age</h4>
                                                                <li><a class="list" href="products.html">New Born (0 - 5 M)</a></li>
                                                                <li><a class="list" href="products.html">5 - 10 Months</a></li>
                                                                <li><a class="list" href="products.html">10 - 15 Months</a></li>
                                                                <li><a class="list" href="products.html">15 Months Above</a></li>
                                                        </ul>
                                                </div>
                                                <div class="col-sm-3 menu-grids">
                                                        <ul class="multi-column-dropdown">
                                                                <li><h6><a class="list" href="products.html">Feeding & Nursing</a></h6></li>
                                                                <h4>Baby Gear</h4>
                                                                <li><a class="list" href="products.html">Baby Walkers</a></li>
                                                                <li><a class="list" href="products.html">Strollers</a></li>
                                                                <li><a class="list" href="products.html">Prams & Toys</a></li>
                                                                <li><a class="list" href="products.html">Cribs & Cradles</a></li>
                                                                <li><a class="list" href="products.html">Booster Seats</a></li>
                                                        </ul>
                                                </div>
                                                <div class="clearfix"> </div>
                                        </div>
                                </ul>
                        </li>
                        <li class="dropdown grid">
                                <a href="#" class="dropdown-toggle list1" data-toggle="dropdown">Kids<b class="caret"></b></a>
                                <ul class="dropdown-menu multi-column multi-column2">
                                        <div class="row">
                                                <div class="col-sm-3 menu-grids">
                                                        <h4>New Arrivals</h4>
                                                        <ul class="multi-column-dropdown">
                                                                <li><a class="list" href="products.html">Topwear</a></li>
                                                                <li><a class="list" href="products.html">Bottomwear</a></li>
                                                                <li><a class="list" href="products.html">Innerwear</a></li>
                                                                <li><a class="list" href="products.html">Nightwear</a></li>
                                                                <li><a class="list" href="products.html">Swimwear</a></li>
                                                                <li><a class="list" href="products.html">Jumpers</a></li>
                                                        </ul>
                                                </div>																		
                                                <div class="col-sm-3 menu-grids">
                                                        <h4>Boys</h4>
                                                        <ul class="multi-column-dropdown">
                                                                <li><a class="list" href="products.html">Jeans</a></li>
                                                                <li><a class="list" href="products.html">Shirts</a></li>
                                                                <li><a class="list" href="products.html">T-shirts</a></li>
                                                                <li><a class="list" href="products.html">Dhoti Kurta Sets</a></li>
                                                                <li><a class="list" href="products.html">Winter wear</a></li>
                                                                <li><a class="list" href="products.html">Party Wear</a></li>
                                                        </ul>
                                                </div>
                                                <div class="col-sm-3 menu-grids">
                                                        <h4>Girls</h4>
                                                        <ul class="multi-column-dropdown">
                                                                <li><a class="list" href="products.html">Tops</a></li>
                                                                <li><a class="list" href="products.html">Leggings</a></li>
                                                                <li><a class="list" href="products.html">Dresses </a></li>
                                                                <li><a class="list" href="products.html">Skirts</a></li>
                                                                <li><a class="list" href="products.html">Casual Dresses</a></li>
                                                                <li><a class="list" href="products.html">Capris & 3/4ths</a></li>
                                                        </ul>
                                                </div>
                                                <div class="col-sm-3 menu-grids new-add2">
                                                        <a href="products.html">
                                                                <h6>Kids Special</h6>
                                                                <img src="<?= Yii::$app->assetManager->getPublishedUrl('@MDAsset') ?>/images/img1.jpg" alt="">
                                                        </a>
                                                </div>
                                                <div class="clearfix"> </div>
                                        </div>
                                </ul>
                        </li>
                        <li class="dropdown grid">
                                <a href="#" class="dropdown-toggle list1" data-toggle="dropdown">Accessories<b class="caret"></b></a>
                                <ul class="dropdown-menu multi-column menu-two multi-column3">
                                        <div class="row">
                                                <div class="col-sm-4 menu-grids">
                                                        <ul class="multi-column-dropdown">
                                                                <li><a class="list" href="products.html">Jewellery</a></li>
                                                                <li><a class="list" href="products.html">Hair bands & Clips</a></li>
                                                                <li><a class="list" href="products.html">Bangles </a></li>
                                                                <li><a class="list" href="products.html">Caps & Belts</a></li>
                                                                <li><a class="list" href="products.html">Rain wear</a></li>
                                                                <li><a class="list" href="products.html">Bags</a></li>
                                                        </ul>
                                                </div>
                                                <div class="col-sm-8 menu-grids">
                                                        <a href="products.html">
                                                                <div class="new-add">
                                                                        <h5>30% OFF <br> Today Only</h5>
                                                                </div>	
                                                        </a>
                                                </div>	
                                                <div class="clearfix"> </div>
                                        </div>	
                                </ul>
                        </li>				
                        <li class="dropdown grid">
                                <a href="#" class="dropdown-toggle list1" data-toggle="dropdown">Toys <b class="caret"></b></a>
                                <ul class="dropdown-menu multi-column multi-column4">
                                        <div class="row">
                                                <div class="col-sm-4 menu-grids menulist1">
                                                        <h4>BABY</h4>
                                                        <ul class="multi-column-dropdown ">
                                                                <li><a class="list" href="products.html">Rockers</a></li>
                                                                <li><a class="list" href="products.html">Rattles</a></li>
                                                                <li><a class="list" href="products.html">Stroller Toys</a></li>
                                                                <li><a class="list" href="products.html">Musical Toys </a></li>
                                                                <li><a class="list" href="products.html">Doll Houses</a></li>
                                                                <li><a class="list" href="products.html">Play Sets</a></li>
                                                        </ul>
                                                        <ul class="multi-column-dropdown">
                                                                <li><a class="list" href="products.html">Toys Dolls</a></li>
                                                                <li><a class="list" href="products.html">Pacifiers</a></li>
                                                                <li><a class="list" href="products.html">Building Sets</a></li>
                                                                <li><a class="list" href="products.html">Bath Toys</a></li>
                                                                <li><a class="list" href="products.html">Soft Toys</a></li>
                                                                <li><h6><a class="list" href="products.html">Special Off</a></h6></li>
                                                        </ul>
                                                </div>																		
                                                <div class="col-sm-2 menu-grids">
                                                        <h4>Pretend Play</h4>
                                                        <ul class="multi-column-dropdown">
                                                                <li><h6><a class="list" href="products.html">Video Games</a></h6></li>
                                                                <li><a class="list" href="products.html">Kitchen Sets</a></li>
                                                                <li><a class="list" href="products.html">Sand Toys</a></li>
                                                                <li><a class="list" href="products.html">Tool Sets</a></li>
                                                                <li><a class="list" href="products.html">Bath Toys</a></li>
                                                                <li><a class="list" href="products.html">Medical Set</a></li>
                                                        </ul>
                                                </div>
                                                <div class="col-sm-2 menu-grids">
                                                        <h4>Outdoor</h4>
                                                        <ul class="multi-column-dropdown">
                                                                <li><a class="list" href="products.html">Swimming</a></li>
                                                                <li><a class="list" href="products.html">Rideons </a></li>
                                                                <li><a class="list" href="products.html">Scooters</a></li>
                                                                <li><a class="list" href="products.html">Remote Control</a></li>
                                                                <li><a class="list" href="products.html">Animals</a></li>
                                                                <li><a class="list" href="products.html">Make up</a></li>
                                                        </ul>
                                                </div>
                                                <div class="col-sm-4 menu-grids">
                                                        <a href="products.html">
                                                                <div class="new-add">
                                                                        <h5>30% OFF <br> Today Only</h5>
                                                                </div>
                                                        </a>	
                                                </div>
                                                <div class="clearfix"> </div>
                                        </div>
                                </ul>
                        </li>
                        <li><a href="codes.html">Special Offers</a></li>
                     * 
                     */?>
                </ul> 
                <div class="clearfix"> </div>
                <!--//navbar-collapse-->
                <header class="cd-main-header">
                        <ul class="cd-header-buttons">
                                <li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
                        </ul> <!-- cd-header-buttons -->
                </header>
        </div>
        <!--//navbar-header-->
</nav>
<div id="cd-search" class="cd-search">
        <form>
                <input type="search" placeholder="Search...">
        </form>
</div>