<?php

use yii\db\Migration;

class m170424_080420_add_foreign_key_district extends Migration
{
    public function up()
    {
        $this->addColumn('district', 'clinic_id', $this->integer());
        $this->addForeignKey('district_to_clinic', 'district', 'clinic_id', 'clinic', 'id');
    }

    public function down()
    {
        echo "m170424_080420_add_foreign_key_district cannot be reverted.\n";

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
