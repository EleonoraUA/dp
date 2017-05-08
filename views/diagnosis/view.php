<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Diagnosis */
?>
<div class="diagnosis-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
        ],
    ]) ?>

</div>
