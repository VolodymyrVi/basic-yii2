<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;


?>

<h1>Test action</h1>
<?php

//debug($model);
?>

<?php $form = ActiveForm::begin(['options'=>['id'=>'testForm']]) ?>
    <?= $form->field($model, 'name')->label('Імя') ?>
    <?= $form->field($model, 'email')->input('email') ?>
    <?= $form->field($model, 'text')->label('Текст повідомлення')->textarea(['rows' =>5]) ?>
    <?= Html::submitButton('Send', ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end() ?>


