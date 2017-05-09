<?php

use yii\db\Migration;

class m170509_085129_alter_visit_table extends Migration
{
    public function up()
    {
        $this->addColumn('visit', 'card_id', $this->integer());

        $this->addForeignKey('visit_to_card', 'visit', 'card_id', 'medical_card', 'id');
    }

    public function down()
    {
        echo "m170509_085129_alter_visit_table cannot be reverted.\n";

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
