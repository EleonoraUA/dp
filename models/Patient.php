<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "patient".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $patronymic
 * @property string $birthday
 * @property string $phone
 * @property string $email
 * @property integer $study
 */
class Patient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'birthday'], 'required'],
            [['birthday'], 'safe'],
            [['study'], 'integer'],
            [['first_name', 'last_name', 'patronymic'], 'string', 'max' => 40],
            [['phone'], 'string', 'max' => 30],
            [['email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'patronymic' => Yii::t('app', 'Patronymic'),
            'birthday' => Yii::t('app', 'Birthday'),
            'phone' => Yii::t('app', 'Phone'),
            'email' => Yii::t('app', 'Email'),
            'study' => Yii::t('app', 'Study'),
        ];
    }
}
