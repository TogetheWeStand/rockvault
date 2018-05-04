<?php

namespace app\models;

use yii\base\Model;

class Search extends Model
{
    public $artist;
    public $track;
    public $album;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['artist', 'track', 'album'], 'string'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'artist' => 'Группа',
            'album' => 'Альбом',
            'track' => 'Песня',
        ];
    }

    public function searchTrack($artist, $album, $track)
    {
        if (!empty($artist)) {
            $artist = Artists::find()->where(['=', 'name', $artist])->one();
        }

//        var_dump($artist);
//        var_dump($artist->albumsRel[0]->albums->tracksRel[1]->tracks->name);
//        exit;
        if (!empty($album)) {
            $album = Albums::find()->
//            where(['=', 'artist', $artist->id])->
            where(['=', 'name', $album])->
            one();
        }

//        var_dump($album);
//        var_dump($album->artistsRel[0]->artists->name);
//        var_dump($album->tracksRel[1]->tracks->name);
//        exit;

        if (!empty($track)) {
            $track = Tracks::find()->
//            where(['=', 'album', $album->id])->
            where(['=', 'name', $track])->
            one();
        }

//        var_dump($track);
//        var_dump($track->albumsRel[0]->albums->artistsRel[0]->artists->name);
//        exit;

        return $track->name;
    }
}
