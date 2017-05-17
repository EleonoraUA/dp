<?php

use yii\db\Migration;

/**
 * Handles the creation of table `vaccination`.
 */
class m170516_165824_create_vaccination_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('vaccination', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);

        $this->createTable('vaccination_age', [
            'id' => $this->primaryKey(),
            'age' => $this->integer()
        ]);

        $this->createTable('vaccination_to_age', [
            'id' => $this->primaryKey(),
            'age_id' => $this->integer(),
            'vaccination_id' => $this->integer(),
        ]);

        $this->addForeignKey('vaccination_age_to_age', 'vaccination_to_age', 'age_id', 'vaccination_age', 'id');
        $this->addForeignKey('vaccination_to_age', 'vaccination_to_age', 'vaccination_id', 'vaccination', 'id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('vaccination');
    }
}
