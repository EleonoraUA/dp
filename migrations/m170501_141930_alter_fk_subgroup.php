<?php

use yii\db\Migration;

class m170501_141930_alter_fk_subgroup extends Migration
{
    public function up()
    {
        $this->dropForeignKey('patient_subgroup', 'patient');

        $this->addForeignKey('subgroup', 'patient', 'subgroup', 'patient_sub_group', 'id');
    }

    public function down()
    {
        echo "m170501_141930_alter_fk_subgroup cannot be reverted.\n";

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
