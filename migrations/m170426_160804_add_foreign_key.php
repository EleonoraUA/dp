<?php

use yii\db\Migration;

class m170426_160804_add_foreign_key extends Migration
{
    public function up()
    {
        $this->addColumn('patient_sub_group', 'group_id', $this->integer());
        $this->addForeignKey('group_to_subgroup', 'patient_sub_group', 'group_id', 'patient_group', 'id');
    }

    public function down()
    {
        echo "m170426_160804_add_foreign_key cannot be reverted.\n";

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
