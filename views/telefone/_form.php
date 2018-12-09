<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Telefone */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="telefone-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'numero_principal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numero_alt')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
