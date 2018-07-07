<?php

namespace common\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "imagenes".
 *
 * @property integer $id
 * @property integer $evaluador_id
 * @property string $filename
 * @property resource $bin
 * @property string $descripcion
 * @property integer $publica
 *
 * @property \common\models\Evaluador $evaluador
 */
class Imagenes extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'evaluador'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['evaluador_id', 'publica'], 'required'],
            [['evaluador_id', 'publica'], 'integer'],
            [['bin'], 'string'],
            [['filename', 'descripcion'], 'string', 'max' => 255],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'imagenes';
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
            'filename' => Yii::t('app', 'Filename'),
            'bin' => Yii::t('app', 'Bin'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'publica' => Yii::t('app', 'Publica'),
        ];
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
     * @return \common\models\ImagenesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\ImagenesQuery(get_called_class());
    }
}
