<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
$actionColumn = [];
if (Yii::$app->user->can('manager')) {
    $actionColumn = [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign' => 'middle',
        'urlCreator' => function ($action, $model, $key, $index) {
            return Url::to([$action, 'id' => $key]);
        },
        'viewOptions' => ['role' => 'modal-remote', 'title' => 'View', 'data-toggle' => 'tooltip'],
        'updateOptions' => ['role' => 'modal-remote', 'title' => 'Update', 'data-toggle' => 'tooltip'],
        'deleteOptions' => ['role' => 'modal-remote', 'title' => 'Delete',
            'data-confirm' => false, 'data-method' => false,// for overide yii data api
            'data-request-method' => 'post',
            'data-toggle' => 'tooltip',
            'data-confirm-title' => 'Are you sure?',
            'data-confirm-message' => 'Are you sure want to delete this item'],
    ];
}

if (Yii::$app->user->can('doc')) {
    $actionColumn = [
        'class' => '\kartik\grid\ActionColumn',
        'template'=>'{card}',
        'buttons' => [
            'card' => function ($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-copy"></span>', ['visit/index', 'card_id' => $model->card_id], [
                    'title' => 'медична карта',
                ]);
            }
        ]
    ];
}

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
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'first_name',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'last_name',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'patronymic',
    ],
    $actionColumn
];   