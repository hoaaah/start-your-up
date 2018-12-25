<?php

use yii\db\Migration;

/**
 * Handles the creation of table `quotationRequest`.
 */
class m181224_105521_create_quotationRequest_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%quotation_request}}', [
            'id' => $this->primaryKey(),
            'date_of_request' => $this->date()->notNull(),
            'partner_category' => $this->string(100),
            'customer_name' => $this->string(100)->notNull(),
            'customer_email' => $this->string(100)->notNull(),
            'customer_address' => $this->string(),
            'customer_contact' => $this->string(100),
            'product_request' => $this->integer()->notNull(),
            'request_detail' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%quotation_request}}');
    }
}
