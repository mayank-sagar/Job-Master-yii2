<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Handles the creation of table `{{%categories}}`.
 */
class m211128_112552_create_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tbl_category', [
            'id' => $this->primaryKey(),
            'name' => $this->string(40)->unique(),
            'slug' => $this->string(80)->unique(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tbl_category');
    }
}
