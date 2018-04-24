<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;
use app\models\Registry;

class RegistryFormWidget extends Widget
{
    public function run()
    {
        if (Yii::$app->user->isGuest) {
            $model = new Registry();
            return $this->render('registryFormWidget', ['model' => $model]);
        }
    }
}
