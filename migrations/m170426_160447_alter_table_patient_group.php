<?php

use yii\db\Migration;

class m170426_160447_alter_table_patient_group extends Migration
{

    protected $tableName = 'patient_group';

    public function up()
    {
//        $this->alterColumn($this->tableName, 'name', $this->string(40));

        $this->insert($this->tableName, ['name' => 'ЧАЕС']);
        $this->insert($this->tableName, ['name' => 'Диспансерна']);
        $this->insert($this->tableName, ['name' => 'Соціальний статус']);
        $this->insert($this->tableName, ['name' => 'Інвалідність']);
    }

    public function down()
    {
        echo "m170426_160447_alter_table_patient_group cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
