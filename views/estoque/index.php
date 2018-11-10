<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EstoqueSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Estoques');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estoque-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Estoque'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_estoque',
            'id_produto',
            'quantidade',
            'tipo',
            'quantidade_total',
            //'data_hora_operacao',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
