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
unset($doctors[1]);
$patients = ArrayHelper::map(Patient::find()->all(), 'id', 'fullName');
$symptoms = ArrayHelper::map(Symptom::find()->all(), 'id', 'name');
$diagnoses = ArrayHelper::map(Diagnosis::find()->all(), 'id', 'name');
$complaints = ArrayHelper::map(Complaint::find()->all(), 'id', 'name');
if (!empty($card_id) && empty($isUpdate)) {
    $pat_id = \app\models\tables\MedicalCard::findOne($card_id)->patient_id;
    $model->patient_id = $pat_id;
    $model->doc_id = Yii::$app->user->getId();
}
$isDoctor = Yii::$app->user->can('doc');
?>

<div class="visit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'datetime')->widget(DateTimePicker::className(), [
        'name' => 'datetime',
        'type' => DateTimePicker::TYPE_COMPONENT_APPEND,
        'disabled' => $isDoctor && !empty($isUpdate),
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd H:i',
            'autoclose' => true,
            'daysOfWeekDisabled' => '0,6',
            'hoursDisabled' => '0,1,2,3,4,5,6,7,8,19,20,21,22,23',
            'startDate' => '+0d',
        ]
    ]) ?>

    <?php if (empty($isUpdate) || !$isDoctor) : ?>
        <?= $form->field($model, 'type')->dropDownList(Visit::getVisitTypes()) ?>
    <?php endif; ?>

    <?php if (empty($card_id) || empty($isUpdate)) : ?>
        <?= $form->field($model, 'patient_id')->dropDownList($patients, ['disabled' => $isDoctor ? 'disabled' : null]) ?>
        <?= $form->field($model, 'doc_id')->dropDownList($doctors, ['disabled' => $isDoctor ? 'disabled' : null]) ?>
        <?php if ($isDoctor) : ?>
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'patient_id')->dropDownList($patients)->hiddenInput()->label('') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'doc_id')->dropDownList($doctors)->hiddenInput()->label('') ?>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <?php if (!empty($card_id) && !empty($isUpdate)) : ?>

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

        <?= $form->field($model, 'medicine')->textarea() ?>

    <?php endif; ?>


    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'create') : Yii::t('app', 'update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>
