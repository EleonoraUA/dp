<?php

use yii\db\Migration;

class m170419_124414_add_pib_column_to_profile extends Migration
{
    protected $tableName = 'profile';

    public function up()
    {
        $this->addColumn($this->tableName, 'first_name', $this->string(40));
        $this->addColumn($this->tableName, 'last_name', $this->string(40));
        $this->addColumn($this->tableName, 'patronymic', $this->string(40));
    }

    public function down()
    {
        echo "m170419_124414_add_pib_column_to_profile cannot be reverted.\n";

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
