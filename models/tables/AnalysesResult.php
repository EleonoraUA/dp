<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "analyses_result".
 *
 * @property integer $id
 * @property integer $analyses_id
 * @property string $result
 *
 * @property Analyses $analyses
 */
class AnalysesResult extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'analyses_result';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['analyses_id'], 'integer'],
            [['result'], 'string', 'max' => 255],
            [['analyses_id'], 'exist', 'skipOnError' => true, 'targetClass' => Analyses::className(), 'targetAttribute' => ['analyses_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'analyses_id' => Yii::t('app', 'Analyses ID'),
            'result' => Yii::t('app', 'Result'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnalyses()
    {
        return $this->hasOne(Analyses::className(), ['id' => 'analyses_id']);
    }
}
