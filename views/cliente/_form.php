<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */
/* @var $form yii\widgets\ActiveForm */
?>

<!-- <div class="cliente-form"> -->
<div class="container">

    <?php $form = ActiveForm::begin(); ?>

    <!-- Campos de user -->

    <?= $form->field($user, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($user, 'password')->passwordInput(['maxlength' => true]) ?>

    <!-- Campos de cliente -->

    <?= $form->field($cliente, 'cpf_cliente')->textInput() ?>

    <?= $form->field($cliente, 'nome_completo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($cliente, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($telefone, 'numero_principal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($telefone, 'numero_alt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($endereco, 'logradouro')->textInput(['maxlength' => true]) ?>

    <?= $form->field($endereco, 'numero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($endereco, 'bairro')->textInput(['maxlength' => true]) ?>

    <?= $form->field($endereco, 'cep')->textInput(['maxlength' => true]) ?>

    <?= $form->field($endereco, 'municipio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($endereco, 'estado')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
