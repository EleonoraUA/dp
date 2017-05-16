<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\tables\DistrictSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'doctor.districts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="district-index col-md-11">

    <div class="page-header">
        <h3><?= Html::encode($this->title) ?></h3>
    </div>
    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'street',
            'building',
            [
                'attribute' => 'clinic_id',
                'value' => function ($item) {
                    if (isset($item->clinic_id)) {
                        return \app\models\tables\Clinic::findOne($item->clinic_id)->name;
                    }
                }
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>
