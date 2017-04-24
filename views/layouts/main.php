<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
$this->title = Yii::t('app', 'header');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="ua-UA">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::t('app', 'header'),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-default',
        ],
    ]);
    $navItems = [];
    if (Yii::$app->user->isGuest) {
        $navItems = [
            [
                'label' => Yii::t('app', 'home'),
                'url' => ['/site/index'],
            ],
            [
                'label' => Yii::t('app', 'login'),
                'url' => ['/user/security/login']
            ]
        ];
    } else {
        $navItems = [
            [
                'label' => Yii::t('user', 'Profile'),
                'url' => ['/user/profile/show', 'id' => Yii::$app->user->getIdentity()->getId()]
            ],
            [
                'label' => Yii::t('app', 'logout'),
                'url' => ['/site/logout'],
                'linkOptions' => ['data-method' => 'post']
            ]
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $navItems,
    ]);
    NavBar::end();
    ?>

    <?php if (Yii::$app->user->can('doctor') || Yii::$app->user->can('manager')): ?>
        <div class="col-md-2">
            <?= $this->render('partials/doc_sidebar.php'); ?>
        </div>
        <div class="col-md-10">
    <?php else: ?>
        <div class="col-lg-12">
    <?php endif; ?>

    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= $content ?>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; eleonoria <?= date('Y') ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
