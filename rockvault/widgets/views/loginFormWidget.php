<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;

Modal::begin([
    'header'=>'<h4>Авторизация</h4>',
    'id'=>'login-modal',
    'size' => 'modal-sm']);
?>

<?php $form = ActiveForm::begin(['id' => 'login-form', 'action' => ['site/login']]);
    echo $form->field($model, 'email')->textInput();
    echo $form->field($model, 'password')->passwordInput();
?>


<div class="form-group">
    <div class="text-right">
        <?php echo Html::submitButton('Вход', ['class' => 'btn btn-primary']); ?>
    </div>
</div>

<?php
    ActiveForm::end();
    Modal::end();
?>
