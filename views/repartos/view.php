<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model app\models\Reparto */
$this->title = $model->ficha_id;
$this->params['breadcrumbs'][] = ['label' => 'Repartos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reparto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'ficha_id' => $model->ficha_id, 'persona_id' => $model->persona_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ficha_id' => $model->ficha_id, 'persona_id' => $model->persona_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ficha_id',
            'persona_id',
        ],
    ]) ?>

</div>
