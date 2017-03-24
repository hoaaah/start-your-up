<?php

use yii\db\Migration;

/**
 * Handles the creation of table `articleTags`.
 */
class m170324_031839_create_articleTags_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        // $this->createTable('articleTags', [
        //     'id' => $this->primaryKey(),
        // ]);


        $tables = Yii::$app->db->schema->getTableNames();
        $dbType = $this->db->driverName;
        $tableOptions_mysql = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
        $tableOptions_mssql = "";
        $tableOptions_pgsql = "";
        $tableOptions_sqlite = "";
        /* MYSQL */
        if (!in_array('article_tags', $tables))  { 
        if ($dbType == "mysql") {
            $this->createTable('{{%article_tags}}', [
                'article_id' => 'INT(11) NOT NULL',
                'tag_id' => 'INT(11) NOT NULL',
                2 => 'PRIMARY KEY (`article_id`, `tag_id`)',
            ], $tableOptions_mysql);
        }
        }
        
        /* MSSQL */
        if (!in_array('article_tags', $tables))  { 
        if ($dbType == "mssql") {
            $this->createTable('{{%article_tags}}', [
                'article_id' => 'INT(11) NOT NULL',
                'tag_id' => 'INT(11) NOT NULL',
                2 => 'PRIMARY KEY (`article_id`, `tag_id`)',
            ], $tableOptions_mssql);
        }
        }
        
        /* PGSQL */
        if (!in_array('article_tags', $tables))  { 
        if ($dbType == "pgsql") {
            $this->createTable('{{%article_tags}}', [
                'article_id' => 'INT(11) NOT NULL',
                'tag_id' => 'INT(11) NOT NULL',
                2 => 'PRIMARY KEY (`article_id`, `tag_id`)',
            ], $tableOptions_pgsql);
        }
        }
        
        /* SQLITE */
        if (!in_array('article_tags', $tables))  { 
        if ($dbType == "sqlite") {
            $this->createTable('{{%article_tags}}', [
                'article_id' => 'INT(11) NOT NULL',
                'tag_id' => 'INT(11) NOT NULL',
                2 => 'PRIMARY KEY (`article_id`, `tag_id`)',
            ], $tableOptions_sqlite);
        }
        }
        
        
        $this->createIndex('idx_tag_id_1185_00','article_tags','tag_id',0);
        $this->createIndex('idx_tag_id_1201_01','article_tags','tag_id',0);
        $this->createIndex('idx_tag_id_1216_02','article_tags','tag_id',0);
        $this->createIndex('idx_tag_id_1229_03','article_tags','tag_id',0);
        
        $this->execute('SET foreign_key_checks = 0');
        $this->addForeignKey('fk_articles_1168_00','{{%article_tags}}', 'article_id', '{{%articles}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_tags_1168_01','{{%article_tags}}', 'tag_id', '{{%tags}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_articles_1187_02','{{%article_tags}}', 'article_id', '{{%articles}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_tags_1188_03','{{%article_tags}}', 'tag_id', '{{%tags}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_articles_1203_04','{{%article_tags}}', 'article_id', '{{%articles}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_tags_1204_05','{{%article_tags}}', 'tag_id', '{{%tags}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->execute('SET foreign_key_checks = 1;');
        
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->execute('SET foreign_key_checks = 0;');
        $this->dropTable('articleTags');
        $this->execute('SET foreign_key_checks = 1;');
    }
}
