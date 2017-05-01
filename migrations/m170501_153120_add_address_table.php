<?php

use yii\db\Migration;

class m170501_153120_add_address_table extends Migration
{
    public function up()
    {
        $this->addColumn('patient', 'address', $this->string(100));
    }

    public function down()
    {
        echo "m170501_153120_add_address_table cannot be reverted.\n";

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
