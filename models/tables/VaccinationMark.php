<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "vaccination_mark".
 *
 * @property integer $id
 * @property integer $patient_id
 * @property integer $vaccination_id
 * @property string $date
 * @property string $dose
 * @property string $reaction
 * @property integer $medicine_id
 * @property string $contraindication
 *
 * @property Medicine $medicine
 * @property Patient $patient
 * @property Vaccination $vaccination
 */
class VaccinationMark extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vaccination_mark';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['patient_id', 'vaccination_id', 'medicine_id'], 'integer'],
            [['date', 'dose', 'reaction', 'contraindication'], 'string', 'max' => 255],
            [['medicine_id'], 'exist', 'skipOnError' => true, 'targetClass' => Medicine::className(), 'targetAttribute' => ['medicine_id' => 'id']],
            [['patient_id'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::className(), 'targetAttribute' => ['patient_id' => 'id']],
            [['vaccination_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vaccination::className(), 'targetAttribute' => ['vaccination_id' => 'id']],
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
            'vaccination_id' => Yii::t('app', 'Vaccination ID'),
            'date' => Yii::t('app', 'Date'),
            'dose' => Yii::t('app', 'Dose'),
            'reaction' => Yii::t('app', 'Reaction'),
            'medicine_id' => Yii::t('app', 'Medicine ID'),
            'contraindication' => Yii::t('app', 'Contraindication'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedicine()
    {
        return $this->hasOne(Medicine::className(), ['id' => 'medicine_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatient()
    {
        return $this->hasOne(Patient::className(), ['id' => 'patient_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVaccination()
    {
        return $this->hasOne(Vaccination::className(), ['id' => 'vaccination_id']);
    }
}
