<?php

use yii\db\Migration;

class m170509_092554_alter_patient_table extends Migration
{
    public function up()
    {
        $this->addColumn('patient', 'card_id', $this->integer());
    }

    public function down()
    {
        echo "m170509_092554_alter_patient_table cannot be reverted.\n";

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
