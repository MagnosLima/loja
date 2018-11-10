<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EstoqueSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estoque-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_estoque') ?>

    <?= $form->field($model, 'id_produto') ?>

    <?= $form->field($model, 'quantidade') ?>

    <?= $form->field($model, 'tipo') ?>

    <?= $form->field($model, 'quantidade_total') ?>

    <?php // echo $form->field($model, 'data_hora_operacao') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
