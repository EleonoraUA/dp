<?php

use yii\db\Migration;

class m170501_135110_add_subgroup extends Migration
{
    public function up()
    {
//        $this->addColumn('patient', 'subgroup', $this->integer());

        $this->addForeignKey('patient_subgroup', 'patient', 'subgroup', 'patient_sub_group', 'id');
    }

    public function down()
    {
        echo "m170501_135110_add_subgroup cannot be reverted.\n";

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
