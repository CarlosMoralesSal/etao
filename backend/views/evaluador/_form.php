<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Evaluador */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Evaluado', 
        'relID' => 'evaluado', 
        'value' => \yii\helpers\Json::encode($model->evaluados),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Imagenes', 
        'relID' => 'imagenes', 
        'value' => \yii\helpers\Json::encode($model->imagenes),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'TestEvaluados', 
        'relID' => 'test-evaluados', 
        'value' => \yii\helpers\Json::encode($model->testEvaluados),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="evaluador-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true, 'placeholder' => 'Nombre']) ?>

    <?= $form->field($model, 'apellidos')->textInput(['maxlength' => true, 'placeholder' => 'Apellidos']) ?>

    <?= $form->field($model, 'pais')->textInput(['maxlength' => true, 'placeholder' => 'Pais']) ?>

    <?= $form->field($model, 'profesion')->textInput(['maxlength' => true, 'placeholder' => 'Profesion']) ?>

    <?= $form->field($model, 'lugar_de_trabajo')->textInput(['maxlength' => true, 'placeholder' => 'Lugar De Trabajo']) ?>

    <?= $form->field($model, 'cargo')->textInput(['maxlength' => true, 'placeholder' => 'Cargo']) ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true, 'placeholder' => 'Telefono']) ?>

    <?= $form->field($model, 'user_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\User::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose User')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'Evaluado')),
            'content' => $this->render('_formEvaluado', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->evaluados),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'Imagenes')),
            'content' => $this->render('_formImagenes', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->imagenes),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'TestEvaluados')),
            'content' => $this->render('_formTestEvaluados', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->testEvaluados),
            ]),
        ],
    ];
    echo kartik\tabs\TabsX::widget([
        'items' => $forms,
        'position' => kartik\tabs\TabsX::POS_ABOVE,
        'encodeLabels' => false,
        'pluginOptions' => [
            'bordered' => true,
            'sideways' => true,
            'enableCache' => false,
        ],
    ]);
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


