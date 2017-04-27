<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "patient_group".
 *
 * @property integer $id
 * @property string $name
 *
 * @property PatientSubGroup[] $patientSubGroups
 */
class PatientGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 40],
            [['name'], 'required'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatientSubGroups()
    {
        return $this->hasMany(PatientSubGroup::className(), ['group_id' => 'id']);
    }
}
