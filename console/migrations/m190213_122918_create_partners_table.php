<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%partners}}`.
 */
class m190213_122918_create_partners_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%partners}}', [
            'id' => $this->primaryKey(),
            'title' => $this->text(),
            'image' => $this->text(),
            'publish' => $this->integer(1)->defaultValue(0),
            'rank' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%partners}}');
    }
}
