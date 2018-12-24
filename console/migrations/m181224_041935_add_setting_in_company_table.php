<?php

use yii\db\Migration;

/**
 * Class m181224_041935_add_setting_in_company_table
 */
class m181224_041935_add_setting_in_company_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%company}}', 'enable_forum', $this->tinyInteger(1)->notNull()->defaultValue(0));
        $this->addColumn('{{%company}}', 'enable_quote_request', $this->tinyInteger(1)->notNull()->defaultValue(0));
        $this->addColumn('{{%company}}', 'enable_articles', $this->tinyInteger(1)->notNull()->defaultValue(0));
        $this->addColumn('{{%company}}', 'enable_portofolio', $this->tinyInteger(1)->notNull()->defaultValue(0));
        $this->addColumn('{{%company}}', 'enable_team', $this->tinyInteger(1)->notNull()->defaultValue(0));
        $this->addColumn('{{%company}}', 'enable_contact', $this->tinyInteger(1)->notNull()->defaultValue(0));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181224_041935_add_setting_in_company_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181224_041935_add_setting_in_company_table cannot be reverted.\n";

        return false;
    }
    */
}
