<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;
use app\models\Login;

class LoginFormWidget extends Widget
{
    public function run()
    {
        if (Yii::$app->user->isGuest) {
            $model = new Login();
            return $this->render('loginFormWidget', ['model' => $model]);
        }

//        return null;
    }
}
