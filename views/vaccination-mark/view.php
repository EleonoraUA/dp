<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\tables\VaccinationMark */
?>
<div class="vaccination-mark-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'patient_id',
            'vaccination_id',
            'date',
            'dose',
            'reaction',
            'medicine_id',
            'contraindication',
        ],
    ]) ?>

</div>
