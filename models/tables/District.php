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
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'street' => Yii::t('app', 'Street'),
            'building' => Yii::t('app', 'Building'),
        ];
    }

    public function relations()
    {
        return [
            'district_to_clinic' => [self::BELONGS_TO, 'clinic', 'id']
        ];
    }
}
