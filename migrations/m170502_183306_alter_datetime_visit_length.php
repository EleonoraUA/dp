<?php

use yii\db\Migration;

class m170502_183306_alter_datetime_visit_length extends Migration
{
    public function up()
    {
        $this->alterColumn('visit', 'datetime', $this->string(30));
    }

    public function down()
    {
        echo "m170502_183306_alter_datetime_visit_length cannot be reverted.\n";

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
