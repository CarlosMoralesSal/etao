<?php

use yii\db\Migration;

/**
 * Class m180702_164630_create_new_table_test_base
 */
class m180702_164630_create_new_table_test_base extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableName='test_base';
        $tableSchema = Yii::$app->db->schema->getTableSchema($tableName);
        if (($tableSchema)===null) {
           $this->createTable('test_base', ['id'=>$this->primaryKey(),
                   'nombre'=>$this->String(255),
                   'nombrexml'=>$this->String(255),                 
            ]);
           
           
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('test_base');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180702_164630_create_new_table_test_base cannot be reverted.\n";

        return false;
    }
    */
}
