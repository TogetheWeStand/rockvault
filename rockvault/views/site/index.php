<?php

/* @var $this yii\web\View */
/* @var $registry  app\controllers\SiteController */
/* @var $data  app\controllers\SiteController */
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
    <?= $form->field($model, 'album')->input('search', ['id' => 'album']) ?>
    <?= $form->field($model, 'track')->input('search', ['id' => 'track']) ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['id' => 'filter-btn']) ?>
    </div>

<?php ActiveForm::end(); ?>

<?php
    if (isset($data['visible'])) {
        echo "<div class='search-list'>";
        echo "<div class='artist-name'>" . $data['artist'] . "</div>";
        echo "<div class='albums row'>";

        foreach ($data['albums'] as $key => $value) {
            echo "<div class='item col-lg-5'>";
            echo "<span>$key</span>";

            foreach ($value as $track) {
                echo "<div class='track' style='display: none'>$track</div>";
            }

            echo "</div>";
        }

        echo "</div>";
        echo "</div>";
    }
?>

<div class="track-list">
    <marquee id="track-marquee" behavior="scroll" direction="left"><?=  '' ?></marquee>
    <div id="audio-container"></div>
<!--    <audio controls controlsList="nodownload">-->
<!--        <source src="" type="audio/mpeg">-->
<!--    </audio>-->
    <div class="track-list-body">
        <div class="row"></div>
    </div>
</div>
