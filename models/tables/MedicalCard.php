<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "medical_card".
 *
 * @property integer $id
 * @property integer $patient_id
 */
class MedicalCard extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'medical_card';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['patient_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'patient_id' => Yii::t('app', 'Patient ID'),
        ];
    }

    public function getVisits()
    {
        return $this->hasMany(Visit::className(), ['card_id' => 'id']);
    }

    public function getPatient()
    {
        return $this->hasOne(Patient::className(), ['id' => 'patient_id']);
    }
}
