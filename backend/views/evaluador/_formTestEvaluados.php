<div class="form-group" id="add-test-evaluados">
<?php
use kartik\grid\GridView;
use kartik\builder\TabularForm;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\widgets\Pjax;

$dataProvider = new ArrayDataProvider([
    'allModels' => $row,
    'pagination' => [
        'pageSize' => -1
    ]
]);
echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'TestEvaluados',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions' => ['hidden'=>true]],
        'idtest_base' => [
            'label' => 'Test base',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\common\models\TestBase::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Test base')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'nombre_configuracion' => ['type' => TabularForm::INPUT_TEXT],
        'dispositivo_ent' => ['type' => TabularForm::INPUT_TEXT],
        'num_ensayos' => ['type' => TabularForm::INPUT_TEXT],
        'tiempo_maximo_de_ensayo' => ['type' => TabularForm::INPUT_TEXT],
        'notas' => ['type' => TabularForm::INPUT_TEXTAREA],
        'color_fondo_rojo' => ['type' => TabularForm::INPUT_TEXT],
        'color_fondo_verde' => ['type' => TabularForm::INPUT_TEXT],
        'color_fondo_azul' => ['type' => TabularForm::INPUT_TEXT],
        'tipo_ensayo_correcto' => ['type' => TabularForm::INPUT_TEXT],
        'tipo_ensayo_incorrecto' => ['type' => TabularForm::INPUT_TEXT],
        'tiempo_mensaje_correcto' => ['type' => TabularForm::INPUT_TEXT],
        'tiempo_mensaje_incorrecto' => ['type' => TabularForm::INPUT_TEXT],
        'fuente_mensaje_correcto' => ['type' => TabularForm::INPUT_TEXT],
        'fuente_mensaje_incorrecto' => ['type' => TabularForm::INPUT_TEXT],
        'estilo_mensaje_correcto' => ['type' => TabularForm::INPUT_TEXT],
        'estilo_mensaje_incorrecto' => ['type' => TabularForm::INPUT_TEXT],
        'alineacion_mensaje_correcto' => ['type' => TabularForm::INPUT_TEXT],
        'alineacion_mensaje_incorrecto' => ['type' => TabularForm::INPUT_TEXT],
        'alineacion_texto_mensaje_correcto' => ['type' => TabularForm::INPUT_TEXT],
        'alineacion_texto_mensaje_incorrecto' => ['type' => TabularForm::INPUT_TEXT],
        'color_mensaje_correcto_rojo' => ['type' => TabularForm::INPUT_TEXT],
        'color_mensaje_correcto_verde' => ['type' => TabularForm::INPUT_TEXT],
        'color_mensaje_correcto_azul' => ['type' => TabularForm::INPUT_TEXT],
        'color_mensaje_incorrecto_rojo' => ['type' => TabularForm::INPUT_TEXT],
        'color_mensaje_incorrecto_verde' => ['type' => TabularForm::INPUT_TEXT],
        'color_mensaje_incorrecto_azul' => ['type' => TabularForm::INPUT_TEXT],
        'color_texto_mensaje_correcto_rojo' => ['type' => TabularForm::INPUT_TEXT],
        'color_texto_mensaje_correcto_verde' => ['type' => TabularForm::INPUT_TEXT],
        'color_texto_mensaje_correcto_azul' => ['type' => TabularForm::INPUT_TEXT],
        'color_texto_mensaje_incorrecto_rojo' => ['type' => TabularForm::INPUT_TEXT],
        'color_texto_mensaje_incorrecto_verde' => ['type' => TabularForm::INPUT_TEXT],
        'color_texto_mensaje_incorrecto_azul' => ['type' => TabularForm::INPUT_TEXT],
        'sonido_mensaje_correcto' => ['type' => TabularForm::INPUT_TEXT],
        'sonido_mensaje_incorrecto' => ['type' => TabularForm::INPUT_TEXT],
        'barra_progreso' => ['type' => TabularForm::INPUT_TEXT],
        'tam_texto_mensaje_correcto' => ['type' => TabularForm::INPUT_TEXT],
        'tam_texto_mensaje_incorrecto' => ['type' => TabularForm::INPUT_TEXT],
        'tam_mensaje_correcto' => ['type' => TabularForm::INPUT_TEXT],
        'tam_mensaje_incorrecto' => ['type' => TabularForm::INPUT_TEXT],
        'texto_mensaje_incorrecto' => ['type' => TabularForm::INPUT_TEXT],
        'texto_mensaje_correcto' => ['type' => TabularForm::INPUT_TEXT],
        'tiempo_pausa' => ['type' => TabularForm::INPUT_TEXT],
        'publica' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  Yii::t('app', 'Delete'), 'onClick' => 'delRowTestEvaluados(' . $key . '); return false;', 'id' => 'test-evaluados-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('app', 'Add Test Evaluados'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowTestEvaluados()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>
