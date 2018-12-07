<?php

use yii\db\Migration;

/**
 * Handles the creation of table `roles`.
 */
class m181105_125118_create_roles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('roles', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(50)
        ]);
        $this->batchInsert('roles', ['name'], [
          ['admin'],
          ['user'],
        ]);
        $this->addForeignKey('fk_users_user_role', 'users', 'user_role', 'roles', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('roles');
    }
}
