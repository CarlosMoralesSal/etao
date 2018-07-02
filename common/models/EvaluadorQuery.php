<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Evaluador]].
 *
 * @see Evaluador
 */
class EvaluadorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Evaluador[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Evaluador|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
