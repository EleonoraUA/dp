<?php

namespace app\models\tables;

use voskobovich\behaviors\ManyToManyBehavior;
use Yii;

/**
 * This is the model class for table "visit".
 *
 * @property integer $id
 * @property string $datetime
 * @property integer $patient_id
 * @property integer $doc_id
 * @property integer $type
 *
 * @property Profile $doc
 * @property Patient $patient
 */
class Visit extends \yii\db\ActiveRecord
{
    const VISIT_HOME_TYPE_NUMBER = 1;
    private const VISIT_HOME_TYPE_NAME = 'Вдома';
    const VISIT_CLINIC_TYPE_NUMBER = 2;
    private const VISIT_CLINIC_TYPE_NAME = 'У лікарні';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'visit';
    }

    public function behaviors()
    {
        return [
            [
                'class' => ManyToManyBehavior::className(),
                'relations' => [
                    'symptom_id' => 'symptoms',
                    'complaints_id' => 'complaints',
                    'diagnoses_id' => 'diagnoses',
                    'analyses_id' => 'analyses',
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
            [['datetime'], 'safe'],
            [['datetime'], 'string', 'max' => 30],
            [['patient_id', 'doc_id', 'type'], 'integer'],
            [['datetime'], 'unique', 'targetAttribute' => ['patient_id', 'datetime', 'doc_id'], 'message' => Yii::t('app', 'visit.unique')],
            [['patient_id', 'doc_id', 'type', 'datetime'], 'required'],
            [['doc_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::className(), 'targetAttribute' => ['doc_id' => 'user_id']],
            [['patient_id'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::className(), 'targetAttribute' => ['patient_id' => 'id']],
            [['card_id'], 'exist', 'skipOnError' => true, 'targetClass' => MedicalCard::className(), 'targetAttribute' => ['card_id' => 'id']],
            [['symptom_id', 'diagnoses_id', 'complaints_id', 'analyses_id'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'datetime' => Yii::t('app', 'visit.datetime'),
            'patient_id' => Yii::t('app', 'visit.patient_id'),
            'doc_id' => Yii::t('app', 'visit.doc_id'),
            'type' => Yii::t('app', 'visit.type'),
            'symptoms' => Yii::t('app', 'visit.symptoms'),
            'diagnosis' => Yii::t('app', 'visit.diagnoses'),
            'complaints' => Yii::t('app', 'visit.complaints'),
            'symptom_id' => Yii::t('app', 'visit.symptoms'),
            'diagnoses_id' => Yii::t('app', 'visit.diagnoses'),
            'complaints_id' => Yii::t('app', 'visit.complaints'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoc()
    {
        return $this->hasOne(Profile::className(), ['user_id' => 'doc_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatient()
    {
        return $this->hasOne(Patient::className(), ['id' => 'patient_id']);
    }

    public static function getVisitTypes($type = null)
    {
        $types = [
            self::VISIT_HOME_TYPE_NUMBER => self::VISIT_HOME_TYPE_NAME,
            self::VISIT_CLINIC_TYPE_NUMBER => self::VISIT_CLINIC_TYPE_NAME
        ];
        if (!empty($type) && isset($types[$type])) {
            return $types[$type];
        }

        return $types;
    }

    public static function getVisitTypeName($type = null)
    {
        $types = [
            self::VISIT_HOME_TYPE_NAME => self::VISIT_HOME_TYPE_NUMBER,
            self::VISIT_CLINIC_TYPE_NAME => self::VISIT_CLINIC_TYPE_NUMBER,
        ];

        if (!empty($type) && isset($types[$type])) {
            return $types[$type];
        }

        return $types;
    }

    public function getCard()
    {
        return $this->hasOne(MedicalCard::className(), ['id' => 'card_id']);
    }

    public function getSymptoms()
    {
        return $this->hasMany(Symptom::className(), ['id' => 'symptom_id'])->viaTable('visit_to_symptom', ['visit_id' => 'id']);
    }

    public function getComplaints()
    {
        return $this->hasMany(Complaint::className(), ['id' => 'complaint_id'])->viaTable('visit_to_complaint', ['visit_id' => 'id']);
    }

    public function getDiagnoses()
    {
        return $this->hasMany(Diagnosis::className(), ['id' => 'diagnosis_id'])->viaTable('visit_to_diagnosis', ['visit_id' => 'id']);
    }

    public function getAnalyses()
    {
        return $this->hasMany(Analyses::className(), ['id' => 'analyses_id'])->viaTable('visit_to_analyses', ['visit_id' => 'id']);
    }
}
