<?php
/**
 * Created by PhpStorm.
 * User: eleonoria
 * Date: 5/13/17
 * Time: 7:39 PM
 */

namespace app\models\tables;


use Yii;
use yii\data\ActiveDataProvider;

class EventSearch extends VisitSearch
{
    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Visit::find();

        $query->joinWith(['patient', 'doc']);

        $query->andFilterWhere([
            'visit.doc_id' => Yii::$app->user->getId()
        ]);
//        $query->andFilterWhere(['>', 'datetime', date('Y-m-d').' 00:00:00']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['datetime' => SORT_ASC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'datetime', $this->datetime]);
        $query->orFilterWhere(['like', 'patient.first_name', $this->patient_id])
            ->orFilterWhere(['like', 'patient.last_name', $this->patient_id]);

        $query->orFilterWhere(['like', 'profile.first_name', $this->doc_id])
            ->orFilterWhere(['like', 'profile.last_name', $this->doc_id]);

        return $dataProvider;
    }
}