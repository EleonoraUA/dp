<?php
use app\models\tables\Patient;
use app\models\tables\Profile;
use kartik\datetime\DateTimePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;
use app\models\tables\Visit;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Visit */
/* @var $form yii\widgets\ActiveForm */
$doctors = ArrayHelper::map(Profile::find()->all(), 'user_id', 'fullName');
$patients = ArrayHelper::map(Patient::find()->all(), 'id', 'fullName');
?>

<div class="visit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'datetime')->widget(DateTimePicker::className(), [
        'name' => 'datetime',
        'type' => DateTimePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'format' => 'dd-MM-yyyy H:i',
            'autoclose' => true,
            'daysOfWeekDisabled' => '0,6',
            'hoursDisabled' => '0,1,2,3,4,5,6,7,8,19,20,21,22,23'
        ]
    ]) ?>

    <?= $form->field($model, 'patient_id')->dropDownList($patients) ?>

    <?= $form->field($model, 'doc_id')->dropDownList($doctors) ?>

    <?= $form->field($model, 'type')->dropDownList(Visit::getVisitTypes()) ?>


    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'create') : Yii::t('app', 'update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>
