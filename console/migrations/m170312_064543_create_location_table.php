<?php

use yii\db\Migration;

/**
 * Handles the creation of table `location`.
 */
class m170312_064543_create_location_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('location', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'address' => $this->text(),
            'lat' => $this->decimal(11,8),
            'lng' => $this->decimal(11,8),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),            
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('location');
    }
}
