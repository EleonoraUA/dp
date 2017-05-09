<?php
use app\models\tables\Complaint;
use app\models\tables\Diagnosis;
use app\models\tables\Patient;
use app\models\tables\Profile;
use app\models\tables\Symptom;
use kartik\datetime\DateTimePicker;
use kartik\select2\Select2;
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
$symptoms = ArrayHelper::map(Symptom::find()->all(), 'id', 'name');
$diagnoses = ArrayHelper::map(Diagnosis::find()->all(), 'id', 'name');
$complaints = ArrayHelper::map(Complaint::find()->all(), 'id', 'name');
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

    <?= $form->field($model, 'complaints_id')->widget(Select2::classname(), [
        'data' => $complaints,
        'language' => Yii::$app->language,
        'theme' => Select2::THEME_BOOTSTRAP,
        'options' => ['multiple' => true, 'placeholder' => 'Скарги'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'symptom_id')->widget(Select2::classname(), [
        'data' => $symptoms,
        'language' => Yii::$app->language,
        'theme' => Select2::THEME_BOOTSTRAP,
        'options' => ['multiple' => true, 'placeholder' => 'Підгрупи'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>


    <?= $form->field($model, 'diagnoses_id')->widget(Select2::classname(), [
        'data' => $diagnoses,
        'language' => Yii::$app->language,
        'theme' => Select2::THEME_BOOTSTRAP,
        'options' => ['multiple' => true, 'placeholder' => 'Діагнози'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>


    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'create') : Yii::t('app', 'update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>
