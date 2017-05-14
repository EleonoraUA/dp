<?php
use app\models\tables\Visit;
use kartik\grid\ActionColumn;
use kartik\grid\GridView;
use yii\helpers\Html;

$this->title = Yii::t('app', 'doctor.events');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-11">
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'class'=>'\kartik\grid\DataColumn',
                'attribute'=>'datetime',
                'contentOptions' => ['style' => 'font-size: 15px'],
                'value' => function ($item) {
                    setlocale(LC_TIME, 'uk_UA');
                    $datetime = strtotime($item->datetime);
                    return strftime('%A (%d %B) %H:%M', $datetime);
                }
            ],
            [
                'class'=>'\kartik\grid\DataColumn',
                'attribute'=>'patient_id',
                'contentOptions' => ['style' => 'font-size: 15px'],
                'value' => function ($item) {
                    return $item->patient->getFullName();
                }
            ],
            [
                'class'=>'\kartik\grid\DataColumn',
                'attribute'=>'type',
                'contentOptions' => ['style' => 'font-size: 15px'],
                'value' => function ($item) {
                    return Visit::getVisitTypes($item->type);
                },
                'filter' => false
            ],
            [
                'class' => ActionColumn::className(),
                'template' => '{card}',
                'buttons' => [
                    'card' => function ($url, $model) {
                        return Html::a('<i class="glyphicon glyphicon-copy"></i>', ['/visit/index', 'card_id' => $model->card_id]);
                    }
                ],
            ],
        ],
    ]);
    ?>
</div>