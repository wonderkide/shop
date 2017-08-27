<?php
use kartik\tabs\TabsX;

kartik\color\ColorInputAsset::register($this);
kartik\base\Html5InputAsset::register($this);
kartik\base\WidgetAsset::register($this);

$this->registerJsFile(
    Yii::$app->assetManager->getPublishedUrl('@admAsset').'/js/multi-color-input.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);

$this->title = 'Products Detail : ' . $parent->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$pDetail = json_decode($parent->is_detail);
if(in_array("color", $pDetail) && in_array("size", $pDetail)){
$items = [
    [
        'label'=>'<i class="glyphicon glyphicon-picture"></i> Color & Image',
        'content'=> $this->render('detail/color', [
                        'model' => $model,
                        'parent' => $parent,
                        'upload' => $upload,
                    ]),
        'active'=>$active == 'color' ? true:FALSE
    ],
    [
        'label'=>'<i class="glyphicon glyphicon-plus-sign"></i> Size',
        'content'=> $this->render('detail/size_for_color', [
                        'model' => $model,
                        'parent' => $parent,
                        'upload' => $upload,
                    ]),
        'active'=>$active == 'size' ? true:FALSE
    ],
];
}
else if(in_array("color", $pDetail) && !in_array("size", $pDetail)){
    $items = [
        [
            'label'=>'<i class="glyphicon glyphicon-picture"></i> Color & Image',
            'content'=> $this->render('detail/color', [
                            'model' => $model,
                            'parent' => $parent,
                            'upload' => $upload,
                        ]),
            'active'=>true
        ],
        [
        'label'=>'<i class="glyphicon glyphicon-plus-sign"></i> Quantity',
            'content'=> $this->render('detail/qtt_for_color', [
                            'model' => $model,
                            'parent' => $parent,
                            'upload' => $upload,
                        ]),
            'active'=>$active == 'size' ? true:FALSE
        ],
    ];
}
else if(!in_array("color", $pDetail) && in_array("size", $pDetail)){
    $items = [
        [
            'label'=>'<i class="glyphicon glyphicon-plus-sign"></i> Size',
            'content'=> $this->render('detail/size', [
                            'model' => $model,
                            'parent' => $parent,
                            'upload' => $upload,
                        ]),
            'active'=>true
        ],
    ];
}
else{
    $items = [
        [
            'label'=>'<i class="glyphicon glyphicon-plus-sign"></i> Detail & Quantity',
            'content'=> $this->render('detail/qtt', [
                            'model' => $model,
                            'parent' => $parent,
                            'upload' => $upload,
                        ]),
            'active'=>true
        ],
    ];
}

?>
<section class="product-detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <?php
                echo TabsX::widget([
                    'items'=>$items,
                    'position'=>TabsX::POS_ABOVE,
                    'encodeLabels'=>false
                ]);
                ?>
                
            </div>
        </div>
    </div>
</section>
