<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header id="header" class="">
        <?php

        NavBar::begin([
            'brandLabel' => "<i>ZooSite</i>",
            'brandUrl' => Yii::$app->homeUrl,
            'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
        ]);
        $session = Yii::$app->session;
        $username = $session['username'];
        $role =    $session['role'];
        if (isset($username)) {
            if ($role == 'admin') {
                $val = [

                    ['label' => 'Dashboard',     'url' => ['/site/dashboard']],
                    ['label' => $username],
                    ['label' => 'Logout', 'url' => ['/site/logout']],
                ];
            } else {
                $val = [
                    Html::img("@web/uploads/image25.jpg",['alt' => 'avatar','class' => 'avatar mx-3']),
                    ['label' => $username],
                    ['label' => 'Logout', 'url' => ['/site/logout']],
                ];
            }
        } else {
            $val  = [

                ['label' => 'Sign up', 'url' => ['/site/signup']],
                ['label' => 'Login', 'url' => ['/site/login']],
              
            ];
        }
        

        echo Nav::widget([
            'options' => ['class' => 'navbar-nav ms-auto'],
            'items' => $val,
        ]);


        NavBar::end();
        ?>
    </header>

    <main id="main" class="flex-shrink-0" role="main">
        <div class="container-fluid p-0">
            <?php if (!empty($this->params['breadcrumbs'])) : ?>
                <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
            <?php endif ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <footer id="footer" class="mt-auto py-3 bg-light">
        <div class="container">
            <div class="row text-muted">
                <div class="col-md-6 text-center text-md-start">&copy;<i> ZooSite</i> <?= date('Y') ?></div>
                <div class="col-md-6 text-center text-md-end"><a href="#" class="btn btn-primary btn-rounded-pill">  <i class="fa-solid fa-arrow-up"></i></a> </div>
            </div>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>