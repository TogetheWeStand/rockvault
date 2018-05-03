<?php

/* @var $this yii\web\View */
/* @var $registry  app\controllers\SiteController */
/* @var $track  app\controllers\SiteController */
/* @var $form yii\bootstrap\ActiveForm */

use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Rock Vault';

    if ($registry !== null) {
        if ($registry) {
            $registry_result = 'Вы успешно зарегистрированы.';
            $header = 'Добро пожаловать!';
        } else {
            $registry_result = 'К сожалению регистрация не удалась. Попробуйте снова спустя пару минут.';
            $header = 'Упс!';
        }

        Modal::begin([
            'header' => '<h4>' . $header . '</h4>',
            'id'=>'registry-result-modal',
            'clientOptions' => ['show' => true],
            'size' => 'modal-sm'
        ]);
            echo $registry_result;
        Modal::end();
    }
?>

<?php $form = ActiveForm::begin(['action' => ['site/search'], 'id' => 'filter']); ?>
    <?= $form->field($model, 'artist')->input('search', ['id' => 'artist']) ?>
    <?= $form->field($model, 'track')->input('search', ['id' => 'track']) ?>
    <?= $form->field($model, 'album')->input('search', ['id' => 'album']) ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['id' => 'filter-btn']) ?>
    </div>

<?php ActiveForm::end(); ?>

<div class="track-list">
    <marquee id="track-marquee" behavior=" scroll" direction="left"><?= $track ?: '' ?></marquee>
    <audio controls controlsList="nodownload">
        <source src="/mp3/One.mp3" type="audio/mpeg">
    </audio>
    <div class="track-list-body">
    </div>
</div>
