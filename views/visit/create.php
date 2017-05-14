<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\tables\Visit */
?>
<div class="visit-create">
    <?= $this->render('_form', [
        'model' => $model,
        'card_id' => Yii::$app->getRequest()->getQueryParam('card_id')
    ]) ?>
</div>
