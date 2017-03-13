<?php

use yii\db\Migration;

/**
 * Handles the creation of table `company`.
 */
class m170312_135751_create_company_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        // $this->createTable('company', [
        //     'id' => $this->primaryKey(),
        // ]);

        $tables = Yii::$app->db->schema->getTableNames();
        $dbType = $this->db->driverName;
        $tableOptions_mysql = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
        $tableOptions_mssql = "";
        $tableOptions_pgsql = "";
        $tableOptions_sqlite = "";
        /* MYSQL */
        if (!in_array('company', $tables))  { 
        if ($dbType == "mysql") {
            $this->createTable('{{%company}}', [
                'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                0 => 'PRIMARY KEY (`id`)',
                'company_name' => 'VARCHAR(30) NULL',
                'lead_message' => 'VARCHAR(30) NULL',
                'intro_message' => 'VARCHAR(50) NULL',
                'services_button' => 'VARCHAR(20) NULL',
                'service_title' => 'VARCHAR(50) NULL',
                'service_message' => 'VARCHAR(100) NULL',
                'service_homepage' => 'INT(1) NULL',
                'portofolio_title' => 'VARCHAR(50) NULL',
                'portofolio_message' => 'VARCHAR(100) NULL',
                'portofolio_homepage' => 'INT(2) NULL',
                'about_title' => 'VARCHAR(50) NULL',
                'about_message' => 'VARCHAR(100) NULL',
                'team_title' => 'VARCHAR(50) NULL',
                'team_message_1' => 'VARCHAR(100) NULL',
                'team_message_2' => 'TEXT NULL',
                'twitter_account' => 'VARCHAR(100) NULL',
                'facebook_account' => 'VARCHAR(100) NULL',
                'linkedin_account' => 'VARCHAR(100) NULL',
            ], $tableOptions_mysql);
        }
        }
        
        /* MSSQL */
        if (!in_array('company', $tables))  { 
        if ($dbType == "mssql") {
            $this->createTable('{{%company}}', [
                'id' => 'INT(11) IDENTITY NOT NULL',
                0 => 'PRIMARY KEY (`id`)',
                'company_name' => 'VARCHAR(30) NULL',
                'lead_message' => 'VARCHAR(30) NULL',
                'intro_message' => 'VARCHAR(50) NULL',
                'services_button' => 'VARCHAR(20) NULL',
                'service_title' => 'VARCHAR(50) NULL',
                'service_message' => 'VARCHAR(100) NULL',
                'service_homepage' => 'INT(1) NULL',
                'portofolio_title' => 'VARCHAR(50) NULL',
                'portofolio_message' => 'VARCHAR(100) NULL',
                'portofolio_homepage' => 'INT(2) NULL',
                'about_title' => 'VARCHAR(50) NULL',
                'about_message' => 'VARCHAR(100) NULL',
                'team_title' => 'VARCHAR(50) NULL',
                'team_message_1' => 'VARCHAR(100) NULL',
                'team_message_2' => 'TEXT NULL',
                'twitter_account' => 'VARCHAR(100) NULL',
                'facebook_account' => 'VARCHAR(100) NULL',
                'linkedin_account' => 'VARCHAR(100) NULL',
            ], $tableOptions_mssql);
        }
        }
        
        /* PGSQL */
        if (!in_array('company', $tables))  { 
        if ($dbType == "pgsql") {
            $this->createTable('{{%company}}', [
                'id' => 'INT(11) SERIAL NOT NULL',
                0 => 'PRIMARY KEY (`id`)',
                'company_name' => 'VARCHAR(30) NULL',
                'lead_message' => 'VARCHAR(30) NULL',
                'intro_message' => 'VARCHAR(50) NULL',
                'services_button' => 'VARCHAR(20) NULL',
                'service_title' => 'VARCHAR(50) NULL',
                'service_message' => 'VARCHAR(100) NULL',
                'service_homepage' => 'INT(1) NULL',
                'portofolio_title' => 'VARCHAR(50) NULL',
                'portofolio_message' => 'VARCHAR(100) NULL',
                'portofolio_homepage' => 'INT(2) NULL',
                'about_title' => 'VARCHAR(50) NULL',
                'about_message' => 'VARCHAR(100) NULL',
                'team_title' => 'VARCHAR(50) NULL',
                'team_message_1' => 'VARCHAR(100) NULL',
                'team_message_2' => 'TEXT NULL',
                'twitter_account' => 'VARCHAR(100) NULL',
                'facebook_account' => 'VARCHAR(100) NULL',
                'linkedin_account' => 'VARCHAR(100) NULL',
            ], $tableOptions_pgsql);
        }
        }
        
        /* SQLITE */
        if (!in_array('company', $tables))  { 
        if ($dbType == "sqlite") {
            $this->createTable('{{%company}}', [
                'id' => 'INT(11) NOT NULL AUTOINCREMENT',
                0 => 'PRIMARY KEY (`id`)',
                'company_name' => 'VARCHAR(30) NULL',
                'lead_message' => 'VARCHAR(30) NULL',
                'intro_message' => 'VARCHAR(50) NULL',
                'services_button' => 'VARCHAR(20) NULL',
                'service_title' => 'VARCHAR(50) NULL',
                'service_message' => 'VARCHAR(100) NULL',
                'service_homepage' => 'INT(1) NULL',
                'portofolio_title' => 'VARCHAR(50) NULL',
                'portofolio_message' => 'VARCHAR(100) NULL',
                'portofolio_homepage' => 'INT(2) NULL',
                'about_title' => 'VARCHAR(50) NULL',
                'about_message' => 'VARCHAR(100) NULL',
                'team_title' => 'VARCHAR(50) NULL',
                'team_message_1' => 'VARCHAR(100) NULL',
                'team_message_2' => 'TEXT NULL',
                'twitter_account' => 'VARCHAR(100) NULL',
                'facebook_account' => 'VARCHAR(100) NULL',
                'linkedin_account' => 'VARCHAR(100) NULL',
            ], $tableOptions_sqlite);
        }
        }
        
        
        $this->execute('SET foreign_key_checks = 0');
        $this->insert('{{%company}}',['id'=>'1','company_name'=>'Corporate-Site','lead_message'=>'Welcome To Our Studio!','intro_message'=>'IT\'S NICE TO MEET YOU','services_button'=>'Tell Us More','service_title'=>'SERVICES','service_message'=>'Lorem ipsum dolor sit amet consectetur.','service_homepage'=>'3','portofolio_title'=>'PORTFOLIO','portofolio_message'=>'Lorem ipsum dolor sit amet consectetur.','portofolio_homepage'=>'6','about_title'=>'ABOUT','about_message'=>'Lorem ipsum dolor sit amet consectetur.','team_title'=>'OUR AMAZING TEAM','team_message_1'=>'Lorem ipsum dolor sit amet consectetur.','team_message_2'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.','twitter_account'=>'hoaaah','facebook_account'=>'facebook','linkedin_account'=>'Arief Wijaya']);
        $this->execute('SET foreign_key_checks = 1;');        
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        $this->dropTable('company');
        $this->execute('SET foreign_key_checks = 1;');
    }
}
