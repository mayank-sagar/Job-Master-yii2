<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%jobs}}`.
 */
class m211128_112604_create_jobs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tbl_jobs', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(),
            'user_id' => $this->integer(),
            'title' => $this->string(100),
            'description' => $this->text(),
            'type' => $this->string(40),
            'requirements' => $this->string(200),
            'salary_range' => $this->string(100),
            'city' => $this->string(50),
            'address' => $this->string(100),
            'contact_email' => $this->string(80),
            'contact_phone' => $this->string(20),
            'is_published' => $this->tinyInteger(20)->defaultValue(1),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tbl_jobs');
    }
}
