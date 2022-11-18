<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2018-11-04 14:43:13 
 * @Last Modified by:   Dicky Ermawan S., S.T., MTA 
 * @Last Modified time: 2018-11-04 14:43:13 
 */


use yii\db\Migration;

/**
 * Class m181104_073600_create_pengguna
 */
class m181104_073600_create_pengguna extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('pengguna', [
            'id' => $this->primaryKey(),
            'username' => $this->string(100)->notNull()->unique(),
            'password' => $this->string(100)->notNull(),
            'nama' => $this->string(100)->notNull(),
            'no_hp' => $this->string(15)->notNull(),
            'akses' => $this->string(15)->notNull(),
            'authKey' => $this->string()->notNull(),
            'create_at' => $this->dateTime()->notNull(),
            'modified_at' => $this->dateTime()->notNull(),
            'change_by' => $this->integer()->notNull(),
        ]);
        $this->insert('pengguna',[
            'username' => 'admin',
            'password' => '$2y$13$7VJ3dYTeONBQ3TkoSUDVCuNeyhrRo/96mFatw0KbMoR/heEPI.UMO',
            'nama' => 'Dicky Admin Super',
            'no_hp' => '085358830',
            'akses' => 'admin',
            'authKey' => '8m3Aj9GndfMbhG1fbqYuetms4ZKZfqVI',
            'create_at' => '2018-10-28 19:58:23',
            'modified_at' => '2018-10-28 19:58:23',
            'change_by' => 1,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('pengguna');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181104_073600_create_pengguna cannot be reverted.\n";

        return false;
    }
    */
}
