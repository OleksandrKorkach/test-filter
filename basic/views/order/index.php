<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Report';

?>

<h1><?= Html::encode($this->title) ?></h1>

<?php $form = ActiveForm::begin(['method' => 'get']); ?>

<div class="row">
    <div class="col-md-6">
        <?= $form->field($dateFilter, 'startDate')->input('date', ['placeholder' => 'Выберите дату начала']); ?>
    </div>

    <div class="col-md-6">
        <?= $form->field($dateFilter, 'endDate')->input('date', ['placeholder' => 'Выберите дату окончания']); ?>
    </div>
</div>

<?= Html::submitButton('Показать отчет', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>

<table class="table">
    <thead>
    <tr>
        <th>ПІБ (хто вирішив заявку)</th>
        <th>Відключення</th>
        <th>Перевірка/здешевлення</th>
        <th>Тех. питання</th>
        <th>Інше</th>
        <th>Усього</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($report as $row): ?>
        <tr>
            <td><?= Html::encode($row['agent']) ?></td>
            <td><?= Html::encode($row['disconnect']) ?></td>
            <td><?= Html::encode($row['check_discount']) ?></td>
            <td><?= Html::encode($row['technical_issue']) ?></td>
            <td><?= Html::encode($row['other']) ?></td>
            <td><?= Html::encode($row['total']) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>


