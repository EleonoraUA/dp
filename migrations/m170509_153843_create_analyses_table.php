<?php

use yii\db\Migration;

/**
 * Handles the creation of table `analyses`.
 */
class m170509_153843_create_analyses_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('analyses', [
            'id' => $this->primaryKey(),
            'name' => $this->string()
        ]);

        $this->createTable('analyses_result', [
            'id' => $this->primaryKey(),
            'analyses_id' => $this->integer(),
            'result' => $this->string()
        ]);

        $this->addForeignKey('analyses_result_to_analyses', 'analyses_result', 'analyses_id', 'analyses', 'id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('analyses');
    }
}
