<?php

use yii\db\Migration;

/**
 * Handles the creation of table `articles`.
 */
class m170316_114430_create_articles_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        // $this->createTable('articles', [
        //     'id' => $this->primaryKey(),
        // ]);

        $tables = Yii::$app->db->schema->getTableNames();
        $dbType = $this->db->driverName;
        $tableOptions_mysql = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
        $tableOptions_mssql = "";
        $tableOptions_pgsql = "";
        $tableOptions_sqlite = "";
        /* MYSQL */
        if (!in_array('articles', $tables))  { 
        if ($dbType == "mysql") {
            $this->createTable('{{%articles}}', [
                'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                0 => 'PRIMARY KEY (`id`)',
                'title' => 'VARCHAR(255) NOT NULL',
                'content' => 'LONGTEXT NULL',
                'published' => 'TINYINT(1) NULL',
                'archived' => 'TINYINT(1) NULL',
                'created_at' => 'INT(11) NULL',
                'updated_at' => 'INT(11) NULL',
                'created_by' => 'INT(11) NULL',
                'updated_by' => 'INT(11) NULL',
            ], $tableOptions_mysql);
        }
        }
        
        /* MSSQL */
        if (!in_array('articles', $tables))  { 
        if ($dbType == "mssql") {
            $this->createTable('{{%articles}}', [
                'id' => 'INT(11) IDENTITY NOT NULL',
                0 => 'PRIMARY KEY (`id`)',
                'title' => 'VARCHAR(255) NOT NULL',
                'content' => 'LONGTEXT NULL',
                'published' => 'TINYINT(1) NULL',
                'archived' => 'TINYINT(1) NULL',
                'created_at' => 'INT(11) NULL',
                'updated_at' => 'INT(11) NULL',
                'created_by' => 'INT(11) NULL',
                'updated_by' => 'INT(11) NULL',
            ], $tableOptions_mssql);
        }
        }
        
        /* PGSQL */
        if (!in_array('articles', $tables))  { 
        if ($dbType == "pgsql") {
            $this->createTable('{{%articles}}', [
                'id' => 'INT(11) SERIAL NOT NULL',
                0 => 'PRIMARY KEY (`id`)',
                'title' => 'VARCHAR(255) NOT NULL',
                'content' => 'LONGTEXT NULL',
                'published' => 'TINYINT(1) NULL',
                'archived' => 'TINYINT(1) NULL',
                'created_at' => 'INT(11) NULL',
                'updated_at' => 'INT(11) NULL',
                'created_by' => 'INT(11) NULL',
                'updated_by' => 'INT(11) NULL',
            ], $tableOptions_pgsql);
        }
        }
        
        /* SQLITE */
        if (!in_array('articles', $tables))  { 
        if ($dbType == "sqlite") {
            $this->createTable('{{%articles}}', [
                'id' => 'INT(11) NOT NULL AUTOINCREMENT',
                0 => 'PRIMARY KEY (`id`)',
                'title' => 'VARCHAR(255) NOT NULL',
                'content' => 'LONGTEXT NULL',
                'published' => 'TINYINT(1) NULL',
                'archived' => 'TINYINT(1) NULL',
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
        $this->dropTable('articles');
        $this->execute('SET foreign_key_checks = 1;');
    }
}
