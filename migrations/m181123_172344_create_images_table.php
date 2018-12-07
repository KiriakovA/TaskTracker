<?php

use yii\db\Migration;

/**
 * Handles the creation of table `images`.
 */
class m181123_172344_create_images_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('images', [
            'id_img' => $this->primaryKey(),
            'task_id'=>$this->integer()->notNull(),
            'url'=>$this->text(),
        ]);
        $this->addForeignKey('fk_images_task_id', 'images', 'task_id', 'tasks', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('images');
    }
}
