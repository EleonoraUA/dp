<?php

use yii\db\Migration;

class m170516_180706_fill_vaccination_age_table extends Migration
{
    public function up()
    {
        $this->insert('vaccination_age', ['age' => 1]); // 1 day
        $this->insert('vaccination_age', ['age' => 4]); // 4 days
        $this->insert('vaccination_age', ['age' => 90]); // 3 months
        $this->insert('vaccination_age', ['age' => 120]); // 4 months
        $this->insert('vaccination_age', ['age' => 150]); // 5 months
        $this->insert('vaccination_age', ['age' => 180]); // 6 months
        $this->insert('vaccination_age', ['age' => 365]); // 12 months
        $this->insert('vaccination_age', ['age' => 545]); // 18 months
        $this->insert('vaccination_age', ['age' => 2190]); // 6 years
        $this->insert('vaccination_age', ['age' => 2555]); // 7 years
        $this->insert('vaccination_age', ['age' => 5110]); // 14 years
        $this->insert('vaccination_age', ['age' => 6570]); // 18 years
    }

    public function down()
    {
        echo "m170516_180706_fill_vaccination_age_table cannot be reverted.\n";

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
