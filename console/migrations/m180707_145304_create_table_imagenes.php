<?php

use yii\db\Migration;

/**
 * Class m180707_145304_create_table_imagenes
 */
class m180707_145304_create_table_imagenes extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableName='imagenes';
        $tableSchema = Yii::$app->db->schema->getTableSchema($tableName);
        if (($tableSchema)===null) {
           $this->createTable('imagenes', ['id'=>$this->primaryKey(),
                   'evaluador_id'=>$this->integer(11)->notNull(),
                   'filename'=>$this->string(255),
                   'bin'=>$this->binary(4294967295),
                   'descripcion'=>$this->string(255),
                   'publica'=>$this->integer(6)->notNull(),
            ]);
           
           
        }
        $this->addForeignKey('fk_evaluado_imagenes','imagenes','evaluador_id','evaluador','id','CASCADE');
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_evaluado_imagenes', 'imagenes');
        $this->dropTable('imagenes');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180707_145304_create_table_imagenes cannot be reverted.\n";

        return false;
    }
    */
}
