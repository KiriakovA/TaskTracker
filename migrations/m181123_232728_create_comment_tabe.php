<?php

use yii\db\Migration;

/**
 * Class m181123_232728_create_comment_tabe
 */
class m181123_232728_create_comment_tabe extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
            $this->createTable('comment', [
            'id' => $this->primaryKey(),
            'task'=>$this->integer()->notNull(),
            'author'=>$this->integer()->notNull(),
            'content'=>$this->text(),
            'created_time'=>$this->dateTime(),
            'updated_time'=>$this->dateTime()
        ]);
        $this->addForeignKey('fk_images_task', 'comment', 'task', 'tasks', 'id');
        $this->addForeignKey('fk_images_author', 'comment', 'author', 'users', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181123_232728_create_comment_tabe cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181123_232728_create_comment_tabe cannot be reverted.\n";

        return false;
    }
    */
}
