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

    public function searchTrack($artist = null)
    {
        $result = null;

        if (!empty($artist)) {
            $result['artist'] = $artist;
            $artist = Artists::find()->where(['=', 'name', $artist])->one();

            if ($artist === null) {
                return null;
            }

            foreach ($artist->albumsRel as $albumRel) {
                $tracks = [];

                foreach ($albumRel->albums->tracksRel as $trackRel) {
                    $tracks[] = $trackRel->tracks->name;
                }

                $result['albums'][$albumRel->albums->name] = $tracks;
            }

            $result['visible'] = true;
        }

        return $result;
    }
}
