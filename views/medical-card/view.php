<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\tables\MedicalCard */
?>
<div class="medical-card-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'patient_id',
        ],
    ]) ?>

</div>
