<?php

namespace app\models\tables;

use voskobovich\behaviors\ManyToManyBehavior;
use Yii;

/**
 * This is the model class for table "vaccination_age".
 *
 * @property integer $id
 * @property integer $age
 */
class VaccinationAge extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vaccination_age';
    }

    public function behaviors()
    {
        return [
            [
                'class' => ManyToManyBehavior::className(),
                'relations' => [
                    'vaccination_ids' => 'vaccinations'
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
            [['age'], 'integer'],
            [['age'], 'unique', 'targetAttribute' => ['age']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'age' => Yii::t('app', 'age'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVaccinations()
    {
        return $this->hasMany(VaccinationAge::className(), ['id' => 'vaccination_ids']);
    }

    public function getAgeString()
    {
        $days = $this->age ?? 1;
        $result = $days . ' дн.';
        if ($days >= 30 && $days < 365) {
            $result = ($days / 30) . 'міс.';
        } else if ($days >= 365 && $days <= 545) {
            $result = floor($days / 30) . 'міс.';
        } else if ($days > 545) {
            $result = ($days / 365) . ' р.';
        }
        return $result;
    }
}
