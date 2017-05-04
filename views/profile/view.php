<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Profile */
?>
<div class="profile-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'first_name',
            'last_name',
            'patronymic',
            [
                'attribute' => 'position',
                'value' => \app\models\tables\Position::findOne($model->position)->name ?? null
            ],
            'public_email:email',
        ],
    ]) ?>

</div>
