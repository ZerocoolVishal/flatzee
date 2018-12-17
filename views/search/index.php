<?php
/**
 * @var $this yii\web\View
 * @var $provider yii\data\ActiveDataProvider
 */

use yii\helpers\Html;
use app\models\PropertyTypes;
use yii\helpers\ArrayHelper;

\yii\helpers\Url::remember();

$this->registerJsFile('@web/lib/map/markerclusterer.js');

$this->title = "Property Search";

$propertyList = \app\models\Property::find()->all();

?>

<div class="map-listing">
    <div class="search-form map-search-form ">
        <div class="card mb-0 mt-0">
            <?= Html::beginForm(['search/'], 'GET') ?>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <?= Html::input('text', 'locality', null, ['class' => 'form-control', 'placeholder' => 'Country, State, County, City, Zip, Title']) ?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <?= Html::dropDownList('Dropdown',null, ArrayHelper::map(PropertyTypes::find()->all(), 'id', 'name'), ['class' => 'form-control ui-select']) ?>
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
                            <div class="col-2">
                                <?= \yii\helpers\Html::img('@web/img/demo/icons/1.png', ['width' => 100]) ?>
                            </div>
                            <div class="col-10">
                                <h1>Badlapur, Thane, Maharashtra</h1>
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

                        <?php foreach ($propertyList as $property): ?>

                            <?= $this->render('_card', ['property' => $property]) ?>

                        <? endforeach; ?>

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
    <button id="toggle-filters" class="btn btn-primary btn-circle mobile-filter"><i class="fa fa-filter"></i></button>
    <div id="sidebar" class="sidebar-left">
        <button class="close-panel btn btn-white"><i class="fa fa-long-arrow-left"></i></button>
        <div class="sidebar_inner">
            <div id="filters">
                <div class="card">
                    <div class="card-header">
                        <h4 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion"
                                                   href="#p_budget" aria-expanded="true" aria-controls="p_type"> Budget
                                <i class="fa fa-caret-down float-right"></i> </a></h4>
                    </div>
                    <div id="p_budget" class="panel-collapse collapse" role="tabpanel">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control input-sm" placeholder="Min">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control input-sm" placeholder="Max">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion"
                                                   href="#p_type" aria-expanded="true" aria-controls="p_type"> Property
                                Type <i class="fa fa-caret-down float-right"></i> </a></h4>
                    </div>
                    <div id="p_type" class="panel-collapse collapse show" role="tabpanel">
                        <div class="card-body">
                            <div class="checkbox ">
                                <input type="checkbox" value="1" id="house">
                                <label for="house">House</label>
                            </div>
                            <div class="checkbox ">
                                <input type="checkbox" value="1" id="flat">
                                <label for="flat">Flat</label>
                            </div>
                            <div class="checkbox ">
                                <input type="checkbox" value="1" id="appartment">
                                <label for="appartment">Appartment</label>
                            </div>
                            <div class="checkbox ">
                                <input type="checkbox" value="1" id="farms">
                                <label for="farms">Farms/Lands</label>
                            </div>
                            <div class="checkbox ">
                                <input type="checkbox" value="1" id="room">
                                <label for="room">Room</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion"
                                                   href="#p_features" aria-expanded="true" aria-controls="p_features">
                                Features <i class="fa fa-caret-down float-right"></i> </a></h4>
                    </div>
                    <div id="p_features" class="panel-collapse collapse show" role="tabpanel">
                        <div class="card-body">
                            <div class="checkbox">
                                <input type="checkbox" value="" id="garden">
                                <label for="garden"> Garden</label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" value="" id="parking">
                                <label for="parking"> Parking</label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" value="" id="fireplace">
                                <label for="fireplace"> Fireplace</label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" value="" id="restaurant">
                                <label for="restaurant"> Restaurant</label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" value="" id="school">
                                <label for="school"> School</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="clearfix"></div>
