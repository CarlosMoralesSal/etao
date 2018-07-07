<?php

namespace common\models;

use Yii;
use \common\models\base\Imagenes as BaseImagenes;

/**
 * This is the model class for table "imagenes".
 */
class Imagenes extends BaseImagenes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['evaluador_id', 'publica'], 'required'],
            [['evaluador_id', 'publica'], 'integer'],
            [['bin'], 'string'],
            [['filename', 'descripcion'], 'string', 'max' => 255],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
