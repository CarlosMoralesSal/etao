<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Imagenes */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Imagenes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="imagenes-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Imagenes').' '. Html::encode($this->title) ?></h2>
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
        [
            'attribute' => 'evaluador.id',
            'label' => Yii::t('app', 'Evaluador'),
        ],
        'filename',
        'bin',
        'descripcion',
        'publica',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    <div class="row">
        <h4>Evaluador<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnEvaluador = [
        ['attribute' => 'id', 'visible' => false],
        'nombre',
        'apellidos',
        'pais',
        'profesion',
        'lugar_de_trabajo',
        'cargo',
        'telefono',
        'user_id',
    ];
    echo DetailView::widget([
        'model' => $model->evaluador,
        'attributes' => $gridColumnEvaluador    ]);
    ?>
</div>
