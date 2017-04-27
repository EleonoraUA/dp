<?php

use yii\db\Migration;

/**
 * Handles the creation of table `patient_group`.
 */
class m170426_155723_create_patient_group_table extends Migration
{
    protected $tableName = 'patient_group';

    /**
     * @inheritdoc
     */
    public function up()
    {
//        $this->createTable($this->tableName, [
//            'id' => $this->primaryKey(),
//            'name' => $this->string(30)
//        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('patient_group');
    }
}
