<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ImagenesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-imagenes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'evaluador_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\Evaluador::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Evaluador')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'filename')->textInput(['maxlength' => true, 'placeholder' => 'Filename']) ?>

    <?= $form->field($model, 'bin')->textInput(['placeholder' => 'Bin']) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true, 'placeholder' => 'Descripcion']) ?>

    <?php /* echo $form->field($model, 'publica')->textInput(['placeholder' => 'Publica']) */ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
