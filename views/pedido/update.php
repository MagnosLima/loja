<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pedido */

$this->title = Yii::t('app', 'Update Pedido: ' . $model->id_pedido, [
    'nameAttribute' => '' . $model->id_pedido,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pedidos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pedido, 'url' => ['view', 'id' => $model->id_pedido]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="pedido-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
