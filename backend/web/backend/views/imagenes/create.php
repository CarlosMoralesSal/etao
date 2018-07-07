<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Imagenes */

$this->title = Yii::t('app', 'Create Imagenes');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Imagenes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="imagenes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
