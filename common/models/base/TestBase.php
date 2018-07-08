<?php

namespace common\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "test_base".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $nombrexml
 *
 * @property \common\models\TestEvaluados[] $testEvaluados
 */
class TestBase extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'testEvaluados'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'nombrexml'], 'string', 'max' => 255],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'test_base';
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
            'nombrexml' => Yii::t('app', 'Nombrexml'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTestEvaluados()
    {
        return $this->hasMany(\common\models\TestEvaluados::className(), ['idtest_base' => 'id']);
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
     * @return \common\models\TestBaseQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\TestBaseQuery(get_called_class());
    }
}
