<?php

use yii\db\Migration;

/**
 * Handles the creation of table `doc_to_patient`.
 */
class m170505_163306_create_doc_to_patient_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('doc_to_patient', [
            'id' => $this->primaryKey(),
            'doc_id' => $this->integer(),
            'patient_id' => $this->integer()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('doc_to_patient');
    }
}
