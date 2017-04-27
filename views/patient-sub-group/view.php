<?php

use app\models\tables\PatientGroup;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\tables\PatientSubGroup */
?>
<div class="patient-sub-group-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            [
                'attribute' => 'group_id',
                'value' => function ($item) {
                    if (isset($item->group_id)) {
                        return PatientGroup::findOne($item->group_id)->name;
                    }
                },
            ],
        ],
    ]) ?>

</div>
