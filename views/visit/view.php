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
            'patient_id',
            'doc_id',
            'type',
        ],
    ]) ?>

</div>
