<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\tables\District */

$this->title = Yii::t('app', Yii::t('app', 'crud.district.update') . ' #') . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'manager.districts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'update');
?>
<div class="district-update col-md-8 col-md-offset-1">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
