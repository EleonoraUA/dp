<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\tables\District */

$this->title = Yii::t('app', 'manager.district') . ' #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'manager.districts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="district-view col-md-8 col-md-offset-1">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'street',
            'building',
            [
                'attribute' => 'clinic_id',
                'value' => \app\models\tables\Clinic::findOne($model->clinic_id)->name
            ],
        ],
    ]) ?>

</div>
