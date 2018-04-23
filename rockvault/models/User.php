<?php

namespace app\models;

use Yii;
use yii\base\BaseObject;
use yii\web\IdentityInterface;

/**
 * Class User
 * @param $email
 * @package app\models
 */
class User extends BaseObject implements IdentityInterface
{
    public $id;
    public $email;
    public $password;
    public $firstname;
    public $lastname;
    public $authKey;
    public $accessToken;
    private static $pass;

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        $user = Users::find()->where(['id' => $id])->one();

        return isset($user) ? new static($user) : null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $user = Users::find()->where(['token' => $token])->one();

        return isset($user) ? new static($user) : null;
    }

    /**
     * @param string $email
     * @return static array
     */
    public function findByUserMail($email = 'example@exemple.com')
    {
        $user = Users::find()->where(['email' => $email])->one();

        self::$pass = $user->password;

        return new static($user);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * @param string $password
     * @return bool
     */
    public function validatePassword($password = '')
    {
        return Yii::$app->getSecurity()->validatePassword($password, self::$pass);
    }
}
