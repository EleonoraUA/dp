<?php

namespace app\models\tables;

use voskobovich\behaviors\ManyToManyBehavior;
use Yii;

/**
 * This is the model class for table "symptom".
 *
 * @property integer $id
 * @property string $name
 */
class Symptom extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
        return [
            [
                'class' => ManyToManyBehavior::className(),
                'relations' => [
                    'visit_ids' => 'visits'
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'symptom';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique', 'targetAttribute' => ['name']],
            [['visit_ids'], 'safe'],
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

    public function getVisits()
    {
        return $this->hasMany(Visit::className(), ['id' => 'visit_ids']);
    }
}
