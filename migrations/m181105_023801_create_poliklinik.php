<?php

use yii\db\Migration;

/**
 * Class m181105_023801_create_poliklinik
 */
class m181105_023801_create_poliklinik extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('poliklinik',[
            'id' => $this->primaryKey(),
            'nama' => $this->string()->notNull()
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('poliklinik');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181105_023801_create_poliklinik cannot be reverted.\n";

        return false;
    }
    */
}