<!-- Contact Agent Modal -->
<div class="modal fade  item-badge-rightm" id="leadform" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="media">
                    <div class="media-left"><a href="property_single.html"><img src="img/demo/property/1.jpg"
                                                                                class="img-rounded" width="64"
                                                                                alt=""></a></div>
                    <div class="media-body">
                        <h4 class="media-heading">Send Message for<br>
                            <small><a href="property_single.html">3 bed semi-detached house for sale</a></small>
                        </h4>
                        <ul class="list-unstyled">
                            <li><i class="fa fa-map-marker"></i> Kirkstone Road, Middlesbrough TS3</li>
                            <li><a href="tel:01502392905"><i class="fa fa-phone fa-fw" aria-hidden="true"></i> Call:
                                    01502 392905</a></li>
                        </ul>
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="lead_name">Your Name</label>
                        <input type="text" class="form-control" id="lead_name" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <label for="lead_email">Your Email</label>
                        <input type="email" class="form-control" id="lead_email" placeholder="Your Email">
                    </div>
                    <div class="form-group">
                        <label for="lead_phone">Your Telephone</label>
                        <input type="tel" class="form-control" id="lead_phone" placeholder="Your Telephone">
                    </div>
                    <div class="form-group">
                        <label for="lead_message">Message</label>
                        <textarea rows="4" class="form-control" id="lead_message"
                                  placeholder="Please include any useful details, i.e. current status, availability for viewings, etc."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Send Message</button>
            </div>
        </div>
    </div>
</div>
</div>

<script src="lib/map/markerclusterer.js"></script>
<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBvuspZieDAMlpAVAe2qwlvkk8oQU34dtg&callback=initMap"></script>
<script>
    function initMap() {
        var bounds = new google.maps.LatLngBounds();
        var map;
        map = new google.maps.Map(document.getElementById("map_canvas"));
        map.setTilt(45);
        var arrow_icon = {
            path: 'M50,0C31.294,0,16.129,15.165,16.129,33.87c0,0.401,0.012,0.809,0.03,1.221c0.127,3.558,0.798,6.975,1.939,10.172  C25.324,69.015,50,100,50,100s24.673-30.982,31.9-54.734c1.143-3.197,1.813-6.617,1.939-10.175c0.02-0.412,0.031-0.819,0.031-1.221  C83.871,15.165,68.706,0,50,0z M50,50.459c-9.161,0-16.589-7.428-16.589-16.589c0-9.16,7.428-16.588,16.589-16.588  c9.162,0,16.589,7.428,16.589,16.588C66.589,43.031,59.162,50.459,50,50.459z',
            strokeOpacity: 1,
            strokeWeight: 1,
            fillColor: '#563d7c',
            fillOpacity: 1,
            rotation: 0,
            scale: 0.4
        };
        var infoWin = new google.maps.InfoWindow();
        var markers = locations.map(function(location, i) {
            var position = new google.maps.LatLng(location.lat, location.lng);
            bounds.extend(position);
            var marker = new google.maps.Marker({
                position: position,
                map: map,
                icon: arrow_icon,
            });
            google.maps.event.addListener(marker, 'click', function(evt) {
                infoWin.setContent(location.info);
                infoWin.open(map, marker);
            })
            map.fitBounds(bounds);
            return marker;
        });
        var mcOptions = {
            styles:[{
                url:'img/cluster/m1.png',
                width: 53,
                height:53,
                textSize:14,
                textColor:"#fff",
            }]
        };
        var markerCluster = new MarkerClusterer(map, markers, mcOptions);

    }
    var locations = [{
        lat: -19.9286,
        lng: -43.93888,
        info: "3 bed semi-detached house for sale"
    }, {
        lat: -19.85758,
        lng: -43.9668,
        info: "2 bed room house for rent"
    }, {
        lat: -18.24587,
        lng: -43.59613,
        info: "marker 3"
    }, {
        lat: -20.46427,
        lng: -45.42629,
        info: "marker 4"
    }, {
        lat: -20.37817,
        lng: -43.41641,
        info: "marker 5"
    }, {
        lat: -20.09749,
        lng: -43.48831,
        info: "marker 6"
    }, {
        lat: -21.13594,
        lng: -44.26132,
        info: "marker 7"
    }, ];

    $(window).resize(function() {
        initMap();
    });
</script>
<script>
    $(document).ready(function() {
        function mapWindow() {
            var windowHeight = $(window).height();
            var windowWidth = $(window).width();
            var menuHeight = $('#menu').height();
            var heightD = windowHeight;
            if(windowWidth > 767) {
                $('#map_wrapper').height(heightD);
            } else {
                $('#map_wrapper').height('auto');
            }
        }
        mapWindow();
        $(window).resize(function() {
            mapWindow();
        });
    });
    $('.has-map.fixed>*').theiaStickySidebar({
        additionalMarginTop: 0,
        additionalMarginBottom:0,
        minWidth: 767,
    });
</script>
<script>
    $(document).ready(function() {
        $('#toggle-filters').sidr({
            side: 'left',
            displace : false,
            renaming : false,
            name: 'sidebar',
            source: function() {
                AOS.refresh();
            },

        });
    });

</script>