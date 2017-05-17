<?php

use yii\db\Migration;

class m170516_184756_fill_vaccination_age_table_2 extends Migration
{
    public function up()
    {
        $this->insert('vaccination_age', ['age' => 30]); // 1 month
    }

    public function down()
    {
        echo "m170516_184756_fill_vaccination_age_table_2 cannot be reverted.\n";

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
