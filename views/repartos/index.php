<?php
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RepartoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Repartos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reparto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Reparto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'ficha.titulo',
            'persona.nombre',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
