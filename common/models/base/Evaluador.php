<?php

namespace common\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "evaluador".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $apellidos
 * @property string $pais
 * @property string $profesion
 * @property string $lugar_de_trabajo
 * @property string $cargo
 * @property string $telefono
 * @property integer $user_id
 *
 * @property \common\models\Evaluado[] $evaluados
 * @property \common\models\User $user
 */
class Evaluador extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'evaluados',
            'user'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['nombre', 'apellidos', 'pais', 'profesion', 'lugar_de_trabajo', 'cargo', 'telefono'], 'string', 'max' => 255],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'evaluador';
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
            'nombre' => Yii::t('app', 'Nombre'),
            'apellidos' => Yii::t('app', 'Apellidos'),
            'pais' => Yii::t('app', 'Pais'),
            'profesion' => Yii::t('app', 'Profesion'),
            'lugar_de_trabajo' => Yii::t('app', 'Lugar De Trabajo'),
            'cargo' => Yii::t('app', 'Cargo'),
            'telefono' => Yii::t('app', 'Telefono'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluados()
    {
        return $this->hasMany(\common\models\Evaluado::className(), ['evaluador_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'user_id']);
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
     * @return \common\models\EvaluadorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\EvaluadorQuery(get_called_class());
    }
}
