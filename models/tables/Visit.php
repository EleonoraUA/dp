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
            [['patient_id', 'doc_id', 'type'], 'integer'],
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
            'datetime' => Yii::t('app', 'Datetime'),
            'patient_id' => Yii::t('app', 'Patient ID'),
            'doc_id' => Yii::t('app', 'Doc ID'),
            'type' => Yii::t('app', 'Type'),
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
}
