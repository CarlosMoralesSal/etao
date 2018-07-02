<?php

use yii\db\Migration;

/**
 * Class m180628_215158_create_table_evaluado
 */
class m180628_215158_create_table_evaluado extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableName='evaluado';
        $tableSchema = Yii::$app->db->schema->getTableSchema($tableName);
        if (($tableSchema)===null) {
           $this->createTable('evaluado', ['id'=>$this->primaryKey(),
                   'evaluador_id'=>$this->integer(11)->notNull(),
                   'nombre'=>$this->String(255),
                   'apellidos'=>$this->String(255),
                   'identificador'=>$this->String(255),
                   'notas'=>$this->String(255)
            ]);
           
           $this->addForeignKey('fk_evaluado_evaluador','evaluado','evaluador_id','evaluador','id','CASCADE');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_evaluado_evaluador', 'evaluado');
        $this->dropTable('evaluado');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180628_214238_create_table_evaluado cannot be reverted.\n";

        return false;
    }
    */
}
