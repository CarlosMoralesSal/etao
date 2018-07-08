<?php

namespace common\models;

use Yii;
use \common\models\base\Evaluado as BaseEvaluado;

/**
 * This is the model class for table "evaluado".
 */
class Evaluado extends BaseEvaluado
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['evaluador_id'], 'required'],
            [['evaluador_id'], 'integer'],
            [['nombre', 'apellidos', 'identificador', 'notas'], 'string', 'max' => 255],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
