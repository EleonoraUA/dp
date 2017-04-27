<?php

use yii\db\Migration;

/**
 * Handles the creation of table `positions`.
 */
class m170427_173714_create_positions_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('positions', [
            'id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull()
        ]);

        $this->addPrimaryKey('pos_name', 'positions', ['id', 'name']);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('positions');
    }
}
