<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\tables\MedicalCardSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'medical_card');
$this->params['breadcrumbs'][] = $this->title;
CrudAsset::register($this);
$patient = $medicalCard->patient;
$visits = $medicalCard->visits;
?>
<div class="medical-card-index col-md-11">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title"><?= $patient->getFullName() ?></h3>
            <?= Html::a('Історія хвороб', ['visit/index', 'card_id' => $medicalCard->id]); ?>
        </div>
        <div class="panel-body">
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
        </div>
    </div>
    <?=GridView::widget([
        'id'=>'crud-datatable',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => require(__DIR__ . '/_doc_columns.php'),
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'panel' => [
            'type' => 'info',
            'heading' => '<i class="glyphicon glyphicon-list"></i> Історія хвороби',
        ]
    ])?>
</div>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>
