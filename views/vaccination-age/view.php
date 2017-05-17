<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\tables\VaccinationAge */
?>
<div class="vaccination-age-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'age',
        ],
    ]) ?>

</div>
