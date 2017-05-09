<?php

namespace app\models\tables;

use voskobovich\behaviors\ManyToManyBehavior;
use Yii;

/**
 * This is the model class for table "analyses".
 *
 * @property integer $id
 * @property string $name
 *
 * @property AnalysesResult[] $analysesResults
 */
class Analyses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'analyses';
    }

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
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
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
    public function getAnalysesResults()
    {
        return $this->hasMany(AnalysesResult::className(), ['analyses_id' => 'id']);
    }

    public function getVisits()
    {
        return $this->hasMany(Visit::className(), ['id' => 'visit_ids']);
    }
}
