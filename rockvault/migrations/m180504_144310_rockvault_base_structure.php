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

//        $this->addForeignKey(
//            'fk-themes-user_id',
//            'themes',
//            'user_id',
//            'users',
//            'id',
//            'CASCADE'
//        );
//
//        $this->addForeignKey(
//            'fk-comments-user_id',
//            'comments',
//            'user_id',
//            'users',
//            'id',
//            'CASCADE'
//        );
//
//        $this->addForeignKey(
//            'fk-comment_liked-user_id',
//            'comment_liked',
//            'user_id',
//            'users',
//            'id',
//            'CASCADE'
//        );
//
//        $this->addForeignKey(
//            'fk-comments-theme_id',
//            'comments',
//            'theme_id',
//            'themes',
//            'id',
//            'CASCADE'
//        );
//
//        $this->addForeignKey(
//            'fk-themes-group_id',
//            'themes',
//            'group_id',
//            'groups',
//            'id',
//            'CASCADE'
//        );
//
//        $this->addForeignKey(
//            'fk-comment_liked-comment_id',
//            'comment_liked',
//            'comment_id',
//            'comments',
//            'id',
//            'CASCADE'
//        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
//        $this->dropForeignKey(
//            'fk-themes-user_id',
//            'themes'
//        );
//
//        $this->dropForeignKey(
//            'fk-comments-user_id',
//            'comments'
//        );
//
//        $this->dropForeignKey(
//            'fk-comment_liked-user_id',
//            'comment_liked'
//        );
//
//        $this->dropForeignKey(
//            'fk-comments-theme_id',
//            'comments'
//        );
//
//        $this->dropForeignKey(
//            'fk-themes-group_id',
//            'themes'
//        );
//
//        $this->dropForeignKey(
//            'fk-comment_liked-comment_id',
//            'comment_liked'
//        );
//
//        $this->dropTable('comment_liked');
//        $this->dropTable('comments');
//        $this->dropTable('groups');
//        $this->dropTable('themes');
//        $this->dropTable('users');
    }
}
