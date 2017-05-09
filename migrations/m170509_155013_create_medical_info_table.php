<?php

use yii\db\Migration;

/**
 * Handles the creation of table `medical_info`.
 */
class m170509_155013_create_medical_info_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('visit_to_symptom', [
            'id' => $this->primaryKey(),
            'visit_id' => $this->integer(),
            'symptom_id' => $this->integer(),
        ]);
        $this->addForeignKey('visit_symptom_to_visit', 'visit_to_symptom', 'visit_id', 'visit', 'id');
        $this->addForeignKey('symptom_to_symptom', 'visit_to_symptom', 'symptom_id', 'symptom', 'id');

        $this->createTable('visit_to_analyses', [
            'id' => $this->primaryKey(),
            'visit_id' => $this->integer(),
            'analyses_id' => $this->integer(),
        ]);
        $this->addForeignKey('visit_analyses_to_visit', 'visit_to_analyses', 'visit_id', 'visit', 'id');
        $this->addForeignKey('analyses_to_analyses', 'visit_to_analyses', 'analyses_id', 'analyses', 'id');

        $this->createTable('visit_to_complaint', [
            'id' => $this->primaryKey(),
            'visit_id' => $this->integer(),
            'complaint_id' => $this->integer(),
        ]);
        $this->addForeignKey('visit_complaint_to_visit', 'visit_to_complaint', 'visit_id', 'visit', 'id');
        $this->addForeignKey('complaint_to_complaint', 'visit_to_complaint', 'complaint_id', 'complaint', 'id');

        $this->createTable('visit_to_diagnosis', [
            'id' => $this->primaryKey(),
            'visit_id' => $this->integer(),
            'diagnosis_id' => $this->integer(),
        ]);
        $this->addForeignKey('visit_diagnosis_to_visit', 'visit_to_diagnosis', 'visit_id', 'visit', 'id');
        $this->addForeignKey('diagnosis_to_diagnosis', 'visit_to_diagnosis', 'diagnosis_id', 'diagnosis', 'id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('medical_info');
    }
}
