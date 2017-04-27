<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "position".
 *
 * @property integer $id
 * @property string $name
 */
class Position extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'position';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 30],
            [['name'], 'unique', 'targetAttribute' => ['name'], 'message' => Yii::t('app', 'position.name.unique')],
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
}
