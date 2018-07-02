<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Evaluador */

$this->title = Yii::t('app', 'Create Evaluador');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Evaluadors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evaluador-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
