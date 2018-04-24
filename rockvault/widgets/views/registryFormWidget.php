<?php

    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
    use yii\bootstrap\Modal;

    Modal::begin([
        'header'=>'<h4>Регистрация</h4>',
        'id'=>'registry-modal',
        'size' => 'modal-sm']);
?>

<?php $form = ActiveForm::begin(['id' => 'registry-form', 'action' => ['site/registry']]);
    echo $form->field($model, 'firstname');
    echo $form->field($model, 'lastname');
    echo $form->field($model, 'email');
    echo $form->field($model, 'password')->input('password');
?>

<p>Поля со звёздочкой (*) обязательны для заполнения</p>

<div class="form-group">
    <div class="text-right">
        <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary']) ?>
    </div>
</div>

<?php
    ActiveForm::end();
    Modal::end();
?>
