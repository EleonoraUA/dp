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
        'url' => '#'
        ],
        [
            'label' => Yii::t('app', 'manager.menu.inc_info.calls'),
            'url' => '#',
        ],
        [
            'label' => Yii::t('app', 'manager.menu.inc_info.pat_groups'),
            'url' => '#'
        ],
        [
            'label' => Yii::t('app', 'manager.menu.inc_info.districts'),
            'url' => ['district/index']
        ],
        [
            'label' => Yii::t('app', 'manager.menu.inc_info.clinics'),
            'url' => ['clinic/index'],
            'icon' => 'globe'
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