<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ArrayDataProvider;


/* @var $this yii\web\View */
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-kanbanboard">
    <h1><?= Html::encode($boardTitle) ?></h1>
    <small><em><?= Html::encode($boardDescription) ?></em></small>

    <hr/>

    <?php
    // Create HTML Div Element for each Ticket using $columnId as an index to the column
    // Tickets are appended to one another and together comprise the contents of one table cell
    // Therefore they need to be appended to one another as they are evaluated in the loop
    // However, in the loop they can come in random order
    $gridRow = [];
    foreach ($ticketData as $ticketRecord) {

        $ticketBlockHtml = $this->render('../ticket/_ticket', ['ticket' => $ticketRecord]);

        // The .= operator complains if the array element is not defined
        // Therefore if it is NOT defined create it
        if (array_key_exists($ticketRecord['columnId'], $gridRow)) {
            $gridRow[$ticketRecord['columnId']] .= $ticketBlockHtml;
        } else {
            $gridRow[$ticketRecord['columnId']] = $ticketBlockHtml;
        }
    }

    $dataProvider = new ArrayDataProvider([
        'allModels' => [$gridRow],
        'sort' => false,
        'pagination' => false,
    ]);

    // create Column Data array compatible for consumption by GridView
    // column data and ticket data are related but are processed separately
    foreach ($columnData as $column) {
        $gridColumn[] = [
            'attribute' => $column['attribute'],
            // need to learn how to purify HTML but allow the ID,I18N formatter, purifier causes problems
            // somehow somewhere it needs to be configured
            'format' => 'raw', //When USing HTML the ID attribute is removed by the purifier, bad news for Draggable
            'label' => $column['title'],
            'contentOptions' => ['valign' => 'top'],
        ];
    }

    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => '', //removes total count at the top
        'tableOptions' => [
            'class' => 'table-striped',
        ],
        'columns' => $gridColumn,
    ]);

    ?>
</div>