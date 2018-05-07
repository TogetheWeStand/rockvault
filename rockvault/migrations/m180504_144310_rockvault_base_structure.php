<?php

use yii\db\Migration;

/**
 * Class m180504_144310_rockvault_base_structure
 */
class m180504_144310_rockvault_base_structure extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'email' => $this->string(45)->unique(),
            'password' => $this->string(255),
            'firstname' => $this->string(45),
            'lastname' => $this->string(45),
        ]);

        $this->createTable('artists', [
            'id' => $this->primaryKey(),
            'name' => $this->string(45)->unique(),
            'history' => $this->text(),
        ]);

        $this->createTable('albums', [
            'id' => $this->primaryKey(),
            'name' => $this->string(45)->unique(),
        ]);

        $this->createTable('tracks', [
            'id' => $this->primaryKey(),
            'name' => $this->string(45)->unique(),
        ]);

        $this->createTable('artist_album_rel', [
            'id' => $this->primaryKey(),
            'artist_id' => $this->integer(11),
            'album_id' => $this->integer(11),
        ]);

        $this->createTable('album_track_rel', [
            'id' => $this->primaryKey(),
            'album_id' => $this->integer(11),
            'track_id' => $this->integer(11),
        ]);

        $this->addForeignKey(
            'fk1-artist-album',
            'artist_album_rel',
            'artist_id',
            'artists',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk2-artist-album',
            'artist_album_rel',
            'album_id',
            'albums',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk1-album-track',
            'album_track_rel',
            'album_id',
            'albums',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk2-album-track',
            'album_track_rel',
            'track_id',
            'tracks',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk1-artist-album',
            'artist_album_rel'
        );

        $this->dropForeignKey(
            'fk2-artist-album',
            'artist_album_rel'
        );

        $this->dropForeignKey(
            'fk1-album-track',
            'album_track_rel'
        );

        $this->dropForeignKey(
            'fk2-album-track',
            'album_track_rel'
        );

        $this->dropTable('album_track_rel');
        $this->dropTable('artist_album_rel');
        $this->dropTable('tracks');
        $this->dropTable('albums');
        $this->dropTable('artists');
        $this->dropTable('users');
    }
}
