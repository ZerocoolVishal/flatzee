<?php
/**
 * @var $this yii\web\View
 * @var \app\models\Property $property app\controllers\PropertyController
 */

$this->registerCssFile('@web/lib/photoswipe/photoswipe.css');
$this->registerCssFile('@web/lib/photoswipe/default-skin/default-skin.css');

$this->registerJsFile('@web/lib/photoswipe/photoswipe.min.js');
$this->registerJsFile('@web/lib/photoswipe/photoswipe-ui-default.min.js');

$this->title = $property->title;

?>

<div class="swiper-container item-gallery item-listing grid gallery-top" style="margin-top: -45px" data-pswp-uid="1">
    <div class="swiper-wrapper lazyload">

        <div class="swiper-slide">
            <div class="item">
                <div class="item-image">
                    <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                        <a href="img/demo/property/1.jpg" itemprop="contentUrl" data-size="2000x1414">
                            <!---<img src="img/demo/property/1.jpg" class="img-fluid swiper-lazy" alt="Drawing Room">-->
                            <?= \yii\helpers\Html::img('@web/img/demo/property/1.jpg', ['class' => 'img-fluid swiper-lazy']) ?>
                        </a>
                    </figure>
                </div>
            </div>
        </div>
        <div class="swiper-slide">
            <div class="item">
                <div class="item-image">
                    <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                        <a href="img/demo/property/2.jpg" itemprop="contentUrl" data-size="2000x1414">
                            <?= \yii\helpers\Html::img('@web/img/demo/property/2.jpg', ['class' => 'img-fluid swiper-lazy']) ?>
                        </a>
                    </figure>
                </div>
            </div>
        </div>
        <div class="swiper-slide">
            <div class="item">
                <div class="item-image">
                    <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                        <a href="img/demo/property/3.jpg" itemprop="contentUrl" data-size="2000x1414">
                            <?= \yii\helpers\Html::img('@web/img/demo/property/3.jpg', ['class' => 'img-fluid swiper-lazy']) ?>
                        </a>
                    </figure>
                </div>
            </div>
        </div>
        <div class="swiper-slide">
            <div class="item">
                <div class="item-image">
                    <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                        <a href="img/demo/property/4.jpg" itemprop="contentUrl" data-size="2000x1414">
                            <?= \yii\helpers\Html::img('@web/img/demo/property/4.jpg', ['class' => 'img-fluid swiper-lazy']) ?>
                        </a>
                    </figure>
                </div>
            </div>
        </div>
        <div class="swiper-slide">
            <div class="item">
                <div class="item-image">
                    <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                        <a href="img/demo/property/5.jpg" itemprop="contentUrl" data-size="2000x1414">
                            <?= \yii\helpers\Html::img('@web/img/demo/property/1.jpg', ['class' => 'img-fluid swiper-lazy']) ?>
                        </a>
                    </figure>
                </div>
            </div>
        </div>

    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col col-md-12 col-lg-12 col-xl-10">
            <div class="page-header mb-0">
                <div class="row">
                    <div class="col-md-8">
                        <a href="#" class="btn-return" title="Back"><i class="fa fa-angle-left"></i></a>
                        <h1><?= $property->title ?> <small><i class="fa fa-map-marker"></i> <?= $property->location ?></small></h1>
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
                                <li><span>540</span> sqft </li>
                                <li><span><?= $property->no_of_bedrooms ?></span> BHK </li>
                                <li><span><?= $property->no_of_bedrooms ?></span> Bedrooms </li>
                                <li><span><?= $property->bathroom ?></span> Bathrooms </li>
                            </ul>
                            <div class="item-description">
                                <h3 class="headline">Property description</h3>
                                <?= $property->description ?>
                            </div>
                            <h3 class="headline">Property Details</h3>
                            <ul class="checked_list feature-list">
                                <li><strong>Builtup Age:</strong> <?= $property->build_up_area ?> sqft</li>
                                <li><strong>Parking:</strong> Attached Garage</li>
                                <li><strong>Cooling:</strong> Central Cooling</li>
                            </ul>

                            <h3 class="headline">Property Features</h3>
                            <ul class="checked_list feature-list">
                                <li>Alarm</li>
                                <li>Gym</li>
                                <li>Internet</li>
                                <li>Swimming Pool</li>
                                <li>Window Covering</li>
                            </ul>

                            <div class="item-navigation">
                                <ul class="nav nav-tabs v2" role="tablist">
                                    <li role="presentation"><a href="#map" aria-controls="map" role="tab" data-toggle="tab" class="active"><i class="fa fa-map"></i> <span class="hidden-xs">Map &amp; nearby</span></a></li>
                                    <li role="presentation"><a href="#streetview" aria-controls="streetview" role="tab" data-toggle="tab"><i class="fa fa-road"></i> <span class="hidden-xs">Street View</span></a></li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="map">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1215.7401235613713!2d1.4497354260471211!3d52.45232942952154!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d9f169c5a088db%3A0x75a6abde48cc5adc!2sKents+Ln%2C+Bungay+NR35+1JF%2C+UK!5e0!3m2!1sen!2sin!4v1489862715790" width="600" height="450" style="border:0;" allowfullscreen></iframe>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="streetview">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m0!3m2!1sen!2s!4v1489861898447!6m8!1m7!1sGz9bS-GXSJE28jHD19m7KQ!2m2!1d52.45191646727986!2d1.451480542718656!3f0!4f0!5f0.8160813932612223" width="600" height="450" style="border:0" allowfullscreen></iframe>
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
                                            <h4 class="panel-title"> <a role="button" data-toggle="collapse" href="#specification" aria-expanded="true" aria-controls="specification"> Specifications <i class="fa fa-caret-down float-right"></i> </a> </h4>
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
                                                        <td><?= $property->floor ?> of <?= $property->total_floor ?> Floors</td>
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

