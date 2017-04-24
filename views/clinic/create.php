<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\tables\Clinic */

$this->title = Yii::t('app', 'crud.clinic.create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'manager.menu.inc_info.clinics'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clinic-create col-md-8 col-md-offset-1">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
