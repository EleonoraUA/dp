<?php

use yii\db\Migration;

/**
 * Handles the creation of table `study_place`.
 */
class m170427_180228_create_study_place_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('study_place', [
            'id' => $this->primaryKey(),
            'number' => $this->integer(),
            'name' => $this->string(50)->notNull(),
            'course' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('study_place');
    }
}
