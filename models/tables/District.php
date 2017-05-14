<?php

namespace app\models\tables;

use voskobovich\behaviors\ManyToManyBehavior;
use Yii;

/**
 * This is the model class for table "district".
 *
 * @property integer $id
 * @property string $street
 * @property string $building
 */
class District extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'district';
    }

    public function behaviors()
    {
        return [
            [
                'class' => ManyToManyBehavior::className(),
                'relations' => [
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
            [['street'], 'string', 'max' => 50],
            [['building'], 'string', 'max' => 5],
            [['clinic_id'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'street' => Yii::t('app', 'address.street'),
            'building' => Yii::t('app', 'address.building'),
            'clinic_id' => Yii::t('app', 'manager.clinic')
        ];
    }

    public function getClinicId()
    {
        return $this->hasOne(Clinic::className(), ['id' => 'clinic_id']);
    }

    public function getDoctors()
    {
        return $this->hasMany(Profile::className(), ['user_id' => 'user_id'])->viaTable('doctor_to_district', ['district_id' => 'id']);
    }
}
