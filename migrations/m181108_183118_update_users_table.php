<?php

use yii\db\Migration;

/**
 * Class m181108_183118_update_users_table
 */
class m181108_183118_update_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('users', ['login','pass','name','surname','user_role'], [
          ['admin','admin','Artem','Kiriakov','1'],
          ['user1','user1','Vasya','Vasin','2'],
          ['user2','user2','Kirill','Kirillov','2'],
          ['user3','user3','Misha','Mishin','2'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181108_183118_update_users_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181108_183118_update_users_table cannot be reverted.\n";

        return false;
    }
    */
}
