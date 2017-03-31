<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h2> КНП “Центр первинної медико-санітарної допомоги №2 Подільського району м. Києва”</h2>

        <p class="lead">Увійдіть до свого аккаунту, щоб мати доступ до системи</p>

        <?= Html::a(Yii::t('app', 'login'), ['/user/security/login'], ['class' => "btn btn-lg btn-success"]); ?>
    </div>

    <div class="body-content">

        <div class="row">
        </div>

    </div>
</div>
