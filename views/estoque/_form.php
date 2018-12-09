<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Estoque */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estoque-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_produto')->textInput() ?>

    <?= $form->field($model, 'quantidade')->textInput() ?>

    <?= $form->field($model, 'tipo')->dropDownList([ 'saida' => 'Saida', 'entrada' => 'Entrada', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'data_hora_operacao')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
