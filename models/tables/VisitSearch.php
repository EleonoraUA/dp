<?php

namespace app\models\tables;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\tables\Visit;

/**
 * VisitSearch represents the model behind the search form about `app\models\tables\Visit`.
 */
class VisitSearch extends Visit
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['datetime', 'patient_id', 'doc_id', 'type'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

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

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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
