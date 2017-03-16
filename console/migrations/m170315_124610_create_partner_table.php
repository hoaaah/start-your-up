<?php

use yii\db\Migration;

/**
 * Handles the creation of table `partner`.
 */
class m170315_124610_create_partner_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        // $this->createTable('partner', [
        //     'id' => $this->primaryKey(),
        // ]);

        $tables = Yii::$app->db->schema->getTableNames();
        $dbType = $this->db->driverName;
        $tableOptions_mysql = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
        $tableOptions_mssql = "";
        $tableOptions_pgsql = "";
        $tableOptions_sqlite = "";
        /* MYSQL */
        if (!in_array('partner', $tables))  { 
        if ($dbType == "mysql") {
            $this->createTable('{{%partner}}', [
                'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                0 => 'PRIMARY KEY (`id`)',
                'name' => 'VARCHAR(100) NOT NULL',
                'job' => 'VARCHAR(100) NOT NULL',
                'content' => 'TEXT NULL',
                'twitter_account' => 'VARCHAR(100) NULL',
                'facebook_account' => 'VARCHAR(100) NULL',
                'linkedin_account' => 'VARCHAR(100) NULL',
                'logo' => 'VARCHAR(255) NULL',
                'homepage' => 'TINYINT(1) NULL',
                'created_at' => 'INT(11) NULL',
                'updated_at' => 'INT(11) NULL',
                'created_by' => 'INT(11) NULL',
                'updated_by' => 'INT(11) NULL',
            ], $tableOptions_mysql);
        }
        }
        
        /* MSSQL */
        if (!in_array('partner', $tables))  { 
        if ($dbType == "mssql") {
            $this->createTable('{{%partner}}', [
                'id' => 'INT(11) IDENTITY NOT NULL',
                0 => 'PRIMARY KEY (`id`)',
                'name' => 'VARCHAR(100) NOT NULL',
                'job' => 'VARCHAR(100) NOT NULL',
                'content' => 'TEXT NULL',
                'twitter_account' => 'VARCHAR(100) NULL',
                'facebook_account' => 'VARCHAR(100) NULL',
                'linkedin_account' => 'VARCHAR(100) NULL',
                'logo' => 'VARCHAR(255) NULL',
                'homepage' => 'TINYINT(1) NULL',
                'created_at' => 'INT(11) NULL',
                'updated_at' => 'INT(11) NULL',
                'created_by' => 'INT(11) NULL',
                'updated_by' => 'INT(11) NULL',
            ], $tableOptions_mssql);
        }
        }
        
        /* PGSQL */
        if (!in_array('partner', $tables))  { 
        if ($dbType == "pgsql") {
            $this->createTable('{{%partner}}', [
                'id' => 'INT(11) SERIAL NOT NULL',
                0 => 'PRIMARY KEY (`id`)',
                'name' => 'VARCHAR(100) NOT NULL',
                'job' => 'VARCHAR(100) NOT NULL',
                'content' => 'TEXT NULL',
                'twitter_account' => 'VARCHAR(100) NULL',
                'facebook_account' => 'VARCHAR(100) NULL',
                'linkedin_account' => 'VARCHAR(100) NULL',
                'logo' => 'VARCHAR(255) NULL',
                'homepage' => 'TINYINT(1) NULL',
                'created_at' => 'INT(11) NULL',
                'updated_at' => 'INT(11) NULL',
                'created_by' => 'INT(11) NULL',
                'updated_by' => 'INT(11) NULL',
            ], $tableOptions_pgsql);
        }
        }
        
        /* SQLITE */
        if (!in_array('partner', $tables))  { 
        if ($dbType == "sqlite") {
            $this->createTable('{{%partner}}', [
                'id' => 'INT(11) NOT NULL AUTOINCREMENT',
                0 => 'PRIMARY KEY (`id`)',
                'name' => 'VARCHAR(100) NOT NULL',
                'job' => 'VARCHAR(100) NOT NULL',
                'content' => 'TEXT NULL',
                'twitter_account' => 'VARCHAR(100) NULL',
                'facebook_account' => 'VARCHAR(100) NULL',
                'linkedin_account' => 'VARCHAR(100) NULL',
                'logo' => 'VARCHAR(255) NULL',
                'homepage' => 'TINYINT(1) NULL',
                'created_at' => 'INT(11) NULL',
                'updated_at' => 'INT(11) NULL',
                'created_by' => 'INT(11) NULL',
                'updated_by' => 'INT(11) NULL',
            ], $tableOptions_sqlite);
        }
        }        
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        $this->dropTable('partner');
        $this->execute('SET foreign_key_checks = 1;');
    }
}
