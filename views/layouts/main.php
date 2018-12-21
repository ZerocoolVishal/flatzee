<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Yii::$app->name ?> - <?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div id="main">
    <nav class="navbar navbar-expand-lg navbar-dark absolute-top " id="menu">
        <div class="container">
            <a class="navbar-brand" href="<?= \yii\helpers\Url::home() ?>">
                <span class="icon-uilove icon-uilove-realestate"></span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu-content"
                    aria-controls="menu-content" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu-content">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            Mumbai <span class="sr-only">(current)</span>
                        </a>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item">Thane</a>
                        </div>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <?= Html::a('<span>List your property</span>',
                            ['property-listing'], ['class' => 'nav-link nav-btn']) ?>
                    </li>
                    <?php if (!Yii::$app->user->isGuest): ?>
                        <li class="nav-item dropdown user-account">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                Hi, <?= Yii::$app->user->identity->first_name ?>
                            </a>
                            <div class="dropdown-menu">
                                <?= Html::a('My Profile', ['site/profile'], ['class' => 'dropdown-item']) ?>
                                <a href="#" class="dropdown-item">Change Password</a>
                                <?= Html::a('Logout', ['site/logout'], ['class' => 'dropdown-item', 'data-method' => 'POST']) ?>
                            </div>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <?= Html::a('<span>Login / Sign Up</span>',
                                ['site/login'], ['class' => 'nav-link']) ?>
                        </li>
                    <?php endif; ?>
                </ul>

            </div>
        </div>
    </nav>

    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>
    <?= $content ?>

    <button class="btn btn-primary btn-circle" id="to-top" style="visibility: visible; opacity: 1;">
        <i class="fa fa-angle-up"></i>
    </button>

    <footer id="footer" class="footer-light">
        <div class="container container-1000">
            <div class="row">
                <div class="col-lg-3">
                    <p><span class="icon-uilove icon-uilove-realestate"></span></p>
                    <address class="mb-3">
                        <strong>Twitter, Inc.</strong><br>
                        1355 Market Street, Suite 900<br>
                        San Francisco, CA 94103<br>
                        <abbr title="Phone">P:</abbr> (123) 456-7890
                    </address>
                    <div class="footer-social mb-4"><a href="#" class="ml-2 mr-2"><span
                                    class="fa fa-twitter"></span></a> <a href="#" class="ml-2 mr-2"><span
                                    class="fa fa-facebook"></span></a> <a href="#" class="ml-2 mr-2"><span
                                    class="fa fa-instagram"></span></a></div>
                </div>
                <div class="col-lg-2 col-sm-4">
                    <div class="footer-links">
                        <ul class="list-unstyled">
                            <li class="list-title"><a href="#">About</a></li>
                            <li><a href="#">Company</a></li>
                            <li><a href="#">Community</a></li>
                            <li><a href="#">Carrers</a></li>
                            <li><a href="#">Press</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-4">
                    <div class="footer-links">
                        <ul class="list-unstyled">
                            <li class="list-title"><a href="#">Links</a></li>
                            <li><a href="#">For Rent</a></li>
                            <li><a href="#">For Sale</a></li>
                            <li><a href="#">Commercial</a></li>
                            <li><a href="#">Agents</a></li>
                            <li><a href="#">Property Guides</a></li>
                            <li><a href="#">Jobs</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-4">
                    <div class="footer-links">
                        <ul class="list-unstyled">
                            <li class="list-title"><a href="#">Help</a></li>
                            <li><a href="#">Payments</a></li>
                            <li><a href="#">Shipping</a></li>
                            <li><a href="#">Cancellation</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Report</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="text-lg-right ml-lg-2">
                        <form>
                            <div class="list-title">Subscribe</div>
                            <div class="input-group input-group-lg">
                                <input type="text" name="email" class="form-control form-control-lg subscribe-input"
                                       placeholder="Email">
                                <div class="input-group-append ml-0">
                                    <button class="btn subscribe-button" type="button"><i class="fa fa-envelope"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="footer-payments"><span class="fa fa-cc-visa"></span> <span
                                    class="fa fa-cc-mastercard"></span> <span class="fa fa-cc-amex"></span></div>
                    </div>
                </div>

            </div>
            <div class="footer-credits d-lg-flex justify-content-lg-between align-items-center">
                <div>© 2018 FlatZee. All Rights Reserved</div>
            </div>
        </div>
    </footer>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
