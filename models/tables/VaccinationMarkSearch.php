<?php

namespace app\models\tables;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\tables\VaccinationMark;

/**
 * VaccinationMarkSearch represents the model behind the search form about `app\models\tables\VaccinationMark`.
 */
class VaccinationMarkSearch extends VaccinationMark
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'patient_id', 'vaccination_id', 'medicine_id'], 'integer'],
            [['date', 'dose', 'reaction', 'contraindication'], 'safe'],
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
        $query = VaccinationMark::find();

        $query->andFilterWhere(['patient_id' => $params['pat_id']]);
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
            'vaccination_id' => $this->vaccination_id,
            'medicine_id' => $this->medicine_id,
        ]);

        $query->andFilterWhere(['like', 'date', $this->date])
            ->andFilterWhere(['like', 'dose', $this->dose])
            ->andFilterWhere(['like', 'reaction', $this->reaction])
            ->andFilterWhere(['like', 'contraindication', $this->contraindication]);

        return $dataProvider;
    }
}
