<?php

use yii\db\Migration;

/**
 * Handles the creation of table `vaccination_mark`.
 */
class m170516_193930_create_vaccination_mark_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('medicine', [
            'id' => $this->primaryKey(),
            'name' => $this->string()
        ]);

        $this->createTable('vaccination_mark', [
            'id' => $this->primaryKey(),
            'patient_id' => $this->integer(),
            'vaccination_id' => $this->integer(),
            'date' => $this->string(),
            'dose' => $this->string(),
            'reaction' => $this->string(),
            'medicine_id' => $this->integer(),
            'contraindication' => $this->string()
        ]);

        $this->addForeignKey('vacc_mark_to_patient', 'vaccination_mark', 'patient_id', 'patient', 'id');
        $this->addForeignKey('vacc_mark_to_vaccination', 'vaccination_mark', 'vaccination_id', 'vaccination', 'id');
        $this->addForeignKey('vacc_mark_to_medicine', 'vaccination_mark', 'medicine_id', 'medicine', 'id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('vaccination_mark');
    }
}
