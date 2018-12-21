<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Enquiries */
/* @var $form ActiveForm */
?>
<div class="site-_enquiryForm">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'first_name') ?>
        <?= $form->field($model, 'last_name') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'contact_number') ?>
        <?= $form->field($model, 'no_of_house') ?>
        <?= $form->field($model, 'location') ?>
        <?= $form->field($model, 'status_id') ?>
        <?= $form->field($model, 'property_type_id') ?>
        <?= $form->field($model, 'bedroos') ?>
        <?= $form->field($model, 'bathrooms') ?>
        <?= $form->field($model, 'area') ?>
        <?= $form->field($model, 'furnishing_status') ?>
        <?= $form->field($model, 'city') ?>
        <?= $form->field($model, 'state') ?>
        <?= $form->field($model, 'country') ?>
        <?= $form->field($model, 'zipcode') ?>
        <?= $form->field($model, 'plan_id') ?>
        <?= $form->field($model, 'avalability') ?>
        <?= $form->field($model, 'address') ?>
        <?= $form->field($model, 'rent_expectation') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-_enquiryForm -->
