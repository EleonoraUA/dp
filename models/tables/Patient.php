<?php

namespace app\models\tables;

use voskobovich\behaviors\ManyToManyBehavior;
use Yii;
use yii2tech\ar\linkmany\LinkManyBehavior;

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

    public function behaviors()
    {
        return [
            'linkGroupBehavior' => [
                'class' => LinkManyBehavior::className(),
                'relation' => 'doctors', // relation, which will be handled
                'relationReferenceAttribute' => 'doctor_ids', // virtual attribute, which is used for related records specification
            ],
            [
                'class' => ManyToManyBehavior::className(),
                'relations' => [
                    'subgroup_ids' => 'subgroups',
                    'user_id' => 'doctors'
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
            [['first_name', 'last_name', 'birthday', 'address'], 'required'],
            [['birthday'], 'date', 'format' => 'yyyy-MM-dd'],
            [['study'], 'string', 'max' => 100],
            [['first_name', 'last_name', 'patronymic'], 'string', 'max' => 40],
            [['phone'], 'match', 'pattern' => '/^((\+380|0)([0-9]{9}))?$/'],
            [['email'], 'email'],
            [['email'], 'unique', 'targetAttribute' => 'email'],
            [['subgroup_ids'], 'safe'],
            [['study_place_id'], 'integer'],
            ['address', 'string', 'max' => 100],
            [['subgroups', 'subgroup_ids'], 'safe'],
            [['card_id', 'user_id'], 'safe'],
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
            'doctors' => Yii::t('app', 'manager.patient.doctors'),
            'doctor_ids' => Yii::t('app', 'manager.patient.doctors'),
            'user_id' => Yii::t('app', 'manager.patient.doctors'),
            'subgroups' => Yii::t('app', 'manager.sub_groups'),
            'subgroup_ids' => Yii::t('app', 'manager.sub_groups'),
        ];
    }

    public function getSubgroups()
    {
        return $this->hasMany(PatientSubGroup::className(), ['id' => 'subgroup_id'])->viaTable('subgroup_to_patient', ['patient_id' => 'id']);
    }

    public function getFullName()
    {
        return $this->last_name . ' ' . $this->first_name . ' ' . $this->patronymic;
    }

    public function getDoctors()
    {
        return $this->hasMany(Profile::className(), ['user_id' => 'user_id'])->viaTable('doc_to_patient', ['patient_id' => 'id']);
    }

    public function getDoctorString()
    {
        $result = null;
        foreach ($this->doctors as $doc) {
            $result .= $doc->getFullName() . ', ';
        }

        return $result;
    }

    public function getSubgroupString()
    {
        $result = null;
        foreach ($this->subgroups as $subgroup) {
            $group = $subgroup->group->name;
            $result .= $subgroup->name . ' (' . $group . '), ';
        }
        return $result;
    }

    public function getCard()
    {
        return $this->hasOne(MedicalCard::className(), ['id' => 'card_id']);
    }
}
