<?php

use yii\db\Migration;

/**
 * Class m181113_090221_update_users_table
 */
class m181113_090221_update_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('users', 'email', $this->string(128));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181113_090221_update_users_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181113_090221_update_users_table cannot be reverted.\n";

        return false;
    }
    */
}
