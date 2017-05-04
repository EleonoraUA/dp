<?php

use yii\db\Migration;

class m170502_174228_alter_patient_study_place extends Migration
{
    public function up()
    {
        $this->alterColumn('patient', 'study', $this->string(100));
    }

    public function down()
    {
        echo "m170502_174228_alter_patient_study_place cannot be reverted.\n";

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
