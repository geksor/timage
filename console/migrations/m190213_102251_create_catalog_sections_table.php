<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%catalog_sections}}`.
 */
class m190213_102251_create_catalog_sections_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%catalog_sections}}', [
            'id' => $this->primaryKey(),
            'title' => $this->text(),
            'price' => $this->integer(),
            'short_desc' => $this->string(250),
            'desc' => $this->text(),
            'main_image' => $this->text(),
            'second_image_1' => $this->text(),
            'second_image_2' => $this->text(),
            'alias' => $this->text(),
            'meta_title' => $this->text(),
            'meta_description' => $this->text(),
            'publish' => $this->integer(1)->defaultValue(0),
            'rank' => $this->integer(),
            'show_on_home' => $this->integer(1)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%catalog_sections}}');
    }
}
