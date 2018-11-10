<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Estoque */

$this->title = Yii::t('app', 'Update Estoque: ' . $model->id_estoque, [
    'nameAttribute' => '' . $model->id_estoque,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Estoques'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_estoque, 'url' => ['view', 'id' => $model->id_estoque]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="estoque-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
