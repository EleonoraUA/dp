<?php

use yii\db\Migration;

/**
 * Handles the creation of table `patient_sub_group`.
 */
class m170426_155730_create_patient_sub_group_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('patient_sub_group', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('patient_sub_group');
    }
}
