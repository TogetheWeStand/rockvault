<?php

/* @var $this yii\web\View */
/* @var $registry  app\controllers\SiteController */

use yii\bootstrap\Modal;

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
