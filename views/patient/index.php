<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel app\models\tables\PatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'manager.menu.inc_info.patients');
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);
$content = null;
if (Yii::$app->user->can('doc')) {
    $content .= '';
}
if (Yii::$app->user->can('manager')) {
    $content .= Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'],
            ['role' => 'modal-remote', 'title' => 'Create new Patients', 'class' => 'btn btn-default']) .
        Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
            ['data-pjax' => 1, 'class' => 'btn btn-default', 'title' => 'Reset Grid']) .
        '{toggleData}' .
        '{export}';
}
?>
<div class="patient-index col-md-11">
    <div id="ajaxCrudDatatable">
        <?= GridView::widget([
            'id' => 'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax' => true,
            'columns' => require(__DIR__ . '/_columns.php'),
            'toolbar' => [
                ['content' => $content],
            ],
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
            'panel' => [
                'type' => 'primary',
                'heading' => '<i class="glyphicon glyphicon-list"></i> Список пацієнтів',
                'before' => '<em>* Для зміни розміру колонок потягніть за край таблиці.</em>',
                'after' => BulkButtonWidget::widget([
                        'buttons' => Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; Видалити все',
                            ["bulk-delete"],
                            [
                                "class" => "btn btn-danger btn-xs",
                                'role' => 'modal-remote-bulk',
                                'data-confirm' => false, 'data-method' => false,// for overide yii data api
                                'data-request-method' => 'post',
                                'data-confirm-title' => Yii::t('yii', 'Are you sure'),
                                'data-confirm-message' => Yii::t('yii', 'Are you sure want to delete this item')
                            ]),
                    ]) .
                    '<div class="clearfix"></div>',
            ]
        ]) ?>
    </div>
</div>
<?php Modal::begin([
    "id" => "ajaxCrudModal",
    "footer" => "",// always need it for jquery plugin
]) ?>
<?php Modal::end(); ?>
