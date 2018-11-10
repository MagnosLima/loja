<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tamanho */

$this->title = Yii::t('app', 'Update Tamanho: ' . $model->id_tamanho, [
    'nameAttribute' => '' . $model->id_tamanho,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tamanhos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tamanho, 'url' => ['view', 'id' => $model->id_tamanho]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tamanho-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
