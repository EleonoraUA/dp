<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Patient */
?>
<div class="patient-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'first_name',
            'last_name',
            'patronymic',
            'birthday',
            'phone',
            'email:email',
            'address',
            'study'
        ],
    ]) ?>

</div>
