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
    ];
    $items[] = [
        'label' => Yii::t('app', 'doctor.events'),
        'url' => ['event/index'],
    ];
    $items[] = [
        'label' => Yii::t('app', 'manager.districts'),
        'url' => ['district/fixed'],
    ];
}
if (Yii::$app->user->can('manager')) {
    $items[] = ['url' => '#', 'label' => Yii::t('app', 'manager.menu.inc_info'), 'items' => [
        [
            'label' => Yii::t('app', 'manager.menu.inc_info.patients'),
            'url' => ['patient/index'],
        ],
        [
            'label' => Yii::t('app', 'manager.menu.inc_info.calls'),
            'url' => ['visit/index'],
        ],
        [
            'label' => Yii::t('app', 'manager.menu.inc_info.pat_groups'),
            'url' => ['patient-group/index'],
        ],
        [
            'label' => Yii::t('app', 'manager.menu.inc_info.pat_sub_groups'),
            'url' => ['patient-sub-group/index'],
        ],
        [
            'label' => Yii::t('app', 'manager.menu.inc_info.districts'),
            'url' => ['district/index'],
        ],
        [
            'label' => Yii::t('app', 'manager.menu.inc_info.clinics'),
            'url' => ['clinic/index'],
        ],
        [
            'label' => Yii::t('app', 'manager.positions'),
            'url' => ['position/index'],
        ],
        [
            'label' => Yii::t('app', 'manager.doc.profiles'),
            'url' => ['profile/index'],
        ],
    ]];

    $items[] = ['url' => '#', 'label' => Yii::t('app', 'manager.menu.medical.inc_info'), 'items' => [
        [
            'label' => Yii::t('app', 'visit.symptoms'),
            'url' => ['symptom/index'],
        ],
        [
            'label' => Yii::t('app', 'visit.complaints'),
            'url' => ['complaint/index'],
        ],
        [
            'label' => Yii::t('app', 'visit.diagnoses'),
            'url' => ['diagnosis/index'],
        ],
        [
            'label' => Yii::t('app', 'medical_card.analyses'),
            'url' => ['analyses/index'],
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