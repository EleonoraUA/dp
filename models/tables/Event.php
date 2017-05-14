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
 * @property integer $card_id
 * @property string $analyses
 *
 * @property Profile $doc
 * @property Patient $patient
 * @property MedicalCard $card
 */
class Event extends \app\models\tables\Visit
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
            [['patient_id', 'doc_id', 'type', 'card_id'], 'integer'],
            [['datetime'], 'string', 'max' => 30],
            [['analyses'], 'string', 'max' => 255],
            [['doc_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::className(), 'targetAttribute' => ['doc_id' => 'user_id']],
            [['patient_id'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::className(), 'targetAttribute' => ['patient_id' => 'id']],
            [['card_id'], 'exist', 'skipOnError' => true, 'targetClass' => MedicalCard::className(), 'targetAttribute' => ['card_id' => 'id']],
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
            'card_id' => Yii::t('app', 'Card ID'),
            'analyses' => Yii::t('app', 'Analyses'),
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCard()
    {
        return $this->hasOne(MedicalCard::className(), ['id' => 'card_id']);
    }

}
