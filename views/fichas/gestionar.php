<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\FichasForm */
/* @var $form ActiveForm */
?>
<div class="fichas-gestionar">

    <?php $form = ActiveForm::begin([
            'method' => 'get',
            'action' => ['fichas/gestionar'],
        ]); ?>

        <?= $form->field($model, 'ficha_id')->dropDownList($fichas) ?>
        <?php if (!empty($reparto)) {
            ?>
            <?= $form->field($model, 'persona_id')->dropDownList($personas) ?>
        <?php
        } ?>
        <?php if (!empty($personas)) {
            ?>
            <?= $form->field($model, 'persona_id')->dropDownList($personas) ?>
        <?php
        } ?>
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- fichas-gestionar -->
