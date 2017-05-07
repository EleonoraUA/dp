<?php

namespace app\models\tables;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\tables\Patient;

/**
 * PatientSearch represents the model behind the search form about `app\models\tables\Patient`.
 */
class PatientSearch extends Patient
{
    public $forDoctor;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['first_name', 'last_name', 'patronymic', 'birthday', 'phone', 'email', 'study', 'subgroup_ids'], 'safe'],
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
    public function search($params, $forDoc = null)
    {
        $query = Patient::find();
        if ($forDoc) {
            $query->joinWith('doctors');
            $query->andFilterWhere(['doc_to_patient.user_id' => $forDoc]);
        }

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
            'birthday' => $this->birthday,
        ]);

        $query->andFilterWhere(['like', 'patient.first_name', $this->first_name])
            ->andFilterWhere(['like', 'patient.last_name', $this->last_name])
            ->andFilterWhere(['like', 'patient.patronymic', $this->patronymic])
            ->andFilterWhere(['like', 'patient.phone', $this->phone])
            ->andFilterWhere(['like', 'patient.study', $this->study])
            ->andFilterWhere(['like', 'patient.email', $this->email]);

        return $dataProvider;
    }
}
