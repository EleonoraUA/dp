<?php

namespace app\models\tables;

use voskobovich\behaviors\ManyToManyBehavior;
use Yii;

/**
 * This is the model class for table "vaccination".
 *
 * @property integer $id
 * @property string $name
 */
class Vaccination extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vaccination';
    }

    public function behaviors()
    {
        return [
            [
                'class' => ManyToManyBehavior::className(),
                'relations' => [
                    'age' => 'ages',
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique', 'targetAttribute' => ['name']],
            [['age'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'name'),
            'age' => Yii::t('app', 'age'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAges()
    {
        return $this->hasMany(VaccinationAge::className(), ['id' => 'age_id'])->viaTable('vaccination_to_age', ['vaccination_id' => 'id']);
    }
}
