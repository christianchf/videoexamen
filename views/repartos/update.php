<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\models\Reparto */
$this->title = 'Update Reparto: ' . $model->ficha_id;
$this->params['breadcrumbs'][] = ['label' => 'Repartos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ficha_id, 'url' => ['view', 'ficha_id' => $model->ficha_id, 'persona_id' => $model->persona_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="reparto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
