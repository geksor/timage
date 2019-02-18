<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%callback_section}}`.
 */
class m190213_124400_create_callback_section_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%callback_section}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer(),
            'done_at' => $this->integer(),
            'viewed' => $this->integer(1)->defaultValue(0),
            'name' => $this->text(),
            'phone' => $this->text(),
            'section_name' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%callback_section}}');
    }
}
