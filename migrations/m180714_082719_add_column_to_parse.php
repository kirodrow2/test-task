<?php

use yii\db\Migration;

/**
 * Class m180714_082719_add_column_to_parse
 */
class m180714_082719_add_column_to_parse extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('parse', 'summ', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('parse', 'summ');
    }
}
