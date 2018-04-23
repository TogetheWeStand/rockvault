<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Users
 * @package app\models\forum
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string $firstname
 * @property string $lastname
 */
class Users extends ActiveRecord
{
}
