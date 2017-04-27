<?php

namespace app\models\tables;

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
}
