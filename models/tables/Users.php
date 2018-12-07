<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $login
 * @property string $pass
 * @property string $name
 * @property string $surname
 * @property int $user_role
 *
 * @property Tasks[] $tasks
 * @property Tasks[] $tasks0
 * @property UserRoles $role
 */
class Users extends \yii\db\ActiveRecord {
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'pass', 'name', 'surname', 'user_role'], 'required'],
            [['user_role'], 'integer'],
            [['login', 'name', 'surname'], 'string', 'max' => 50],
            [['pass'], 'string', 'max' => 256],
            [['login'], 'unique'],
            [['email'], 'email'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'pass' => 'Pass',
            'name' => 'Name',
            'surname' => 'Surname',
            'user_role' => 'User Role',
            'role.name'=>'Role',
            'email'=>'E-mail'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Tasks::className(), ['task_maker' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks0()
    {
        return $this->hasMany(Tasks::className(), ['user_id' => 'id']);
    }
    public function getRole(){
        return $this->hasOne(Roles::className(),['id'=>'user_role']);
    }
   
    
}
