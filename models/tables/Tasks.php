<?php

namespace app\models\tables;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\base\Model;
use DateTime;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string $task_name
 * @property string $info
 * @property string $start_date
 * @property string $end_date
 * @property int $user_id
 * @property int $task_maker
 *
 * @property Users $taskMaker
 * @property Users $user
 */
class Tasks extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_time',
                'updatedAtAttribute' => 'updated_time',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function rules() {
        return [
            [['task_name', 'user_id', 'task_maker'], 'required'],
            [['info'], 'string'],
            [['start_date', 'end_date'], 'safe'],
            [['user_id', 'task_maker'], 'integer'],
            [['task_name'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'Task Number',
            'task_name' => 'Task Name',
            'info' => 'Info',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'user_id' => 'Исполнитель задачи',
            'task_maker' => 'Постановщик задачи',
            'taskMaker.login' => 'Постановщик задачи',
            'user.login' => 'Исполнитель задачи',
            'created_time' => 'Создано',
            'updated_time' => 'Обновлено'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTaskMaker() {
        return $this->hasOne(Users::className(), ['id' => 'task_maker']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser() {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }

    public function getUserName() {
        $user = $this->user;

        return $user ? $user->login : '';
    }

    public static function getMonth() {
        return static::find()
                        ->select('MONTH(start_date)', 'DISTINCT', 'DESC')
                        ->orderBy('start_date DESC')
                        ->indexBy(function ($row) {
                            return $row['MONTH(start_date)'];
                        })
                        ->column();
    }

    public static function getUserPage($id) {
        return static::find()
                        ->where(['user_id' => $id]);
    }

    public static function getTasks() {
        $tasks = static::find()
                ->with('user')
                ->all();

        $now = new DateTime(date('Y/m/d'));
        foreach ($tasks as $val) {
            $dateData = \date_diff($now, new Datetime($val->end_date));
            if($dateData->days<=10){
               $interval[$val->task_name] = 
                    [
                        'day' =>$dateData->days,
                        'name'=>$val->user->login,
                        'email'=>$val->user->email,
                    ]; 
            }        
        }
        
        return $interval;
    }

}
