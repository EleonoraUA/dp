<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "study_place".
 *
 * @property integer $id
 * @property integer $number
 * @property string $name
 * @property integer $course
 */
class StudyPlace extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'study_place';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['number', 'course'], 'integer'],
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'number' => Yii::t('app', 'Number'),
            'name' => Yii::t('app', 'Name'),
            'course' => Yii::t('app', 'Course'),
        ];
    }
}
