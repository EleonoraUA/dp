<?php

use yii\db\Migration;

class m170616_194905_medicine extends Migration
{
    public function up()
    {
        $this->addColumn('visit', 'medicine', $this->string());
    }

    public function down()
    {
        echo "m170616_194905_medicine cannot be reverted.\n";

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
