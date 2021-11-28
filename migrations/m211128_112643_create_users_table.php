<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m211128_112643_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tbl_users', [
            'id' => $this->primaryKey(),
            'name' => $this->string(40),
            'username' => $this->string(40)->unique(),
            'email' => $this->string(50)->unique(),
            'password' => $this->string(100),
            'auth_key' => $this->string(80),
            'status' => $this->tinyInteger(80)->defaultValue(1),
            'role' => $this->string(20)->defaultValue('user'),
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
