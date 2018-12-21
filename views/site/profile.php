<?php
/**
 * Created by PhpStorm.
 * User: vishal
 * Date: 21/12/18
 * Time: 9:45 PM
 *
 * @var $this \yii\web\View
 *
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = "Profile"

?>

<div id="content">

    <div class="container">

        <?php if(isset($message)): ?>
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?= $message ?>
        </div>
        <?php endif; ?>

        <div class="row justify-content-md-center">
            <div class="col col-lg-12 col-xl-10">
                <div class="row">
                    <div class="col-md-7 col-lg-8 col-xl-8">
                        <div class="page-header bordered">
                            <h1>My profile
                                <small>Manage your public profile</small>
                            </h1>
                        </div>
                        <?php $form = ActiveForm::begin(); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?= $form->field($model, 'first_name') ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?= $form->field($model, 'last_name') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <?= $form->field($model, 'username') ?>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?= $form->field($model, 'email') ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?= $form->field($model, 'contact_number') ?>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group action">
                            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary btn-lg']) ?>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
