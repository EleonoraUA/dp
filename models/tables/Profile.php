<?php

namespace app\models\tables;

use Yii;
use \dektrium\user\models\User;

/**
 * This is the model class for table "profile".
 *
 * @property integer $user_id
 * @property string $name
 * @property string $public_email
 * @property string $patronymic
 * @property string $first_name
 * @property string $last_name
 *
 * @property User $user
 */
class Profile extends \dektrium\user\models\Profile
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'last_name', 'first_name'], 'required'],
            [['user_id'], 'integer'],
            [['position'], 'exist', 'skipOnError' => true, 'targetClass' => Position::className(), 'targetAttribute' => ['position' => 'id']],
            [['name', 'public_email'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['last_name', 'first_name', 'patronymic'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app', 'manager.profile.user_id'),
            'public_email' => Yii::t('app', 'manager.profile.public_email'),
            'first_name' => Yii::t('app', 'manager.profile.first_name'),
            'last_name' => Yii::t('app', 'manager.profile.last_name'),
            'patronymic' => Yii::t('app', 'manager.profile.patronymic'),
            'position' => Yii::t('app', 'manager.profile.position'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getPosition()
    {
        return $this->hasOne(Position::className(), ['id' => 'position']);
    }

    public function getFullName()
    {
        return $this->last_name . ' ' . $this->first_name . ' ' . $this->patronymic;
    }
}
