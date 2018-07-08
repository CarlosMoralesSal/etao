<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Evaluador */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Evaluador'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evaluador-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Evaluador').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'nombre',
        'apellidos',
        'pais',
        'profesion',
        'lugar_de_trabajo',
        'cargo',
        'telefono',
        [
            'attribute' => 'user.id',
            'label' => Yii::t('app', 'User'),
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    
    <div class="row">
<?php
if($providerEvaluado->totalCount){
    $gridColumnEvaluado = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
                        'nombre',
            'apellidos',
            'identificador',
            'notas',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerEvaluado,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-evaluado']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Evaluado')),
        ],
        'export' => false,
        'columns' => $gridColumnEvaluado
    ]);
}
?>

    </div>
    <div class="row">
        <h4>User<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnUser = [
        ['attribute' => 'id', 'visible' => false],
        'username',
        'auth_key',
        'password_hash',
        'password_reset_token',
        'email',
        'status',
        'created_at',
        'updated_at',
    ];
    echo DetailView::widget([
        'model' => $model->user,
        'attributes' => $gridColumnUser    ]);
    ?>
    
    <div class="row">
<?php
if($providerImagenes->totalCount){
    $gridColumnImagenes = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
                        'filename',
            'bin',
            'descripcion',
            'publica',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerImagenes,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-imagenes']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Imagenes')),
        ],
        'export' => false,
        'columns' => $gridColumnImagenes
    ]);
}
?>

    </div>
    
    <div class="row">
<?php
if($providerTestEvaluados->totalCount){
    $gridColumnTestEvaluados = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
            [
                'attribute' => 'testBase.id',
                'label' => Yii::t('app', 'Idtest Base')
            ],
                        'nombre_configuracion',
            'dispositivo_ent',
            'num_ensayos',
            'tiempo_maximo_de_ensayo',
            'notas:ntext',
            'color_fondo_rojo',
            'color_fondo_verde',
            'color_fondo_azul',
            'tipo_ensayo_correcto',
            'tipo_ensayo_incorrecto',
            'tiempo_mensaje_correcto',
            'tiempo_mensaje_incorrecto',
            'fuente_mensaje_correcto',
            'fuente_mensaje_incorrecto',
            'estilo_mensaje_correcto',
            'estilo_mensaje_incorrecto',
            'alineacion_mensaje_correcto',
            'alineacion_mensaje_incorrecto',
            'alineacion_texto_mensaje_correcto',
            'alineacion_texto_mensaje_incorrecto',
            'color_mensaje_correcto_rojo',
            'color_mensaje_correcto_verde',
            'color_mensaje_correcto_azul',
            'color_mensaje_incorrecto_rojo',
            'color_mensaje_incorrecto_verde',
            'color_mensaje_incorrecto_azul',
            'color_texto_mensaje_correcto_rojo',
            'color_texto_mensaje_correcto_verde',
            'color_texto_mensaje_correcto_azul',
            'color_texto_mensaje_incorrecto_rojo',
            'color_texto_mensaje_incorrecto_verde',
            'color_texto_mensaje_incorrecto_azul',
            'sonido_mensaje_correcto',
            'sonido_mensaje_incorrecto',
            'barra_progreso',
            'tam_texto_mensaje_correcto',
            'tam_texto_mensaje_incorrecto',
            'tam_mensaje_correcto',
            'tam_mensaje_incorrecto',
            'texto_mensaje_incorrecto',
            'texto_mensaje_correcto',
            'tiempo_pausa',
            'publica',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerTestEvaluados,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-test-evaluados']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Test Evaluados')),
        ],
        'export' => false,
        'columns' => $gridColumnTestEvaluados
    ]);
}
?>

    </div>
</div>
