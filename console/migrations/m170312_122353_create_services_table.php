<?php

use yii\db\Migration;

/**
 * Handles the creation of table `services`.
 */
class m170312_122353_create_services_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        // here is the old generated migrate
        // $this->createTable('services', [
        //     'id' => $this->primaryKey(),
        // ]);

        // here is the new generated from /utility with old style createTable

        $tables = Yii::$app->db->schema->getTableNames();
        $dbType = $this->db->driverName;
        $tableOptions_mysql = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
        $tableOptions_mssql = "";
        $tableOptions_pgsql = "";
        $tableOptions_sqlite = "";
        /* MYSQL */
        if (!in_array('services', $tables))  { 
            if ($dbType == "mysql") {
                $this->createTable('{{%services}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'title' => 'VARCHAR(50) NOT NULL',
                    'content' => 'VARCHAR(255) NOT NULL',
                    'services_icon' => 'VARCHAR(255) NOT NULL',
                    'homepage' => 'TINYINT(1) NOT NULL',
                ], $tableOptions_mysql);
            }
        }
        
        /* MSSQL */
        if (!in_array('services', $tables))  { 
            if ($dbType == "mssql") {
                $this->createTable('{{%services}}', [
                    'id' => 'INT(11) IDENTITY NOT NULL',
                    0 => 'PRIMARY KEY (`id`)',
                    'title' => 'VARCHAR(50) NOT NULL',
                    'content' => 'VARCHAR(255) NOT NULL',
                    'services_icon' => 'VARCHAR(255) NOT NULL',
                    'homepage' => 'TINYINT(1) NOT NULL',
                ], $tableOptions_mssql);
            }
        }
        
        /* PGSQL */
        if (!in_array('services', $tables))  { 
            if ($dbType == "pgsql") {
                $this->createTable('{{%services}}', [
                    'id' => 'INT(11) SERIAL NOT NULL',
                    0 => 'PRIMARY KEY (`id`)',
                    'title' => 'VARCHAR(50) NOT NULL',
                    'content' => 'VARCHAR(255) NOT NULL',
                    'services_icon' => 'VARCHAR(255) NOT NULL',
                    'homepage' => 'TINYINT(1) NOT NULL',
                ], $tableOptions_pgsql);
            }
        }
        
        /* SQLITE */
        if (!in_array('services', $tables))  { 
            if ($dbType == "sqlite") {
                $this->createTable('{{%services}}', [
                    'id' => 'INT(11) NOT NULL AUTOINCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'title' => 'VARCHAR(50) NOT NULL',
                    'content' => 'VARCHAR(255) NOT NULL',
                    'services_icon' => 'VARCHAR(255) NOT NULL',
                    'homepage' => 'TINYINT(1) NOT NULL',
                ], $tableOptions_sqlite);
            }
        }
        
        
        $this->execute('SET foreign_key_checks = 0');
        $this->insert('{{%services}}',['id'=>'1','title'=>'E-Commerce','content'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.','services_icon'=>'fa fa-shopping-cart','homepage'=>'1']);
        $this->insert('{{%services}}',['id'=>'2','title'=>'Responsive Design','content'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.','services_icon'=>'fa fa-laptop','homepage'=>'1']);
        $this->insert('{{%services}}',['id'=>'3','title'=>'Web Security','content'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.','services_icon'=>'fa fa-lock','homepage'=>'1']);
        $this->execute('SET foreign_key_checks = 1;');
      
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        $this->dropTable('services');
        $this->execute('SET foreign_key_checks = 1;');        
    }
}
