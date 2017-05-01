<?php

use yii\db\Migration;

/**
 * Handles the creation of table `visit`.
 */
class m170501_155151_create_visit_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
//        $this->createTable('visit', [
//            'id' => $this->primaryKey(),
//            'datetime' => $this->dateTime(),
//            'patient_id' => $this->integer(),
//            'doc_id' => $this->integer(),
//            'type' => $this->smallInteger(1)
//        ]);


//        $this->addForeignKey('visit_patient', 'visit', 'patient_id', 'patient', 'id');
        $this->addForeignKey('visit_doc', 'visit', 'doc_id', 'profile', 'user_id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('visit');
    }
}
