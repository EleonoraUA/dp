<?php

use yii\db\Migration;

class m170501_142419_add_column extends Migration
{
    public function up()
    {
//        $this->addColumn('patient_sub_group', 'patient_id', $this->integer());
    }

    public function down()
    {
        echo "m170501_142419_add_column cannot be reverted.\n";

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
