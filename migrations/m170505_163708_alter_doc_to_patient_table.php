<?php

use yii\db\Migration;

class m170505_163708_alter_doc_to_patient_table extends Migration
{
    public function up()
    {
        $this->dropColumn('doc_to_patient', 'doc_id');

        $this->addColumn('doc_to_patient', 'user_id', $this->integer());
    }

    public function down()
    {
        echo "m170505_163708_alter_doc_to_patient_table cannot be reverted.\n";

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
