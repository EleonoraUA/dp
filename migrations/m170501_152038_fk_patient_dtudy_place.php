<?php

use yii\db\Migration;

class m170501_152038_fk_patient_dtudy_place extends Migration
{
    public function up()
    {
        $this->addColumn('patient', 'study_place_id', $this->integer());
        $this->addForeignKey('pat_to_study_place', 'patient', 'study_place_id', 'study_place', 'id');
    }

    public function down()
    {
        echo "m170501_152038_fk_patient_dtudy_place cannot be reverted.\n";

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
