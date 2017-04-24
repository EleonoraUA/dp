<?php

use yii\db\Migration;

/**
 * Handles the creation of table `clinic`.
 */
class m170424_065132_create_clinic_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
//        $this->createTable('clinic', [
//            'id' => $this->primaryKey(),
//            'name' => $this->string(30)
//        ]);

        $this->insert('clinic', ['name' => 'Головна']);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('clinic');
    }
}
