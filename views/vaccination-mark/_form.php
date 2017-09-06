<?php
use app\models\tables\Patient;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\tables\VaccinationMark */
/* @var $form yii\widgets\ActiveForm */
$patients = ArrayHelper::map(Patient::find()->all(), 'id', 'fullName');
$model->patient_id = Yii::$app->getRequest()->getQueryParam('pat_id');
$model->date = date('Y-m-d');
$medicines = ArrayHelper::map(\app\models\tables\Medicine::find()->all(), 'id', 'name');
$vacs = ArrayHelper::map(\app\models\tables\Vaccination::find()->all(), 'id', 'nameString');
?>

<div class="vaccination-mark-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'patient_id')->dropDownList($patients, ['disabled' => 'disabled']) ?>

    <?= $form->field($model, 'date')->textInput(['disabled' => true]) ?>

    <?= $form->field($model, 'vaccination_id')->widget(Select2::classname(), [
        'data' => $vacs,
        'language' => Yii::$app->language,
        'theme' => Select2::THEME_BOOTSTRAP,
        'options' => ['multiple' => true, 'placeholder' => 'Вакцина'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'dose')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reaction')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'medicine_id')->widget(Select2::classname(), [
        'data' => $medicines,
        'language' => Yii::$app->language,
        'theme' => Select2::THEME_BOOTSTRAP,
        'options' => ['multiple' => true, 'placeholder' => 'Препарати'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'contraindication')->textInput(['maxlength' => true]) ?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'date')->dropDownList([])->hiddenInput()->label('') ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'patient_id')->dropDownList([])->hiddenInput()->label('') ?>
        </div>
    </div>
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Створити' : 'Оновити', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
