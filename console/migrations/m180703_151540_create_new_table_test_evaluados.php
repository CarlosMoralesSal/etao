<?php

use yii\db\Migration;

/**
 * Class m180703_151540_create_new_table_test_evaluados
 */
class m180703_151540_create_new_table_test_evaluados extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableName='test_evaluados';
        $tableSchema = Yii::$app->db->schema->getTableSchema($tableName);
        if (($tableSchema)===null) {
           $this->createTable('test_evaluados', ['id'=>$this->primaryKey(),
                   'idtest_base'=>$this->integer(11)->notNull(),
                   'idevaluador'=>$this->integer(11)->notNull(),
                   'nombre_configuracion'=>$this->String(255),
                   'dispositivo_ent'=>$this->String(255),
                   'num_ensayos'=>$this->integer(11),
                   'tiempo_maximo_de_ensayo'=>$this->integer(11),
                   'notas'=>$this->text(),
                   'color_fondo_rojo'=>$this->integer(11),
                   'color_fondo_verde'=>$this->integer(11),
                   'color_fondo_azul'=>$this->integer(11),
                   'tipo_ensayo_correcto'=>$this->smallInteger(6),
                   'tipo_ensayo_incorrecto'=>$this->smallInteger(6),
                   'tiempo_mensaje_correcto'=>$this->smallInteger(6),
                   'tiempo_mensaje_incorrecto'=>$this->smallInteger(6),
                   'fuente_mensaje_correcto'=>$this->smallInteger(6),
                   'fuente_mensaje_incorrecto'=>$this->smallInteger(6),
                   'estilo_mensaje_correcto'=>$this->smallInteger(6),
                   'estilo_mensaje_incorrecto'=>$this->smallInteger(6),
                   'alineacion_mensaje_correcto'=>$this->smallInteger(6),
                   'alineacion_mensaje_incorrecto'=>$this->smallInteger(6),
                   'alineacion_texto_mensaje_correcto'=>$this->smallInteger(6),
                   'alineacion_texto_mensaje_incorrecto'=>$this->smallInteger(6),
                   'color_mensaje_correcto_rojo'=>$this->integer(11),
                   'color_mensaje_correcto_verde'=>$this->integer(11),
                   'color_mensaje_correcto_azul'=>$this->integer(11),
                   'color_mensaje_incorrecto_rojo'=>$this->integer(11),
                   'color_mensaje_incorrecto_verde'=>$this->integer(11),
                   'color_mensaje_incorrecto_azul'=>$this->integer(11),
                   'color_texto_mensaje_correcto_rojo'=>$this->integer(11),
                   'color_texto_mensaje_correcto_verde'=>$this->integer(11),
                   'color_texto_mensaje_correcto_azul'=>$this->integer(11),
                   'color_texto_mensaje_incorrecto_rojo'=>$this->integer(11),
                   'color_texto_mensaje_incorrecto_verde'=>$this->integer(11),
                   'color_texto_mensaje_incorrecto_azul'=>$this->integer(11),
                   'sonido_mensaje_correcto'=>$this->smallInteger(6),
                   'sonido_mensaje_incorrecto'=>$this->smallInteger(6),
                   'barra_progreso'=>$this->smallInteger(6),
                   'tam_texto_mensaje_correcto'=>$this->smallInteger(6),
                   'tam_texto_mensaje_incorrecto'=>$this->smallInteger(6),
                   'tam_mensaje_correcto'=>$this->smallInteger(6),
                   'tam_mensaje_incorrecto'=>$this->smallInteger(6),
                   'texto_mensaje_incorrecto'=>$this->String(255),
                   'texto_mensaje_correcto'=>$this->String(255),
                   'tiempo_pausa'=>$this->smallInteger(6),               
                   'publica'=>$this->smallInteger(6)]);
           
           
           $this->addForeignKey('fk_base_test','test_evaluados','idtest_base','test_base','id','CASCADE');
           $this->addForeignKey('fk_evaluador_test','test_evaluados','idevaluador','evaluador','id','CASCADE');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_base_test', 'test_evaluados');
        $this->dropForeignKey('fk_evaluador_test', 'test_evaluados');
        $this->dropTable('test_evaluados');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180703_151540_create_new_table_test_evaluados cannot be reverted.\n";

        return false;
    }
    */
}