<!-- Root element of PhotoSwipe. Must have class pswp. -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

    <!-- Background of PhotoSwipe.
         It's a separate element, as animating opacity is faster than rgba(). -->
    <div class="pswp__bg"></div>

    <!-- Slides wrapper with overflow:hidden. -->
    <div class="pswp__scroll-wrap">

        <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
        <!-- don't modify these 3 pswp__item elements, data is added later on. -->
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">

            <div class="pswp__top-bar">

                <!--  Controls are self-explanatory. Order can be changed. -->

                <div class="pswp__counter"></div>

                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                <button class="pswp__button pswp__button--share" title="Share"></button>

                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                <!-- element will get class pswp__preloader--active when preloader is running -->
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div>

            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>

            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>

            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>

        </div>

    </div>

</div>
<script type="text/javascript">
    // Photoswipe

    var initPhotoSwipeFromDOM = function(gallerySelector) {
        var parseThumbnailElements = function(el) {
            console.log(el);
            var thumbElements = $(el).closest(main_gallery).find('figure'),
                numNodes = thumbElements.length,
                items = [],
                figureEl,
                linkEl,
                size,
                item;

            for (var i = 0; i < numNodes; i++) {

                figureEl = thumbElements[i]; // <figure> element

                // include only element nodes
                if (figureEl.nodeType !== 1) {
                    continue;
                }

                linkEl = figureEl.children[0]; // <a> element

                size = linkEl.getAttribute('data-size').split('x');

                // create slide object
                item = {
                    src: linkEl.getAttribute('href'),
                    w: parseInt(size[0], 10),
                    h: parseInt(size[1], 10)
                };



                if (figureEl.children.length > 1) {
                    // <figcaption> content
                    item.title = figureEl.children[1].innerHTML;
                }

                if (linkEl.children.length > 0) {
                    // <img> thumbnail element, retrieving thumbnail url
                    item.msrc = linkEl.children[0].getAttribute('src');
                }

                item.el = figureEl; // save link to element for getThumbBoundsFn
                items.push(item);
            }

            return items;
        };

        // find nearest parent element
        var closest = function closest(el, fn) {
            return el && (fn(el) ? el : closest(el.parentNode, fn));
        };

        // triggers when user clicks on thumbnail
        var onThumbnailsClick = function(e) {
            e = e || window.event;
            e.preventDefault ? e.preventDefault() : e.returnValue = false;

            var eTarget = e.target || e.srcElement;

            // find root element of slide
            var clickedListItem = closest(eTarget, function(el) {
                return (el.tagName && el.tagName.toUpperCase() === 'FIGURE');
            });

            if (!clickedListItem) {
                return;
            }
            var clickedGallery = clickedListItem.parentNode,
                childNodes = $(clickedListItem).closest(main_gallery).find('figure'),
                numChildNodes = childNodes.length,
                nodeIndex = 0,
                index;

            for (var i = 0; i < numChildNodes; i++) {
                if (childNodes[i].nodeType !== 1) {
                    continue;
                }

                if (childNodes[i] === clickedListItem) {
                    index = nodeIndex;
                    break;
                }
                nodeIndex++;
            }
            if (index >= 0) {
                // open PhotoSwipe if valid index found
                openPhotoSwipe(index, clickedGallery);
            }
            return false;
        };

        var openPhotoSwipe = function(index, galleryElement, disableAnimation) {
            var pswpElement = document.querySelectorAll('.pswp')[0],
                gallery,
                options,
                items;

            items = parseThumbnailElements(galleryElement);

            // define options (if needed)
            options = {
                history: false,
                bgOpacity: 0.8,
                loop: false,
                barsSize: {
                    top: 0,
                    bottom: 'auto'
                },

                // define gallery index (for URL)
                galleryUID: $(galleryElement).closest(main_gallery).attr('data-pswp-uid'),

                getThumbBoundsFn: function(index) {
                    // See Options -> getThumbBoundsFn section of documentation for more info
                    var thumbnail = document.querySelectorAll(main_gallery+' img')[index],
                        //var thumbnail = items[index].el.getElementsByTagName('img')[0], // find thumbnail
                        pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
                        rect = thumbnail.getBoundingClientRect();

                    return {
                        x: rect.left,
                        y: rect.top + pageYScroll,
                        w: rect.width
                    };
                }

            };

            options.index = parseInt(index, 10);

            // exit if index not found
            if (isNaN(options.index)) {
                return;
            }

            if (disableAnimation) {
                options.showAnimationDuration = 0;
            }

            // Pass data to PhotoSwipe and initialize it
            gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, items, options);
            gallery.init();
            gallery.shout('helloWorld', 'John' /* you may pass more arguments */);



            var totalItems = gallery.options.getNumItemsFn();

            function syncPhotoSwipeWithSlider() {
                var currentIndex = gallery.getCurrentIndex();
                galleryTop.slideTo(currentIndex);
                //galleryTop.activeIndex();
                //main_image.trigger('owl.jumpTo', currentIndex);
                if (currentIndex == (totalItems - 1)) {
                    $('.pswp__button--arrow--right').attr('disabled', 'disabled').addClass('disabled');
                } else {
                    $('.pswp__button--arrow--right').removeAttr('disabled');
                }
                if (currentIndex == 0) {
                    $('.pswp__button--arrow--left').attr('disabled', 'disabled').addClass('disabled');
                } else {
                    $('.pswp__button--arrow--left').removeAttr('disabled');
                }
            };
            gallery.listen('afterChange', function() {
                syncPhotoSwipeWithSlider();
            });
            syncPhotoSwipeWithSlider();
        };

        // loop through all gallery elements and bind events
        var galleryElements = document.querySelectorAll(gallerySelector);

        for (var i = 0, l = galleryElements.length; i < l; i++) {
            galleryElements[i].setAttribute('data-pswp-uid', i + 1);
            galleryElements[i].onclick = onThumbnailsClick;
        }
    };

    var main_gallery = '.gallery-top';
    var galleryTop = new Swiper(main_gallery, {
        slidesPerView: 2,
        centeredSlides: true,
        spaceBetween: 0,
        loop: true,
        //autoplay: {
        //delay: 5000,
        //disableOnInteraction: false,
        //},
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        on: {
            init: function(){
                initPhotoSwipeFromDOM(main_gallery);
            },
        },
        breakpoints: {
            991: {
                slidesPerView: 2,
                centeredSlides: false,
            },
            768: {
                slidesPerView: 1,
                centeredSlides: false,
            },
            640: {
                slidesPerView: 1,
                centeredSlides: false,
            },
            320: {
                slidesPerView: 1,
                centeredSlides: false,
            }
        }
    });
</script>