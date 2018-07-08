<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[TestBase]].
 *
 * @see TestBase
 */
class TestBaseQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return TestBase[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TestBase|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
