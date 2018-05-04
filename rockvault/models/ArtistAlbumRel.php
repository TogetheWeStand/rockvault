<?php

namespace app\models;

use yii\db\ActiveRecord;

class ArtistAlbumRel extends ActiveRecord
{
    public function getArtists()
    {
        return $this->hasOne(Artists::className(),['id' => 'artist_id']);
    }

    public function getAlbums()
    {
        return $this->hasOne(Albums::className(),['id' => 'album_id']);
    }

    public static function tableName()
    {
        return 'artist_album_rel';
    }
}
