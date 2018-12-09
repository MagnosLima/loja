<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Estoque */

$this->title = $model->id_estoque;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Estoques'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estoque-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_estoque], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_estoque], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_estoque',
            'id_produto',
            'quantidade',
            'tipo',
            'data_hora_operacao',
        ],
    ]) ?>

</div>
