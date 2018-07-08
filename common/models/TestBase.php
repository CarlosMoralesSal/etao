<?php

namespace common\models;

use Yii;
use \common\models\base\TestBase as BaseTestBase;

/**
 * This is the model class for table "test_base".
 */
class TestBase extends BaseTestBase
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['nombre', 'nombrexml'], 'string', 'max' => 255],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
