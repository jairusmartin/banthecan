<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Tags */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => \Yii::t('app', 'Tags'), 'url' => ['index']];
?>
<div class="tags-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
            echo Html::a(\Yii::t('app', 'Edit'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
            echo Html::a(\Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => \Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]);
        ?>
    </p>

    <?php
        echo DetailView::widget([
            'model' => $model,
            'attributes' => [
                [
                    'attribute' => 'name',
                    'format' => 'ntext',
                    'label' => \Yii::t('app', 'Name'),
                ],
                [
                    'attribute' => 'frequency',
                    'label' => \Yii::t('app', 'Frequency'),
                ],
            ],
        ]);
    ?>
</div>
