<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Artists
 * @property int $id
 * @property string $name
 * @property string $history
 * @package rockvault\models\search
 */
class Artists extends ActiveRecord
{
    public function getAlbumsRel()
    {
        return $this->hasMany(ArtistAlbumRel::className(),['artist_id' => 'id']);
    }
}
