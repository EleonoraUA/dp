<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\tables\VisitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$cardMode = !empty($card_id);
$this->title = $cardMode ? Yii::t('app', 'medical_card') : Yii::t('app', 'doc.menu.visits');
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);
if ($cardMode) {
    $medicalCard = \app\models\tables\MedicalCard::findOne($card_id);
    $patient = $medicalCard->patient;
}

$columnsFile = $cardMode ? '/_doc_columns.php' : '/_columns.php';

$panel = $cardMode ? [] : [
    'type' => 'primary',
    'heading' => '<i class="glyphicon glyphicon-list"></i> Список візитів',
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
];
?>
<div class="visit-index col-md-11">
    <?php if ($cardMode) : ?>
        <div class="page-header">
            <h3><?= $patient->getFullName() ?></h3>
        </div>
        <?= DetailView::widget([
            'model' => $patient,
            'attributes' => [
                'birthday',
                'phone',
                'email:email',
                'address',
                'study',
                [
                    'label' => 'Підгрупи',
                    'value' => $patient->getSubgroupString()
                ],
            ],
        ]) ?>
    <?php endif; ?>
    <div id="ajaxCrudDatatable">
        <?= GridView::widget([
            'id' => 'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax' => true,
            'columns' => require(__DIR__ . $columnsFile),
            'toolbar' => [
                ['content' =>
                    Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create', 'card_id' => Yii::$app->getRequest()->getQueryParam('card_id')],
                        ['role' => 'modal-remote', 'title' => 'Додати новий візит', 'class' => 'btn btn-default']) .
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                        ['data-pjax' => 1, 'class' => 'btn btn-default', 'title' => 'Оновити']) .
                    '{toggleData}' .
                    '{export}'
                ],
            ],
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
            'panel' => [
                'type' => 'primary',
                'heading' => '<i class="glyphicon glyphicon-list"></i> Список візитів',
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
