<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tasks`.
 */
class m181105_093226_create_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tasks', [
            'id' => $this->primaryKey(),
            'task_name'=>$this->string(128)->notNull(),
            'info'=>$this->text(),
            'start_date'=>$this->date(),
            'end_date'=>$this->date(),
            'user_id'=>$this->integer()->notNull(),
            'task_maker'=>$this->integer()->notNull()    
        ]);
        $this->alterColumn('users', 'login', $this->string(50)->unique()->notNull());
        $this->addForeignKey('fk_tasks_users_id', 'tasks', 'user_id', 'users', 'id');
        $this->addForeignKey('fk_tasks_task_maker', 'tasks', 'task_maker', 'users', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tasks');
    }
}
