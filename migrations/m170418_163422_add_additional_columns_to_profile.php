<?php

use yii\db\Migration;

class m170418_163422_add_additional_columns_to_profile extends Migration
{
    protected $tableName = 'profile';

    public function up()
    {
//        $this->addColumn($this->tableName, 'position', $this->integer());
        $this->addForeignKey('position', 'profile', ['position'], 'position', ['id']);
    }

    public function down()
    {
        echo "m170418_163422_add_additional_columns_to_profile cannot be reverted.\n";

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
