<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Categoria */

$this->title = Yii::t('app', 'Update Categoria: ' . $model->id_categoria, [
    'nameAttribute' => '' . $model->id_categoria,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categorias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_categoria, 'url' => ['view', 'id' => $model->id_categoria]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="categoria-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
