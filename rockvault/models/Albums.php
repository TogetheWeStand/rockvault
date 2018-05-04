<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Albums
 * @property int $id
 * @property string $name
 * @package app\models
 */
class Albums extends ActiveRecord
{
    public function getArtistsRel()
    {
        return $this->hasMany(ArtistAlbumRel::className(),['album_id' => 'id']);
    }

    public function getTracksRel()
    {
        return $this->hasMany(AlbumTrackRel::className(),['album_id' => 'id']);
    }
}
