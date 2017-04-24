<?php

use yii\db\Migration;

/**
 * Handles the creation of table `district`.
 */
class m170424_075904_create_district_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('district', [
            'id' => $this->primaryKey(),
//            'clinic_id' => $this->addForeignKey('district_to_clinic', 'district', 'clinic_id', 'clinic', 'id'),
            'street' => $this->string(50),
            'building' => $this->string(5)
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('district');
    }
}
