<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Clinic */

$this->title = Yii::t('app', 'crud.clinic.update') . ': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'manager.menu.inc_info.clinics'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'crud.clinic.update');
?>
<div class="clinic-update col-md-8 col-md-offset-1">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
