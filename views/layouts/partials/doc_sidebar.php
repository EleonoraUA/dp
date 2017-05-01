<?php
use kartik\sidenav\SideNav;

$items = [
    [
        'url' => '#',
        'label' => Yii::t('app', 'home'),
        'icon' => 'home'
    ],
];

if (Yii::$app->user->can('doctor')) {
    $items[] = ['url' => '#','label' => Yii::t('app', 'doc.menu.visits')];
}
if (Yii::$app->user->can('manager')) {
    $items[] = ['url' => '#','label' => Yii::t('app', 'manager.menu.inc_info'), 'items' => [
        [
        'label' => Yii::t('app', 'manager.menu.inc_info.patients'),
        'url' => ['patient/index']
        ],
        [
            'label' => Yii::t('app', 'manager.menu.inc_info.calls'),
            'url' => '#',
        ],
        [
            'label' => Yii::t('app', 'manager.menu.inc_info.pat_groups'),
            'url' => ['patient-group/index'],
            'icon' => 'ok',
        ],
        [
            'label' => Yii::t('app', 'manager.menu.inc_info.pat_sub_groups'),
            'url' => ['patient-sub-group/index'],
            'icon' => 'ok',
        ],
        [
            'label' => Yii::t('app', 'manager.menu.inc_info.districts'),
            'url' => ['district/index'],
            'icon' => 'ok',
        ],
        [
            'label' => Yii::t('app', 'manager.menu.inc_info.clinics'),
            'url' => ['clinic/index'],
            'icon' => 'ok',
        ],
        [
            'label' => Yii::t('app', 'manager.positions'),
            'url' => ['position/index'],
            'icon' => 'ok',
        ],
        [
            'label' => Yii::t('app', 'manager.study_place'),
            'url' => ['study-place/index'],
            'icon' => 'ok',
        ],
    ]];
}

?>

<?=
SideNav::widget([
    'type' => SideNav::TYPE_PRIMARY,
    'heading' => 'Меню',
    'items' => $items,
]);
?>