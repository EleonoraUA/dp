<?php

use yii\db\Migration;

/**
 * Handles the creation of table `position`.
 */
class m170418_164114_create_position_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
//        $this->createTable('position', [
//            'id' => $this->primaryKey(),
//            'name' => $this->string(30)
//        ]);

        $this->insert('position', [
            'name' => 'Сімейний лікар'
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('position');
    }
}
