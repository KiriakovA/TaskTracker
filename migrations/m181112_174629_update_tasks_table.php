<?php

use yii\db\Migration;

/**
 * Class m181112_174629_update_tasks_table
 */
class m181112_174629_update_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tasks', 'created_time', $this->dateTime());
        $this->addColumn('tasks', 'updated_time', $this->dateTime());
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181112_174629_update_tasks_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181112_174629_update_tasks_table cannot be reverted.\n";

        return false;
    }
    */
}
