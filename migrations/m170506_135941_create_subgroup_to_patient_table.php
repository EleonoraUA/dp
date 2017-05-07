<?php

use yii\db\Migration;

/**
 * Handles the creation of table `subgroup_to_patient`.
 */
class m170506_135941_create_subgroup_to_patient_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('subgroup_to_patient', [
            'id' => $this->primaryKey(),
            'subgroup_id' => $this->integer(),
            'patient_id' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('subgroup_to_patient');
    }
}
