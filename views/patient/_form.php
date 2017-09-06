<?php
use app\models\tables\PatientSubGroup;
use app\models\tables\Profile;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Patient */
/* @var $form yii\widgets\ActiveForm */
$subgroups = ArrayHelper::map(PatientSubGroup::find()->all(), 'id', 'name');
$studyPlaces = ArrayHelper::map(\app\models\tables\StudyPlace::find()->all(), 'id', 'name');
$doctors = ArrayHelper::map(Profile::find()->all(), 'user_id', 'fullName');
unset($doctors[1]);
?>

<div class="patient-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <?= $form->field($model, 'birthday')->widget(DatePicker::classname(), [
        'language' => 'uk',
        'options' => ['placeholder' => '2001-01-29'],
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'study')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subgroup_ids')->widget(Select2::classname(), [
        'data' => $subgroups,
        'language' => Yii::$app->language,
        'theme' => Select2::THEME_BOOTSTRAP,
        'options' => ['multiple' => true, 'placeholder' => 'Підгрупи'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'user_id')->widget(Select2::classname(), [
        'data' => $doctors,
        'language' => Yii::$app->language,
        'theme' => Select2::THEME_BOOTSTRAP,
        'options' => ['multiple' => true, 'placeholder' => 'Лікарі'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'create') : Yii::t('app', 'update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>
