<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "patient_sub_group".
 *
 * @property integer $id
 * @property string $name
 * @property integer $group_id
 *
 * @property PatientGroup $group
 */
class PatientSubGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient_sub_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_id'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['name', 'group_id'], 'required'],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => PatientGroup::className(), 'targetAttribute' => ['group_id' => 'id']],
//            [['patient_id'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::className(), 'targetAttribute' => ['patient_id' => 'id']],
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
            'group_id' => Yii::t('app', 'manager.group'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(PatientGroup::className(), ['id' => 'group_id']);
    }

//    public function getPatients()
//    {
//        return $this->hasMany(Patient::className(), ['id' => 'subgroup_id']);
//    }

}
