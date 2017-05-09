<?php

use yii\db\Migration;

class m170509_152450_add_analyses_to_visit extends Migration
{
    public function up()
    {
        $this->addColumn('visit', 'analyses', $this->string());
    }

    public function down()
    {
        echo "m170509_152450_add_analyses_to_visit cannot be reverted.\n";

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
