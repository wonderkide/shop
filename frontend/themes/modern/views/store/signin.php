<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<!--login-->
<div class="login-page">
        <div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
                <h3 class="title">SignIn<span> Form</span></h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit curabitur </p>
        </div>
        <div class="widget-shadow">
                <div class="login-top wow fadeInUp animated" data-wow-delay=".7s">
                        <h4>Welcome back to Modern Shoppe ! <br> Not a Member? <a href="/store/register">  Register Now »</a> </h4>
                </div>
                <div class="login-body wow fadeInUp animated" data-wow-delay=".7s">
                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                        <!--<form>
                                <input type="text" class="user" name="email" placeholder="Enter your email" required="">
                                <input type="password" name="password" class="lock" placeholder="Password">
                                <input type="submit" name="Sign In" value="Sign In">
                                <div class="forgot-grid">
                                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Remember me</label>
                                        <div class="forgot">
                                                <a href="#">Forgot Password?</a>
                                        </div>
                                        <div class="clearfix"> </div>
                                </div>
                        </form>-->
                        <?= $form->field($model, 'username')->textInput(['class' => 'user', 'placeholder' => 'Enter your email']) ?>

                        <?= $form->field($model, 'password')->passwordInput(['class' => 'lock', 'placeholder' => 'Password']) ?>
                        <div class="form-group">
                            <?= Html::submitButton('Sign In', ['class' => '', 'name' => 'login-button']) ?>
                        </div>
                        
                        <div class="forgot-grid">
                            <?php //echo $form->field($model, 'rememberMe')->checkbox() ?>
                            <label class="checkbox"><input type="checkbox" name="remember"><i></i>Remember me</label>
                            <div class="forgot">
                                <?= Html::a('Forgot Password?', ['site/request-password-reset']) ?>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
        </div>
        <div class="login-page-bottom">
                <h5> - OR -</h5>
                <div class="social-btn"><a href="#"><i>Sign In with Facebook</i></a></div>
                <div class="social-btn sb-two"><a href="#"><i>Sign In with Twitter</i></a></div>
        </div>
</div>
<!--//login-->