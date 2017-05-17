<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "medicine".
 *
 * @property integer $id
 * @property string $name
 *
 * @property VaccinationMark[] $vaccinationMarks
 */
class Medicine extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'medicine';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique', 'targetAttribute' => ['name']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVaccinationMarks()
    {
        return $this->hasMany(VaccinationMark::className(), ['medicine_id' => 'id']);
    }
}
