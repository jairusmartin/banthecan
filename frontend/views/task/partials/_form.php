<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\Ticket;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Task */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-form">

    <?php
        $form = ActiveForm::begin();

        $allTickets = Ticket::findTicketsInTaskColumns();
        $allTicketTitles = ArrayHelper::map($allTickets, 'id', 'title');
        echo $form->field($model, 'ticket_id')->dropDownList($allTicketTitles);

        echo $form->field($model, 'title')->textarea(['rows' => 1]);
        echo $form->field($model, 'description')->textarea(['rows' => 6]);

        if (!$model->isNewRecord) {
            echo $form->field($model, 'completed')->checkbox([
                '0' => Yii::t('app', 'No'),
                '1' => Yii::t('app', 'Yes'),
            ]);
        } else {
            echo Html::activeHiddenInput($model, 'completed', ['value' => 0]);
        }

        echo $this->render('@frontend/views/user/partials/_selectUser', [
                'model' => $model,
                'form' => $form,
            ]
        );

        echo $form->field($model, 'due_date')->widget(DatePicker::classname(), [
            'options' => ['class' => 'form-control'],
        ]);
    ?>

    <div class="form-group">
        <?php echo Html::submitButton(
                $model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
                ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])
        ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
