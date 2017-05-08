<?php

use yii\db\Migration;

class m170508_170526_alter_visit_table extends Migration
{
    public function up()
    {
        $this->createTable('symptom', [
            'id' => $this->primaryKey(),
            'name' => $this->string()
        ]);

        $this->createTable('complaint', [
            'id' => $this->primaryKey(),
            'name' => $this->string()
        ]);

        $this->createTable('diagnosis', [
            'id' => $this->primaryKey(),
            'name' => $this->string()
        ]);

        $this->createTable('visit_to_symptom', [
            'id' => $this->primaryKey(),
            'visit_id' => $this->integer(),
            'symptom_id' => $this->integer(),
        ]);

        $this->createTable('visit_to_complaint', [
            'id' => $this->primaryKey(),
            'visit_id' => $this->integer(),
            'complaint_id' => $this->integer(),
        ]);

        $this->createTable('visit_to_diagnosis', [
            'id' => $this->primaryKey(),
            'visit_id' => $this->integer(),
            'diagnosis_id' => $this->integer(),
        ]);
    }

    public function down()
    {
        echo "m170508_170526_alter_visit_table cannot be reverted.\n";

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
