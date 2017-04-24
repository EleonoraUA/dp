<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\tables\ClinicSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'manager.menu.inc_info.clinics');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clinic-index col-md-8 col-md-offset-1">
    <p class="">
        <?= Html::a(Yii::t('app', 'crud.clinic.create'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <h1><?= Html::encode($this->title) ?></h1>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
