<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\Login */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<p>Благодарим за регистрацию!</p>
<p>Теперь вы можете войти на форум используя данные введённые при регистрации</p>

<?php $form = ActiveForm::begin(['action' =>['site/login']]); ?>

<?= $form->field($model, 'email') ?>
<?= $form->field($model, 'password')->input('password') ?>

    <div class="form-group">
        <?= Html::submitButton('Sign In', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>