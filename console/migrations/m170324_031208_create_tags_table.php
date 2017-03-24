<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tags`.
 */
class m170324_031208_create_tags_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        // $this->createTable('tags', [
        //     'id' => $this->primaryKey(),
        // ]);

        $tables = Yii::$app->db->schema->getTableNames();
        $dbType = $this->db->driverName;
        $tableOptions_mysql = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
        $tableOptions_mssql = "";
        $tableOptions_pgsql = "";
        $tableOptions_sqlite = "";
        /* MYSQL */
        if (!in_array('tags', $tables))  { 
        if ($dbType == "mysql") {
            $this->createTable('{{%tags}}', [
                'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                0 => 'PRIMARY KEY (`id`)',
                'path' => 'VARCHAR(255) NOT NULL',
                'title' => 'VARCHAR(255) NOT NULL',
                'created_at' => 'INT(11) NULL',
                'updated_at' => 'INT(11) NULL',
                'created_by' => 'INT(11) NULL',
                'updated_by' => 'INT(11) NULL',
            ], $tableOptions_mysql);
        }
        }
        
        /* MSSQL */
        if (!in_array('tags', $tables))  { 
        if ($dbType == "mssql") {
            $this->createTable('{{%tags}}', [
                'id' => 'INT(11) IDENTITY NOT NULL',
                0 => 'PRIMARY KEY (`id`)',
                'path' => 'VARCHAR(255) NOT NULL',
                'title' => 'VARCHAR(255) NOT NULL',
                'created_at' => 'INT(11) NULL',
                'updated_at' => 'INT(11) NULL',
                'created_by' => 'INT(11) NULL',
                'updated_by' => 'INT(11) NULL',
            ], $tableOptions_mssql);
        }
        }
        
        /* PGSQL */
        if (!in_array('tags', $tables))  { 
        if ($dbType == "pgsql") {
            $this->createTable('{{%tags}}', [
                'id' => 'INT(11) SERIAL NOT NULL',
                0 => 'PRIMARY KEY (`id`)',
                'path' => 'VARCHAR(255) NOT NULL',
                'title' => 'VARCHAR(255) NOT NULL',
                'created_at' => 'INT(11) NULL',
                'updated_at' => 'INT(11) NULL',
                'created_by' => 'INT(11) NULL',
                'updated_by' => 'INT(11) NULL',
            ], $tableOptions_pgsql);
        }
        }
        
        /* SQLITE */
        if (!in_array('tags', $tables))  { 
        if ($dbType == "sqlite") {
            $this->createTable('{{%tags}}', [
                'id' => 'INT(11) NOT NULL AUTOINCREMENT',
                0 => 'PRIMARY KEY (`id`)',
                'path' => 'VARCHAR(255) NOT NULL',
                'title' => 'VARCHAR(255) NOT NULL',
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
        $this->dropTable('tags');
        $this->execute('SET foreign_key_checks = 1;');
    }
}
