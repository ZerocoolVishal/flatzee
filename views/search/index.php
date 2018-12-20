<?php
/**
 * @var $this yii\web\View
 * @var $provider yii\data\ActiveDataProvider
 * @var $locality
 */

use yii\helpers\Html;
use app\models\PropertyTypes;
use yii\helpers\ArrayHelper;

\yii\helpers\Url::remember();

$this->registerJsFile('@web/lib/map/markerclusterer.js');

//Google Maps API
//$this->registerJsFile('https://maps.googleapis.com/maps/api/js?key=AIzaSyBvuspZieDAMlpAVAe2qwlvkk8oQU34dtg&callback=initMap');

$this->registerJsFile('@web/js/property.main.js', [
    'depends' => [\yii\web\JqueryAsset::className()],
    'position' => 2
]);

$apiKey = MAPS_API_KEY;
$this->registerJsFile("https://maps.googleapis.com/maps/api/js?key=$apiKey=places&callback=initMap");

$this->title = "Property Search - " . ucwords($locality);

?>

<div class="map-listing">
    <div class="search-form map-search-form ">
        <div class="card mb-0 mt-0">
            <?= Html::beginForm(['search/'], 'GET') ?>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <?= Html::input('text', 'locality', null, ['class' => 'form-control', 'placeholder' => 'Country, State, County, City, Zip, Title', 'id' => 'searchbox']) ?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <?= Html::dropDownList('type', null, ArrayHelper::map(PropertyTypes::find()->all(), 'id', 'name'), ['class' => 'form-control ui-select']) ?>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?= Html::endForm() ?>
        </div>
    </div>
    <div class="row no-gutters has-map fixed">

        <!--Property search result-->
        <div class="col-md-6 col-lg-7 col-xl-6">
            <div class="search-results">
                <div class="search-results-list">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-lg-2 col-sm-4">
                                <?= \yii\helpers\Html::img('@web/img/demo/icons/1.png', ['width' => 100]) ?>
                            </div>
                            <div class="col-lg-10 col-sm-8">
                                <h1><?= ucwords($locality) ?></h1>
                                Sort By
                                <div class="sorting">
                                    <div class="row justify-content-between">
                                        <div class="col-sm-6 col-lg-4">
                                            <div class="form-group">
                                                <select class="form-control ui-select">
                                                    <option selected="selected">Most recent</option>
                                                    <option>Highest price</option>
                                                    <option>Lowest price</option>
                                                    <option>Most reduced</option>
                                                    <option>Most popular</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="item-listing list">

                        <?php if ($propertyList): ?>

                            <?php foreach ($propertyList as $property): ?>

                                <?= $this->render('_card', ['property' => $property]) ?>

                            <? endforeach; ?>

                        <?php else: ?>

                            <p>Sorry, No property found 😞</p>

                        <?php endif; ?>

                    </div>

                    <!--<nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                    </nav>-->
                </div>
            </div>
        </div>

        <!--Map-->
        <div class="col-md-6 col-lg-5 col-xl-6">
            <div id="map-wrapper">
                <div class="map-panel">
                    <div id="map_wrapper">
                        <div id="map_canvas" class="mapping"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<div class="clearfix"></div>
</div>


