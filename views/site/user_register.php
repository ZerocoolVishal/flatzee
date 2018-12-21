<?php
/**
 * Created by PhpStorm.
 * User: vishal
 * Date: 21/12/18
 * Time: 6:35 PM
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div id="content">
    <div class="container">
        <div class="row justify-content-md-center align-items-center">
            <div class="col col-md-6  col-lg-5 col-xl-4">
                <ul class="nav nav-tabs tab-lg" role="tablist">
                    <li role="presentation" class="nav-item">
                        <?= Html::a('Login', ['site/login'], ['class' => 'nav-link']) ?>
                    </li>
                    <li role="presentation" class="nav-item">
                        <?= Html::a('Register', ['site/register'], ['class' => 'nav-link active']) ?>
                    </li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="login">
                        <?php $form = ActiveForm::begin(); ?>
                        <div class="form-group">
                            <?= $form->field($model, 'first_name') ?>
                        </div>
                        <div class="form-group">
                            <?= $form->field($model, 'last_name') ?>
                        </div>
                        <div class="form-group">
                            <?= $form->field($model, 'username') ?>
                        </div>
                        <div class="form-group">
                            <?= $form->field($model, 'email')->input('email') ?>
                        </div>
                        <div class="form-group">
                            <?= $form->field($model, 'contact_number') ?>
                        </div>
                        <div class="form-group">
                            <?= $form->field($model, 'password')->input('password') ?>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" id="terms">
                            <label for="terms">By registering I accept our Terms of Use and Privacy.</label>
                        </div>
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary btn-lg']) ?>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
                <div></div>
            </div>

            <div class="col-md-6 col-lg-5 col-xl-4">
                <div class="socal-login-buttons"><a href="#" class="btn btn-social btn-block btn-facebook"><i
                                class="icon fa fa-facebook"></i> Continue with Facebook</a> <a href="#"
                                                                                               class="btn btn-social btn-block btn-twitter"><i
                                class="icon fa fa-twitter"></i> Continue with Twitter</a> <a href="#"
                                                                                             class="btn btn-social btn-block btn-google"><i
                                class="icon fa fa-google"></i> Continue with Google</a></div>
            </div>
        </div>
    </div>
</div>

