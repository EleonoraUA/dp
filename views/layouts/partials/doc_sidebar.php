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
    $items[] = ['url' => '#','label' => Yii::t('app', 'manager.menu.inc_info')];
}

?>

<?=
SideNav::widget([
    'type' => SideNav::TYPE_PRIMARY,
    'heading' => 'Меню',
    'items' => $items,
]);
?>