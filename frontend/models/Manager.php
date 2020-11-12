<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "manager".
 *
 * @property int $id
 * @property string|null $firstname
 * @property string|null $lastname
 * @property string|null $password
 * @property string|null $login
 * @property string|null $email
 * @property string|null $phone
 * @property int|null $status
 *
 * @property Call[] $calls
 */
class Manager extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'manager';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['firstname', 'lastname', 'password', 'login', 'email', 'phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'password' => 'Password',
            'login' => 'Login',
            'email' => 'Email',
            'phone' => 'Phone',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Calls]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCalls()
    {
        return $this->hasMany(Call::className(), ['manager_id' => 'id']);
    }
}
