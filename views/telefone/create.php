<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Telefone */

$this->title = Yii::t('app', 'Create Telefone');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Telefones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="telefone-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
