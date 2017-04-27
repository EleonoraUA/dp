<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\tables\District */

$this->title = Yii::t('app', 'crud.district.create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'manager.districts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="district-create col-md-8 col-md-offset-1">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
