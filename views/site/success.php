<?php
/**
 * Created by PhpStorm.
 * User: Vishal
 * Date: 21/12/18
 * Time: 4:33 PM
 */
?>

<div id="content">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col col-lg-8">
                <div class="error-template text-center"> <i class="fa fa-check fa-5x text-success mb50 animated zoomIn"></i>
                    <h3 class="main-title centered"><span><?= $title ?></span></h3>
                    <div class="main-title-description"><?= $message ?></div>
                    <div class="error-actions">
                        <?= \yii\helpers\Html::a('Continue', [$redirect], ['class' => 'btn btn-primary btn-lg']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

