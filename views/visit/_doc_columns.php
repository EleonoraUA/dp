<?php
use app\models\tables\Patient;
use app\models\tables\Profile;
use app\models\tables\Visit;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'datetime',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'patient_id',
        'value' => function ($item) {
            return $item->patient->getFullName();
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'doc_id',
        'value' => function ($item) {
            return $item->doc->getFullName();

        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute' => 'complaints',
        'value' => function ($item) {
            $result = null;
            foreach ($item->complaints as $complaints) {
                $result .= $complaints->name . ', ';
            }
            return substr($result, 0, -2);
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute' => 'symptoms',
        'value' => function ($item) {
            $result = null;
            foreach ($item->symptoms as $symptom) {
                $result .= $symptom->name . ', ';
            }
            return substr($result, 0, -2);
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute' => 'diagnosis',
        'value' => function ($item) {
            $result = null;
            foreach ($item->diagnoses as $diagnosis) {
                $result .= $diagnosis->name . ', ';
            }
            return substr($result, 0, -2);
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'type',
        'value' => function ($item) {
            return Visit::getVisitTypes($item->type);
        },
        'filter' => false
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) {
            return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete',
            'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
            'data-request-method'=>'post',
            'data-toggle'=>'tooltip',
            'data-confirm-title'=>Yii::t('yii', 'Are you sure'),
            'data-confirm-message'=>Yii::t('yii', 'Are you sure want to delete this item')],
    ],

];