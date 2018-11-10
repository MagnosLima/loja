<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tamanho */

$this->title = Yii::t('app', 'Create Tamanho');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tamanhos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tamanho-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
