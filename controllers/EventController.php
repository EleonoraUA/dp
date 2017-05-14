<?php

namespace app\controllers;

use app\models\tables\EventSearch;
use Yii;

class EventController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $searchModel = new EventSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

}