<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Complaint */
?>
<div class="complaint-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
        ],
    ]) ?>

</div>
