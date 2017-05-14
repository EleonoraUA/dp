<?php
use app\models\tables\Patient;
use app\models\tables\Position;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Profile */
/* @var $form yii\widgets\ActiveForm */
$positions = ArrayHelper::map(Position::find()->all(), 'id', 'name');
$users = ArrayHelper::map(\dektrium\user\models\User::find()->all(), 'id', 'username');
$districts = ArrayHelper::map(\app\models\tables\District::find()->all(), 'id', 'street');
?>

<div class="profile-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->dropDownList($users) ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position')->dropDownList($positions) ?>

    <?= $form->field($model, 'public_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'district_ids')->widget(Select2::classname(), [
        'data' => $districts,
        'language' => Yii::$app->language,
        'theme' => Select2::THEME_BOOTSTRAP,
        'options' => ['multiple' => true, 'placeholder' => 'Дільниці'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'create') : Yii::t('app', 'update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
