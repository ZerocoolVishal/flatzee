<?php
/**
 * @var $this yii\web\View
 * @var \app\models\Property $property app\controllers\PropertyController
 */

$this->registerCssFile('@web/lib/photoswipe/photoswipe.css');
$this->registerCssFile('@web/lib/photoswipe/default-skin/default-skin.css');

$this->registerJsFile('@web/lib/photoswipe/photoswipe.min.js', [
    'depends' => [\yii\web\JqueryAsset::className()]
]);
$this->registerJsFile('@web/lib/photoswipe/photoswipe-ui-default.min.js', [
    'depends' => [\yii\web\JqueryAsset::className()]
]);

$this->title = $property->title;

?>

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col col-md-12 col-lg-12 col-xl-10">
            <div class="page-header mb-0">
                <div class="row">
                    <div class="col-md-8">
                        <a href="<?= \yii\helpers\Url::previous() ?>" class="btn-return" title="Back">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <h1><?= $property->title ?>
                            <small><i class="fa fa-map-marker"></i> <?= $property->location ?></small>
                        </h1>
                    </div>
                    <div class="col-md-4">
                        <div class="price">
                            <i class="fa fa-inr" aria-hidden="true"></i>
                            <?= money_format('%!i', $property->price); ?>
                            <!--<small>$900/sq ft</small>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="content" class="item-single">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col col-md-12 col-lg-12 col-xl-10">
                <div class="row row justify-content-md-center has-sidebar">
                    <div class="col-md-7 col-lg-8">
                        <div>
                            <ul class="item-features">
                                <li><span>540</span> sqft</li>
                                <li><span><?= $property->no_of_bedrooms ?></span> BHK</li>
                                <li><span><?= $property->no_of_bedrooms ?></span> Bedrooms</li>
                                <li><span><?= $property->bathroom ?></span> Bathrooms</li>
                            </ul>
                            <div class="item-description">
                                <h3 class="headline">Property description</h3>
                                <?= $property->description ?>
                            </div>
                            <h3 class="headline">Property Details</h3>
                            <ul class="checked_list feature-list">
                                <li><strong>Builtup Age:</strong> <?= $property->build_up_area ?> sqft</li>
                                <li><strong>Parking:</strong> <?= $property->car_parking ?></li>
                            </ul>

                            <?php $i = 1; foreach ($property->bedrooms as $bedroom): ?>

                                <?php if(count($bedroom->bedroomAmenities)): ?>

                                    <h3 class="headline">Bedroom <?= $i ?></h3>
                                    <ul class="checked_list feature-list">
                                        <?php foreach($bedroom->bedroomAmenities as $bedroomAmenities): ?>
                                            <li><?= $bedroomAmenities->amenityIr->name ?></li>
                                        <?php endforeach; ?>
                                    </ul>

                                <?php $i++; endif; ?>

                            <?php endforeach; ?>


                            <div class="item-navigation">
                                <ul class="nav nav-tabs v2" role="tablist">
                                    <li role="presentation"><a href="#map" aria-controls="map" role="tab"
                                                               data-toggle="tab" class="active"><i
                                                    class="fa fa-map"></i> <span
                                                    class="hidden-xs">Map &amp; nearby</span></a></li>
                                    <li role="presentation"><a href="#streetview" aria-controls="streetview" role="tab"
                                                               data-toggle="tab"><i class="fa fa-road"></i> <span
                                                    class="hidden-xs">Street View</span></a></li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="map">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1215.7401235613713!2d1.4497354260471211!3d52.45232942952154!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d9f169c5a088db%3A0x75a6abde48cc5adc!2sKents+Ln%2C+Bungay+NR35+1JF%2C+UK!5e0!3m2!1sen!2sin!4v1489862715790"
                                                width="600" height="450" style="border:0;" allowfullscreen>
                                        </iframe>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="streetview">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m0!3m2!1sen!2s!4v1489861898447!6m8!1m7!1sGz9bS-GXSJE28jHD19m7KQ!2m2!1d52.45191646727986!2d1.451480542718656!3f0!4f0!5f0.8160813932612223"
                                                width="600" height="450" style="border:0" allowfullscreen>
                                        </iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5 col-lg-4">
                        <div id="sidebar" class="sidebar-right">
                            <div class="sidebar_inner">
                                <div id="feature-list" role="tablist">
                                    <div class="card">
                                        <div class="card-header" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse"
                                                                       href="#specification" aria-expanded="true"
                                                                       aria-controls="specification"> Specifications <i
                                                            class="fa fa-caret-down float-right"></i> </a></h4>
                                        </div>
                                        <div id="specification" class="panel-collapse collapse show" role="tabpanel">
                                            <div class="card-body">
                                                <table class="table v1">
                                                    <tr>
                                                        <td>Bedrooms</td>
                                                        <td><?= $property->no_of_bedrooms ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Bathrooms</td>
                                                        <td><?= $property->bathroom ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Buildup area</td>
                                                        <td><?= $property->build_up_area ?> sqft</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Carpet Area</td>
                                                        <td><?= $property->carpet_area ?> sqft</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total Area</td>
                                                        <td><?= $property->super_area ?> sqft</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Floor</td>
                                                        <td><?= $property->floor ?> of <?= $property->total_floor ?>
                                                            Floors
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>