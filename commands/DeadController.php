<?php

namespace app\commands;
use app\models\tables\Users;
use app\models\tables\Tasks;
use yii\console\Controller;
use yii\helpers\Console;



/**
 * Dead-line app
 */
class DeadController extends Controller{
    
    public function actionGet(){
       
        if($task = Tasks::getTasks()){
            $total=count($task);
            $counter = 0;
            Console::startProgress($counter, $total);
            foreach ($task as $key=>$val){
                \Yii::$app->mailer->compose()
                ->setTo($val['email'])
                ->setFrom(['administrator@test.ru'])
                ->setSubject($val['name'].'! срок выполнения задачи '.$key.' подходит к концу!')
                ->setTextBody('до конца срока выполнения задания: '.$key.' осталось '.$val['day'].'д., пожалуйста поторопитесь')
                ->send();
                echo PHP_EOL.'Пользователю '.$val['name'].' до конца срока выполнения задания: '.$key.' осталось '.$val['day'].'д.'.PHP_EOL;
                Console::updateProgress(++$counter, $total);
            }
            Console::endProgress();
        }else{
            echo 'На пользователя задач не назначено';
        }
       
    }
    
}

