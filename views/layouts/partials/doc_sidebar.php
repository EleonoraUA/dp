<?php
use kartik\sidenav\SideNav;

$items = [
    [
        'label' => Yii::t('user', 'Profile'),
        'url' => ['/user/profile/show', 'id' => Yii::$app->user->getIdentity()->getId()]
    ],
];

if (Yii::$app->user->can('doctor')) {
    $items[] = [
        'label' => Yii::t('app', 'manager.menu.inc_info.patients'),
        'url' => ['patient/index'],
        'icon' => 'ok',
        ];
}
if (Yii::$app->user->can('manager')) {
    $items[] = ['url' => '#', 'label' => Yii::t('app', 'manager.menu.inc_info'), 'items' => [
        [
            'label' => Yii::t('app', 'manager.menu.inc_info.patients'),
            'url' => ['patient/index'],
            'icon' => 'ok',
        ],
        [
            'label' => Yii::t('app', 'manager.menu.inc_info.calls'),
            'url' => ['visit/index'],
            'icon' => 'ok',
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
            'label' => Yii::t('app', 'manager.doc.profiles'),
            'url' => ['profile/index'],
            'icon' => 'ok',
        ],
    ]];

    $items[] = ['url' => '#', 'label' => Yii::t('app', 'manager.menu.medical.inc_info'), 'items' => [
        [
            'label' => Yii::t('app', 'visit.symptoms'),
            'url' => ['symptom/index'],
            'icon' => 'ok',
        ],
        [
            'label' => Yii::t('app', 'visit.complaints'),
            'url' => ['complaint/index'],
            'icon' => 'ok',
        ],
        [
            'label' => Yii::t('app', 'visit.diagnoses'),
            'url' => ['diagnosis/index'],
            'icon' => 'ok',
        ],
        [
            'label' => Yii::t('app', 'medical_card.analyses'),
            'url' => ['analyses/index'],
            'icon' => 'ok',
        ],
    ]];
}

?>

<?=
SideNav::widget([
    'type' => SideNav::TYPE_DEFAULT,
    'heading' => 'Меню',
    'items' => $items,
    'indItem' => '',
]);
?>