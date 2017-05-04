<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "patient".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $patronymic
 * @property string $birthday
 * @property string $phone
 * @property string $email
 * @property integer $study
 */
class Patient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'birthday', 'address'], 'required'],
            [['birthday'], 'date', 'format' => 'yyyy-MM-dd'],
            [['study'], 'string', 'max' => 100],
            [['first_name', 'last_name', 'patronymic'], 'string', 'max' => 40],
            [['phone'], 'match', 'pattern' => '/^((\+380|0)([0-9]{9}))?$/'],
            [['email'], 'email'],
            [['email'], 'unique', 'targetAttribute' => 'email'],
            [['subgroup'], 'integer'],
            [['study_place_id'], 'integer'],
            ['address', 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'first_name' => Yii::t('app', 'patient.first_name'),
            'last_name' => Yii::t('app', 'patient.last_name'),
            'patronymic' => Yii::t('app', 'patient.patronymic'),
            'birthday' => Yii::t('app', 'patient.birthday'),
            'phone' => Yii::t('app', 'patient.phone'),
            'email' => Yii::t('app', 'patient.email'),
            'study' => Yii::t('app', 'patient.study'),
            'address' => Yii::t('app', 'patient.address'),
        ];
    }

    public function getPatientSubGroups()
    {
        return $this->hasMany(PatientSubGroup::className(), ['id' => 'subgroup'])->viaTable('patient_to_subgroup', ['patient_id' => 'id']);
    }

    public function getFullName()
    {
        return $this->last_name . ' ' . $this->first_name . ' ' . $this->patronymic;
    }
}
