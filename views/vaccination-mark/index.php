<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel app\models\tables\VaccinationMarkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Vaccination Marks');
$pat_id = Yii::$app->getRequest()->getQueryParam('pat_id') ?? 0;
$patient = \app\models\tables\Patient::findOne($pat_id);
if ($patient instanceof \app\models\tables\Patient) {
    $this->params['breadcrumbs'][] = ['label' => $patient->getFullName(), 'url' => ['visit/index', 'card_id' => $patient->card_id]];
}
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>
<div class="vaccination-mark-index col-md-11">
    <div id="ajaxCrudDatatable">
        <h3>
            <?= $patient->getFullName() ?> <br/>
            <hr>
            <div class="row">
                <div class="col-md-offset-4">
                Карта профілактичних щеплень (форма 063)
                </div>
            </div>
        </h3>
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'=>true,
            'columns' => require(__DIR__ . '/_columns.php'),
            'toolbar'=> [
                ['content'=>
                    Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create', 'pat_id' => Yii::$app->getRequest()->getQueryParam('pat_id')],
                    ['role'=>'modal-remote','title'=> 'Create new Vaccination Marks','class'=>'btn btn-default']).
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                    ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>'Reset Grid']).
                    '{toggleData}'.
                    '{export}'
                ],
            ],          
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
            'panel' => [
                'type' => 'primary', 
                'heading' => '<i class="glyphicon glyphicon-list"></i> Список щеплень',
                'before'=>'<em></em>',
                'after'=>BulkButtonWidget::widget([
                            'buttons'=>Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; Видалити все',
                                ["bulk-delete"] ,
                                [
                                    "class"=>"btn btn-danger btn-xs",
                                    'role'=>'modal-remote-bulk',
                                    'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                                    'data-request-method'=>'post',
                                    'data-confirm-title'=>'Are you sure?',
                                    'data-confirm-message'=>'Are you sure want to delete this item'
                                ]),
                        ]).                        
                        '<div class="clearfix"></div>',
            ]
        ])?>
    </div>
</div>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>
