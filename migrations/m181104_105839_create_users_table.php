<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m181104_105839_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'login'=>$this->string(50)->notNull(),
            'pass'=>$this->string(256)->notNull(),
            'name'=>$this->string(50)->notNull(),
            'surname'=>$this->string(50)->notNull(),
            'user_role'=>$this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
    }
}
