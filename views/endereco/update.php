<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Endereco */

$this->title = Yii::t('app', 'Update Endereco: ' . $model->id_user, [
    'nameAttribute' => '' . $model->id_user,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Enderecos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_user, 'url' => ['view', 'id' => $model->id_user]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="endereco-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
