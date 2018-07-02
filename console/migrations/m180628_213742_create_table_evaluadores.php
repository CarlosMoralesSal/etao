<?php

use yii\db\Migration;

/**
 * Class m180628_211639_create_table_evaluadores
 */
class m180628_213742_create_table_evaluadores extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableName='evaluador';
        $tableSchema = Yii::$app->db->schema->getTableSchema($tableName);
        if (($tableSchema)===null) {
           $this->createTable('evaluador', ['id'=>$this->primaryKey(),
                   'nombre'=>$this->String(255),
                   'apellidos'=>$this->String(255),
                   'pais'=>$this->String(255),
                   'profesion'=>$this->String(255),
                   'lugar_de_trabajo'=>$this->String(255),
                   'cargo'=>$this->String(255),
                   'telefono'=>$this->String(255),
                   'user_id'=>$this->integer(11)->notNull()]);
           
           $this->addForeignKey('fk_evaluador_user','evaluador','user_id','user','id','CASCADE');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_evaluador_user', 'evaluador');
        $this->dropTable('evaluador');
        
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180628_211639_create_table_evaluadores cannot be reverted.\n";

        return false;
    }
    */
}
