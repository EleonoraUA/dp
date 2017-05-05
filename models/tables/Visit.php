<?php

namespace app\models\tables;

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
}
