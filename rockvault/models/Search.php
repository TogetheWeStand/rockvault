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

    public function searchTrack($artist)
    {
        $artist = null;
        $result = null;

        if (!empty($artist)) {
            $artist = Artists::find()->where(['=', 'name', $artist])->one();
            var_dump($artist);
        }

        return $result;
    }
}
