<?php

namespace app\models;

use rockvault\models\search\Albums;
use rockvault\models\search\Artists;
use rockvault\models\search\Tracks;
use Yii;
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
            'track' => 'Песня',
            'album' => 'Альбом',
        ];
    }

    public function searchTrack($artist, $track, $album)
    {
        if (!empty($artist)) {
            $artistM = new Artists();
        }

        if (!empty($track)) {
            $trackM = new Tracks();
        }

        if (!empty($album)) {
            $albumM = new Albums();
        }
    }
}
