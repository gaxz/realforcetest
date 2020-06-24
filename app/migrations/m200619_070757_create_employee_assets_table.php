<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%employee_assets}}`.
 */
class m200619_070757_create_employee_assets_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%employee_assets}}', [
            'id' => $this->primaryKey(),
            'employee_id' => $this->integer(),
            'name' => $this->string(),
            'cost' => $this->decimal(13, 2),
        ]);

        $this->createIndex('idx-employee-assets', '{{%employee_assets}}', 'employee_id');
        $this->addForeignKey('fk-employee-assets', '{{%employee_assets}}', 'employee_id', 'employee', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-employee-assets', '{{%employee_assets}}');
        $this->dropIndex('idx-employee-assets', '{{%employee_assets}}');
        $this->dropTable('{{%employee_assets}}');
    }
}
