<?php

use yii\db\Migration;

/**
 * Class m181105_020354_create_kunjungan
 */
class m181105_020354_create_kunjungan extends Migration
{
    
    
    public function safeUp()
    {
        $this->createTable('kunjungan', [
            'id' => $this->primaryKey(),
            'id_poliklinik' => $this->integer()->notNull(),
            'no_antrian' => $this->integer()->notNull(),
            'no_mr' => $this->integer()->notNull(),
            'nama_pasien' => $this->string(150)->notNull(),
            'jenis_pembayaran' => $this->string(50)->notNull(),
            'jenis_pasien' => $this->string(4)->notNull(),
            'faskes_rujukan' => $this->string()->notNull(),
            'create_date' => $this->dateTime()->notNull(),
            'change_by' => $this->integer()->notNull(),
            'processed' => $this->integer()->notNull(),
        ]);

    }

    
    public function safeDown()
    {
        $this->dropTable('kunjungan');
    }

}
