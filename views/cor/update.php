<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cor */

$this->title = Yii::t('app', 'Update Cor: ' . $model->id_cor, [
    'nameAttribute' => '' . $model->id_cor,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_cor, 'url' => ['view', 'id' => $model->id_cor]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
