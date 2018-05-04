<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Tracks
 * @property int $id
 * @property string $name
 * @package app\models
 */
class Tracks extends ActiveRecord
{
    public function getAlbumsRel()
    {
        return $this->hasMany(AlbumTrackRel::className(),['track_id' => 'id']);
    }
}
