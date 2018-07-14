<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `news`.
 */
class m180712_204000_create_parse_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('parse', [
            'id' => $this->primaryKey(),
            'title' => $this->text(),
            'content' => $this->text(),
            'price' => $this->text(),
            'phone' => $this->text(),


        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('parse');
    }
}
