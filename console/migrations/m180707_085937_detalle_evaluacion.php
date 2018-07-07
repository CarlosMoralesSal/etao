<?php

use yii\db\Migration;

/**
 * Class m180707_085937_detalle_evaluacion
 */
class m180707_085937_detalle_evaluacion extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableName='detalle_evaluacion';
        $tableSchema = Yii::$app->db->schema->getTableSchema($tableName);
        if (($tableSchema)===null) {
           $this->createTable('detalle_evaluacion', ['id'=>$this->primaryKey(),
                   'test_evaluado_id'=>$this->integer(11)->notNull(),
                   'evaluacion_id'=>$this->integer(11)->notNull(),                 
            ]);
           
           
        }
        $this->addForeignKey('fk_evaluado_detalle','detalle_evaluacion','test_evaluado_id','test_evaluados','id','CASCADE');
        $this->addForeignKey('fk_evaluacion_detalle','detalle_evaluacion','evaluacion_id','evaluacion','id','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_evaluado_detalle', 'detalle_evaluacion');
        $this->dropForeignKey('fk_evaluacion_detalle', 'detalle_evaluacion');
        $this->dropTable('detalle_evaluacion');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180707_085937_detalle_evaluacion cannot be reverted.\n";

        return false;
    }
    */
}
