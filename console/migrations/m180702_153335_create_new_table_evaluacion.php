<?php

use yii\db\Migration;

/**
 * Class m180702_153335_create_new_table_evaluacion
 */
class m180702_153335_create_new_table_evaluacion extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableName='evaluacion';
        $tableSchema = Yii::$app->db->schema->getTableSchema($tableName);
        if (($tableSchema)===null) {
           $this->createTable('evaluacion', ['id'=>$this->primaryKey(),
                   'evaluado_id'=>$this->integer(11)->notNull(),
                   'notas'=>$this->text(),
                   'fecha_evaluacion'=>$this->date(),
                   'publica'=>$this->smallInteger()->notNull(),
                   
            ]);
           
           $this->addForeignKey('fk_evaluacion_evaluado','evaluacion','evaluado_id','evaluado','id','CASCADE');
        }

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_evaluacion_evaluado', 'evaluacion');
        $this->dropTable('evaluacion');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180702_153335_create_new_table_evaluacion cannot be reverted.\n";

        return false;
    }
    */
}
