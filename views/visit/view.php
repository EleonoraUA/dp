<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Visit */
?>
<div class="visit-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'datetime',
            [
                'attribute' => 'patient_id',
                'value' => $model->patient->getFullName()
            ],
            [
                'attribute' => 'doc_id',
                'value' => $model->doc->getFullName()
            ],
            [
                'attribute' => 'type',
                'value' => $model->getVisitTypes($model->type)
            ],
        ],
    ]) ?>

</div>
