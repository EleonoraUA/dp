<?php

use yii\db\Migration;

/**
 * Handles the creation of table `doctor_to_distric`.
 */
class m170513_204341_create_doctor_to_distric_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('doctor_to_district', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'district_id' => $this->integer()
        ]);

        $this->addForeignKey('user_to_district', 'doctor_to_district', 'user_id', 'profile', 'user_id');
        $this->addForeignKey('district_to_district', 'doctor_to_district', 'district_id', 'district', 'id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('doctor_to_district');
    }
}
