<?php
use kartik\widgets\Alert;

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
        <div class="steps clearfix">
            <ul role="tablist">
                <li role="tab" class="first <?= !$step ? 'current':'done' ?>" aria-disabled="<?= !$step ? 'false':'true' ?>" aria-selected="<?= !$step ? 'true':'false' ?>">
                    <a id="step-cart" href="<?= !$step ? '/store/cart':'' ?>" aria-controls="cart">
                        <span class="number">1.</span> ตะกร้าสินค้า
                    </a>
                </li>
                <li role="tab" class="<?php if(!$step){echo 'disabled';}else if($step=='address'){echo 'current';}else{echo 'done';} ?>" aria-disabled="<?= $step=='address' ? 'false':'true' ?>" aria-selected="<?= $step=='address' ? 'true':'false' ?>">
                    <a id="step-address" href="<?= $step=='address' ? '/store/cart/address':'' ?>" aria-controls="address">
                        <!--<span class="current-info audible">current step: </span>-->
                        <span class="number">2.</span> ที่อยู่สำหรับจัดส่ง
                    </a>
                </li>
                <li role="tab" class="<?php if(!$step||$step=='address'){echo 'disabled';}else if($step=='confirm'){echo 'current';}else{echo 'done';} ?>" aria-disabled="<?= $step=='confirm' ? 'false':'true' ?>" aria-selected="<?= $step=='confirm' ? 'true':'false' ?>">
                    <a id="step-confirm" href="<?= $step=='confirm' ? '/store/cart/confirm':'' ?>" aria-controls="confirm">
                        <span class="number">3.</span> ยืนยันการสั่งซื้อ
                    </a>
                </li>
                <li role="tab" class="last <?= $step=='payment' ? 'current':'disabled' ?>" aria-disabled="<?= $step=='payment' ? 'false':'true' ?>" aria-selected="<?= $step=='payment' ? 'true':'false' ?>">
                    <a id="step-payment" href="<?= $step=='payment' ? '/store/cart/payment':'' ?>" aria-controls="payment">
                        <span class="number">3.</span> ชำระเงิน
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>