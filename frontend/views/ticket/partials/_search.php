<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TicketSearch */
?>

<div class="ticket-search">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        ]);
    ?>

    <?php echo $form->field($model, 'id') ?>
    <?php echo $form->field($model, 'created_at') ?>
    <?php echo $form->field($model, 'updated_at') ?>
    <?php echo $form->field($model, 'created_by') ?>
    <?php echo $form->field($model, 'title') ?>
    <?php echo $form->field($model, 'description') ?>
    <?php echo $form->field($model, 'column_id') ?>

    <div class="form-group">
        <?= Html::submitButton(\Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(\Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
