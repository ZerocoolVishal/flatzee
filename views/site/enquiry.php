<?php
/**
 * Created by PhpStorm.
 * User: vishal
 * Date: 19/12/18
 * Time: 11:53 AM
 *
 * @var $this yii\web\View
 * @var $model app\models\Enquiries
 * @var $form ActiveForm
 *
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\PropertyStatus;
use app\models\PropertyTypes;

$this->title = 'Enquiry Form';

?>

<div id="content">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-7 col-lg-8 col-xl-8">
                <div class="page-header bordered">
                    <h1>List Your Property
                        <small>We've over 15 Lac buyers and tenants for you!</small>
                    </h1>
                </div>
                <?php $form = ActiveForm::begin(); ?>
                <h3 class="subheadline">Anout You</h3>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <?= $form->field($model, 'first_name') ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <?= $form->field($model, 'last_name') ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <?= $form->field($model, 'email')->input('email') ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <?= $form->field($model, 'contact_number')->input('number') ?>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <?= $form->field($model, 'no_of_house')
                                ->dropDownList([
                                        '1' => '1',
                                        '2' => '2',
                                        '3' => '3',
                                        'More than 3' => 'More than 3',
                                ])?>
                        </div>
                    </div>
                </div>

                <h3 class="subheadline">Basic Details</h3>
                <div class="row">
                    <div class="col-sm-6 col-lg-6">
                        <div class="form-group">
                            <?= $form->field($model, 'property_type_id')
                                ->dropDownList(ArrayHelper::map(PropertyTypes::find()->all(), 'id', 'name')) ?>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-6   ">
                        <div class="form-group">
                            <?= $form->field($model, 'bedroos')
                                ->dropDownList([
                                    '1' => '1',
                                    '2' => '2',
                                    '3' => '3',
                                    '4' => '4',
                                    '5' => '5',
                                    'More than 5' => 'More than 5',
                                ])?>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <?= $form->field($model, 'bathrooms')
                                ->dropDownList([
                                    '1' => '1',
                                    '2' => '2',
                                    '3' => '3',
                                    '4' => '4',
                                    '5' => '5',
                                    'More than 5' => 'More than 5',
                                ])?>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-6   ">
                        <div class="form-group">
                            <?= $form->field($model, 'area')->input('number') ?>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-6   ">
                        <div class="form-group">
                            <?= $form->field($model, 'furnishing_status')
                                ->dropDownList([
                                        'Furnished' => 'Furnished',
                                        'Semi-Furnished' => 'Semi-Furnished',
                                        'Not Furnished' => 'Not Furnished',
                                ])?>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-6">
                        <div class="form-group">
                            <?= $form->field($model, 'status_id')
                                ->label('Property Status')
                                ->dropDownList(ArrayHelper::map(PropertyStatus::find()->all(), 'id', 'status_title')) ?>
                        </div>
                    </div>
                </div>

                <h3 class="subheadline">Location</h3>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <?= $form->field($model, 'location')->input('text', ['id' => 'autocomplete']) ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <?= $form->field($model, 'address')->label('Address (Optional)') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <?= $form->field($model, 'city')->input('text', ['id' => 'locality']) ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <?= $form->field($model, 'state')->input('text', ['id' => 'administrative_area_level_1']) ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <?= $form->field($model, 'country')->input('text', ['id' => 'country']) ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <?= $form->field($model, 'zipcode')->input('number', ['id' => 'postal_code']) ?>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-lg btn-primary']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>

    </div>
</div>
</div>
</div>

<script>
    var placeSearch, autocomplete;
    var componentForm = {
        locality: 'long_name',
        administrative_area_level_1: 'long_name',
        country: 'long_name',
        postal_code: 'long_name'
    };

    function initAutocomplete() {
        autocomplete = new google.maps.places.Autocomplete((document.getElementById('autocomplete')), {types: ['geocode']});
        autocomplete.addListener('place_changed', fillInAddress);
    }

    function fillInAddress() {
        var place = autocomplete.getPlace();
        for (var component in componentForm) {
            document.getElementById(component).value = '';
            document.getElementById(component).disabled = false;
        }

        for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            if (componentForm[addressType]) {
                var val = place.address_components[i][componentForm[addressType]];
                document.getElementById(addressType).value = val;
            }
        }
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBvuspZieDAMlpAVAe2qwlvkk8oQU34dtg&libraries=places&callback=initAutocomplete"
        async defer></script>
<script>
    tinymce.init({
        selector: '.text-editor',
        height: 200,
        menubar: false,
        branding: false,
        plugins: [
            'lists link image preview',
        ],
        toolbar: 'undo redo | link | formatselect | bold italic underline  | alignleft aligncenter alignright alignjustify | bullist numlist'
    });
</script>

