<?php

namespace app\models\tables;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\tables\District;

/**
 * DistrictSearch represents the model behind the search form about `app\models\tables\District`.
 */
class DistrictSearch extends District
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['street', 'building', 'clinic_id'], 'safe'],
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
    public function search($params, $fixed = false)
    {
        $query = District::find();

        $query->joinWith('clinicId');

        if ($fixed) {
            $query->joinWith('doctors');
            $query->andFilterWhere(['doctor_to_district.user_id' => Yii::$app->user->getId()]);
        }
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'street', $this->street])
            ->andFilterWhere(['like', 'building', $this->building])
        ->andFilterWhere(['like', 'clinic.name', $this->clinic_id]);

        return $dataProvider;
    }
}
