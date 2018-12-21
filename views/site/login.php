<?php
/**
 * Created by PhpStorm.
 * User: vishal
 * Date: 21/12/18
 * Time: 6:20 PM
 *
 * @var  $this \yii\web\View
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = "Login";

?>

<div id="content">
    <div class="container">
        <div class="row justify-content-md-center align-items-center">
            <div class="col col-md-6  col-lg-5 col-xl-4">
                <ul class="nav nav-tabs tab-lg" role="tablist">
                    <li role="presentation" class="nav-item">
                        <?= Html::a('Login', ['site/login'], ['class' => 'nav-link active']) ?>
                    </li>
                    <li role="presentation" class="nav-item">
                        <?= Html::a('Register', ['site/register'], ['class' => 'nav-link']) ?>
                    </li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="login">
                        <?php $form = ActiveForm::begin([
                            'id' => 'login-form',
                        ]); ?>
                            <div class="form-group">
                                <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Username or Email']) ?>
                            </div>
                            <div class="form-group">
                                <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password']) ?>
                            </div>
                            <p class="text-lg-right"><a href="#">Forgot Password</a></p>
                            <?= $form->field($model, 'rememberMe')->checkbox([
                                'template' => "<div class='checkbox'>{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                            ]) ?>
                            <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-lg', 'name' => 'login-button']) ?>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
                <div> </div>
            </div>

            <div class="col-md-6 col-lg-5 col-xl-4">
                <div class="socal-login-buttons"> <a href="#" class="btn btn-social btn-block btn-facebook"><i class="icon fa fa-facebook"></i> Continue with Facebook</a> <a href="#" class="btn btn-social btn-block btn-twitter"><i class="icon fa fa-twitter"></i> Continue with Twitter</a> <a href="#" class="btn btn-social btn-block btn-google"><i class="icon fa fa-google"></i> Continue with Google</a> </div>
            </div>
        </div>
    </div>
</div>