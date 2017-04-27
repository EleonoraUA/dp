<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\tables\StudyPlace */
?>
<div class="study-place-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'number',
            'name',
            'course',
        ],
    ]) ?>

</div>
