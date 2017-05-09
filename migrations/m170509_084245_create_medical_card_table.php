<?php

use yii\db\Migration;

/**
 * Handles the creation of table `medical_card`.
 */
class m170509_084245_create_medical_card_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('medical_card', [
            'id' => $this->primaryKey(),
            'patient_id' => $this->integer()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('medical_card');
    }
}
