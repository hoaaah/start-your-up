<?php

use yii\db\Migration;

/**
 * Handles the creation of table `portofolio`.
 */
class m170313_091443_create_portofolio_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        // $this->createTable('portofolio', [
        //     'id' => $this->primaryKey(),
        // ]);
        $tables = Yii::$app->db->schema->getTableNames();
        $dbType = $this->db->driverName;
        $tableOptions_mysql = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
        $tableOptions_mssql = "";
        $tableOptions_pgsql = "";
        $tableOptions_sqlite = "";
        /* MYSQL */
        if (!in_array('portofolio', $tables))  { 
        if ($dbType == "mysql") {
            $this->createTable('{{%portofolio}}', [
                'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                0 => 'PRIMARY KEY (`id`)',
                'service_id' => 'INT(11) NULL',
                'title' => 'VARCHAR(20) NOT NULL',
                'short_explanation' => 'VARCHAR(50) NULL',
                'image' => 'VARCHAR(255) NULL',
                'content' => 'TEXT NULL',
                'link' => 'VARCHAR(255) NULL',
                'client' => 'VARCHAR(255) NULL',
                'published' => 'TINYINT(1) NULL',
                'created_at' => 'TIMESTAMP NULL',
                'updated_at' => 'TIMESTAMP NULL',
                'created_by' => 'INT(11) NULL',
                'updated_by' => 'INT(11) NULL',
            ], $tableOptions_mysql);
        }
        }
        
        /* MSSQL */
        if (!in_array('portofolio', $tables))  { 
        if ($dbType == "mssql") {
            $this->createTable('{{%portofolio}}', [
                'id' => 'INT(11) IDENTITY NOT NULL',
                0 => 'PRIMARY KEY (`id`)',
                'service_id' => 'INT(11) NULL',
                'title' => 'VARCHAR(20) NOT NULL',
                'short_explanation' => 'VARCHAR(50) NULL',
                'image' => 'VARCHAR(255) NULL',
                'content' => 'TEXT NULL',
                'link' => 'VARCHAR(255) NULL',
                'client' => 'VARCHAR(255) NULL',
                'published' => 'TINYINT(1) NULL',
                'created_at' => 'TIMESTAMP NULL',
                'updated_at' => 'TIMESTAMP NULL',
                'created_by' => 'INT(11) NULL',
                'updated_by' => 'INT(11) NULL',
            ], $tableOptions_mssql);
        }
        }
        
        /* PGSQL */
        if (!in_array('portofolio', $tables))  { 
        if ($dbType == "pgsql") {
            $this->createTable('{{%portofolio}}', [
                'id' => 'INT(11) SERIAL NOT NULL',
                0 => 'PRIMARY KEY (`id`)',
                'service_id' => 'INT(11) NULL',
                'title' => 'VARCHAR(20) NOT NULL',
                'short_explanation' => 'VARCHAR(50) NULL',
                'image' => 'VARCHAR(255) NULL',
                'content' => 'TEXT NULL',
                'link' => 'VARCHAR(255) NULL',
                'client' => 'VARCHAR(255) NULL',
                'published' => 'TINYINT(1) NULL',
                'created_at' => 'TIMESTAMP NULL',
                'updated_at' => 'TIMESTAMP NULL',
                'created_by' => 'INT(11) NULL',
                'updated_by' => 'INT(11) NULL',
            ], $tableOptions_pgsql);
        }
        }
        
        /* SQLITE */
        if (!in_array('portofolio', $tables))  { 
        if ($dbType == "sqlite") {
            $this->createTable('{{%portofolio}}', [
                'id' => 'INT(11) NOT NULL AUTOINCREMENT',
                0 => 'PRIMARY KEY (`id`)',
                'service_id' => 'INT(11) NULL',
                'title' => 'VARCHAR(20) NOT NULL',
                'short_explanation' => 'VARCHAR(50) NULL',
                'image' => 'VARCHAR(255) NULL',
                'content' => 'TEXT NULL',
                'link' => 'VARCHAR(255) NULL',
                'client' => 'VARCHAR(255) NULL',
                'published' => 'TINYINT(1) NULL',
                'created_at' => 'INT(11) NULL',
                'updated_at' => 'INT(11) NULL',
                'created_by' => 'INT(11) NULL',
                'updated_by' => 'INT(11) NULL',
            ], $tableOptions_sqlite);
        }
        }
        
        
        $this->createIndex('idx_service_id_1827_00','portofolio','service_id',0);
        $this->createIndex('idx_service_id_1846_01','portofolio','service_id',0);
        $this->createIndex('idx_service_id_1859_02','portofolio','service_id',0);
        $this->createIndex('idx_service_id_1873_03','portofolio','service_id',0);
        
        $this->execute('SET foreign_key_checks = 0');
        $this->addForeignKey('fk_services_182_00','{{%portofolio}}', 'service_id', '{{%services}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_services_184_01','{{%portofolio}}', 'service_id', '{{%services}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_services_1854_02','{{%portofolio}}', 'service_id', '{{%services}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->execute('SET foreign_key_checks = 1;');        
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        $this->dropTable('portofolio');
        $this->execute('SET foreign_key_checks = 1;');
    }
}
