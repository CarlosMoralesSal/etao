<?php

namespace common\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "evaluado".
 *
 * @property integer $id
 * @property integer $evaluador_id
 * @property string $nombre
 * @property string $apellidos
 * @property string $identificador
 * @property string $notas
 *
 * @property \common\models\Evaluacion[] $evaluacions
 * @property \common\models\Evaluador $evaluador
 */
class Evaluado extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'evaluacions',
            'evaluador'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['evaluador_id'], 'required'],
            [['evaluador_id'], 'integer'],
            [['nombre', 'apellidos', 'identificador', 'notas'], 'string', 'max' => 255],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'evaluado';
    }

    /**
     *
     * @return string
     * overwrite function optimisticLock
     * return string name of field are used to stored optimistic lock
     *
     */
    public function optimisticLock() {
        return 'lock';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'evaluador_id' => Yii::t('app', 'Evaluador ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'apellidos' => Yii::t('app', 'Apellidos'),
            'identificador' => Yii::t('app', 'Identificador'),
            'notas' => Yii::t('app', 'Notas'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluacions()
    {
        return $this->hasMany(\common\models\Evaluacion::className(), ['evaluado_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluador()
    {
        return $this->hasOne(\common\models\Evaluador::className(), ['id' => 'evaluador_id']);
    }
    
    /**
     * @inheritdoc
     * @return array mixed
     */
    public function behaviors()
    {
        return [
            'uuid' => [
                'class' => UUIDBehavior::className(),
                'column' => 'id',
            ],
        ];
    }


    /**
     * @inheritdoc
     * @return \common\models\EvaluadoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\EvaluadoQuery(get_called_class());
    }
}
