<?php

namespace app\models;

use yii\db\ActiveRecord;

class AlbumTrackRel extends ActiveRecord
{
    public function getAlbums()
    {
        return $this->hasOne(Albums::className(),['id' => 'album_id']);
    }

    public function getTracks()
    {
        return $this->hasOne(Tracks::className(),['id' => 'track_id']);
    }

    public static function tableName()
    {
        return 'album_track_rel';
    }
}
