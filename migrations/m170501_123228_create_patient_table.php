<?php

use yii\db\Migration;

/**
 * Handles the creation of table `patient`.
 */
class m170501_123228_create_patient_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('patient', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string(40)->notNull(),
            'last_name' => $this->string(40)->notNull(),
            'patronymic' => $this->string(40),
            'birthday' => $this->date()->notNull(),
            'phone' => $this->string(30)->defaultValue(null),
            'email' => $this->string(),
            'study' => $this->integer()->defaultValue(null),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('patient');
    }
}
