<?php
use frontend\components\helpFunction;
use frontend\components\widgets\ProductNew;
use kartik\widgets\Select2;
use yii\web\JsExpression;
use yii\web\View;
$url = \yii\helpers\Url::to(['sizelist']);
$data = [
    "red" => "red",
    "green" => "green",
    "blue" => "blue",
    "orange" => "orange",
    "white" => "white",
    "black" => "black",
    "purple" => "purple",
    "cyan" => "cyan",
    "teal" => "teal"
];
?>

<div class="new">
    <div class="container">
        <div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
                <h3 class="title">New <span>Arrivals</span></h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit curabitur </p>
        </div>
        <div class="new-info">
            <?php
            $wow = 5;
            $count = 1;
            foreach ($new as $row) {
                $is_detail = json_decode($row->is_detail);
                if(empty($is_detail)){
                    $imgPath = json_decode($row->image)[0];
                }
                else{
                    if(in_array("color", $is_detail)){
                        $is_color = true;
                    }
                    if(in_array("size", $is_detail)){
                        $is_size = true;
                    }
                    $imgPath = ProductNew::getFirstIMG($row->id);
                }
                $color = ProductNew::getColor($row->id);
                //var_dump($color);
                //var_dump($data);
            ?>



                <div class="col-md-3 new-grid simpleCart_shelfItem wow flipInY animated <?php if($count == 2){ echo 'new-mdl';}elseif($count == 3){ echo 'new-mdl1';} ?>" data-wow-delay=".<?= $wow ?>s" id="item-<?= $row->id ?>">
                    <div class="new-top" id="<?= $row->id ?>">
                        <a href="<?= helpFunction::genSlugURL('product/detail', $row->name); ?>"><img src="<?= $imgPath ?>" class="img-responsive" alt=""/></a>
                            <?php /* slide menu add, select detail item GGWP
                            <div class="new-text">
                                <ul>
                                    <li><a class="item_add"> Add to cart</a></li>
                                    <li><?php 
                                        echo Select2::widget([
                                            'id' => 'pcid-'.$row->id,
                                            'name' => 'color',
                                            'value' => 0, // initial value
                                            'data' => $color,
                                            'options' => ['placeholder' => 'Select a color ...'],
                                            'pluginOptions' => [
                                                'tags' => true,
                                                'tokenSeparators' => [',', ' '],
                                                'maximumInputLength' => 10
                                            ],
                                        ]); 
                                        ?>
                                    </li>
                                    <li><?php echo Select2::widget([
                                            'id' => 'psid-'.$row->id,
                                            'name' => 'size',
                                            'initValueText' => '', // initial value
                                            //'data' => $data,
                                            //'value' => 0,
                                            'options' => ['placeholder' => 'Select a size ...'],
                                            'pluginOptions' => [
                                                'allowClear' => true,
                                                //'tags' => true,
                                                //'tokenSeparators' => [',', ' '],
                                                //'maximumInputLength' => 10,
                                                'language' => [
                                                    'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                                                ],
                                                'ajax' => [
                                                    'url' => $url,
                                                    'dataType' => 'json',
                                                    'data' => new JsExpression('function(params) { return {q:params.term, did: checkColor('.$row->id.')}; }')
                                                ],
                                                
                                            ],
                                            
                                        ]); ?>
                                    </li>
                                    <li><a href="<?= helpFunction::genSlugURL('product/detail', $row->name); ?>">Show Details </a></li>
                                </ul>
                            </div>
                             * 
                             */
                            ?>
                    </div>
                    <div class="new-bottom">
                        <h5><a class="name" href="<?= helpFunction::genSlugURL('product/detail', $row->name); ?>"><?= $row->name ?></a></h5>
                        <p class="item_pid hidden"><?= $row->id ?></p>
                        <p class="item_name hidden"><?= $row->name ?></p>
                        <p class="item_image hidden"><?= $imgPath ?></p>
                        <!--<div class="rating">
                            <span class="on">☆</span>
                            <span class="on">☆</span>
                            <span class="on">☆</span>
                            <span class="on">☆</span>
                            <span>☆</span>
                        </div>-->
                        <div class="ofr">
                            <p class="pric1"><del>฿2000.00</del></p>
                            <p><span class="item_price">฿<?= $row->price ?></span></p>
                        </div>
                        <div class="other-detail hidden">
                            <span class="item_color" id="color-pid-<?= $row->id ?>"></span>
                            <span class="item_size" id="size-pid-<?= $row->id ?>"></span>
                        </div>
                    </div>
                </div>
            <?php
            $wow += 2;
            $count++;
            }
            ?>
                <div class="clearfix"> </div>
        </div>
    </div>
</div>		
<!--//new-->
<?php
$this->registerJs(
    "
        function checkColor(id){
            var color = $('#select2-pcid-'+id+'-container').text();
            //console.log(color);
            return id+'-'+color;
        }
    ",
    View::POS_END
);