<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Registry extends Model
{
    public $firstname;
    public $lastname;
    public $email;
    public $password;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            ['email', 'email'],
            ['email', 'validateAttribute'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'firstname' => 'First Name',
            'lastname' => 'Last Name',
            'email' => 'Email',
            'password' => 'Password',
        ];
    }

    /**
     * @param string $attribute
     */
    public function validateAttribute($attribute = '')
    {
        if (!$this->hasErrors()) {
            $alreadyExists = Users::find()->where([$attribute => $this->$attribute])->one();

            if (gettype($alreadyExists->$attribute)  !== 'NULL')
                $this->addError($attribute, 'Already exists.');
        }
    }

    /**
     * @throws \Exception
     * @throws \yii\base\Exception
     */
    public function saveNewUser()
    {
        $newUser = new Users();
        $newUser->email = $this->email;
        $newUser->password = Yii::$app->security->generatePasswordHash($this->password);
        $newUser->firstname = $this->firstname;
        $newUser->lastname = $this->lastname;
        $newUser->save();

        //Add role for new user
//        $auth = Yii::$app->authManager;
//        $user = $auth->getRole('user');
//        $auth->assign($user, $newUser->id);
    }
}
