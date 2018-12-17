<?php
/**
 * Created by PhpStorm.
 * User: vishal
 * Date: 17/12/18
 * Time: 3:36 PM
 *
 * @var $property \app\models\Property
 */

use yii\helpers\Html;
?>

<div class="item">
    <div class="row">
        <div class="col-lg-5">
            <div class="item-image">
                <a href="#">
                    <?php $imageUrl = (isset($property->images[0]))? ADMIN_BASE.$property->images[0]->url : '@web/img/demo/property/1.jpg' ?>
                    <?= Html::img($imageUrl, ['class' => 'img-fluid']) ?>
                    <div class="item-meta">
                        <div class="item-price">
                            <i class="fa fa-inr" aria-hidden="true"></i>
                            <?= money_format('%!i', $property->price) ?>
                            <!--<small>$777 / sq m</small>-->
                        </div>
                    </div>
                </a>
                <!--<a href="#" class="save-item"><i class="fa fa-star"></i></a>-->
            </div>
        </div>
        <div class="col-lg-7">
            <div class="item-info">
                <h3 class="item-title">
                    <?= Html::a($property->title, ['property/', 'slug' => $property->slug], ['target' => '_blank']) ?>
                </h3>
                <div class="item-location">
                    <i class="fa fa-map-marker"></i> <?= $property->location ?>
                </div>
                <div class="item-details-i">
                    <span class="bedrooms" data-toggle="tooltip" title="3 Bedrooms"> <?= $property->no_of_bedrooms ?> BHK
                </div>
                <div class="item-details">
                    <ul>
                        <li><?= $property->super_area ?> sqft</li>
                        <li>Type <b><?= $property->type0->name ?></b></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="added-on">Listed on <?= $property->date_added ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
