<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <header>
        <div class="container-fluid">
            <div class="contacts">
                Email: <span>info@future-group.ru</span><br>
                Телефон: (499) 340-94-71
            </div>
            <div class="header-title">
                Комментарии
            </div>
            <div class="header-logo">
                <?= Html::img('@web/img/logo.png', ['alt' => 'logo.png']) ?>
                <!--                --><? //=?>
            </div>
        </div>
    </header>

    <div class="container-fluid main-content">
        <?php if (Yii::$app->session->hasFlash('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <?php echo Yii::$app->session->getFlash('success'); ?>
            </div>
        <?php endif; ?>
        <?= $content ?>
    </div>
    <footer>
        <div class="container-fluid">
            <?= Html::img('@web/img/logo_footer.png', ['alt' => 'logo_footer.png']) ?>
            <div class="footer-text">
                <div class="footer-contacts">
                    Телефон: (499) 340-94-71 <br>
                    Email: <span>info@future-group.ru</span> <br>
                    Адрес: <span>115088 Москва, ул. 2-я Машиностроения, д. 7 стр. 1</span>
                </div>
                <div class="copyrights">
                    © 2010 - 2014 Future. Все права защищены
                </div>
            </div>
        </div>

    </footer>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>