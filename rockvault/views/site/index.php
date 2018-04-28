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

<?php $form = ActiveForm::begin(['action' =>['site/search']]); ?>
    <?= $form->field($model, 'firstname') ?>
    <?= $form->field($model, 'lastname') ?>
    <?= $form->field($model, 'email') ?>

    <div id="filter-btn">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

<!--<form id="filter">-->
<!--    <div class="filter-body">-->
<!--        <div>-->
<!--            <label for="album">Группа</label>-->
<!--            <input id="artist" type="search">-->
<!--        </div>-->
<!--        <div>-->
<!--            <label for="track">Песня</label>-->
<!--            <input id="track" type="search">-->
<!--        </div>-->
<!--        <div>-->
<!--            <label for="album">Альбом</label>-->
<!--            <input id="album" type="search">-->
<!--        </div>-->
<!--    </div>-->
<!--    <div id="filter-btn">-->
<!--        <input type="submit" value="Поиск">-->
<!--    </div>-->
<!--</form>-->

<div class="track-list">
    <marquee id="track-marquee" behavior=" scroll" direction="left"><?= $track ?: '' ?></marquee>
    <audio controls controlsList="nodownload">
        <source src="/mp3/One.mp3" type="audio/mpeg">
    </audio>
    <div class="track-list-body">
    </div>
</div>
