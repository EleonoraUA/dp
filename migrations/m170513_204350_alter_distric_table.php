<?php

use yii\db\Migration;

class m170513_204350_alter_distric_table extends Migration
{
    public function up()
    {
        $this->addColumn('district', 'flat', $this->string());
    }

    public function down()
    {
        echo "m170513_204350_alter_distric_table cannot be reverted.\n";

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
