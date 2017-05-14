<?php
use app\models\tables\Position;
use dektrium\user\models\User;
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
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'user_id',
        'value' => function ($item) {
            $user = User::findOne($item->user_id);
            return $user->username . ' (' . $user->email . ')';
        }
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
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'position',
        'value' => function ($item) {
            $position = Position::findOne($item->position);
            return $position->name ?? null;
        }
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'public_email',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'district_ids',
        'value' => function ($item) {
            $result = null;
            foreach ($item->district_ids as $district_id) {
                $district = \app\models\tables\District::findOne($district_id);
                if (!$district instanceof \app\models\tables\District) {
                    return $result;
                }
                $clinic = \app\models\tables\Clinic::findOne($district->clinic_id ?? 0);
                $clinicName = '-';
                if ($clinic instanceof \app\models\tables\Clinic) {
                    $clinicName = $clinic->name;
                }
                $result .= '(Амб. '.$clinicName . ') '
                    . $district->street ?? null . ' '
                    . $district->building ?? null . ' '
                    . $district->flat ?? null;
                $result .= ', ';
            }
            return substr($result, 0, -2);
        }
    ],
    [
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
    ],

];   