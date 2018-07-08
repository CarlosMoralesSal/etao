<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EvaluadorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-evaluador-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true, 'placeholder' => 'Nombre']) ?>

    <?= $form->field($model, 'apellidos')->textInput(['maxlength' => true, 'placeholder' => 'Apellidos']) ?>

    <?= $form->field($model, 'pais')->textInput(['maxlength' => true, 'placeholder' => 'Pais']) ?>

    <?= $form->field($model, 'profesion')->textInput(['maxlength' => true, 'placeholder' => 'Profesion']) ?>

    <?php /* echo $form->field($model, 'lugar_de_trabajo')->textInput(['maxlength' => true, 'placeholder' => 'Lugar De Trabajo']) */ ?>

    <?php /* echo $form->field($model, 'cargo')->textInput(['maxlength' => true, 'placeholder' => 'Cargo']) */ ?>

    <?php /* echo $form->field($model, 'telefono')->textInput(['maxlength' => true, 'placeholder' => 'Telefono']) */ ?>

    <?php /* echo $form->field($model, 'user_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\User::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose User')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); */ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
