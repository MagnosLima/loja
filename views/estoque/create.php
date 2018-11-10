<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Estoque */

$this->title = Yii::t('app', 'Create Estoque');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Estoques'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estoque-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
