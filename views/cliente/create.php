<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Cliente */

$this->title = Yii::t('app', 'Create Cliente');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Clientes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- <div class="cliente-create"> -->
<div class="container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'user' => $user,
        'cliente' => $cliente,
        'telefone' => $telefone,
        'endereco' => $endereco,
    ]) ?>

</div>
