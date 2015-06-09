<?php

use yii\db\Schema;
use yii\db\Migration;

class m150609_074026_init extends Migration
{
    public function safeUp()
    {
        $this->createTable('user', [
            'id'            => 'pk',
            'username'      => 'string(32) unique',
            'password'      => 'string not null',
            'access_token'  => 'string not null',
            'auth_key'      => 'string not null'
        ]);

        $this->createTable('author', [
            'id'            => 'pk',
            'first_name'    => 'string not null',
            'last_name'     => 'string not null'
        ]);

        $this->createTable('book', [
            'id'            => 'pk',
            'name'          => 'string not null',
            'preview'       => 'string not null',
            'author_id'     => 'int not null',
            'date'          => 'date not null',
            'created_at'    => 'datetime not null default current_timestamp',
            'updated_at'    => 'datetime not null default current_timestamp',
        ]);
        $this->addForeignKey('fk_book_author',
            'book', 'author_id',
            'author', 'id',
            'cascade', 'cascade'
        );

        $this->batchInsert('author',
            ['id', 'first_name', 'last_name'],
            [
                [1, 'Alan', 'Gibson'],
                [2, 'John', 'Symonds'],
                [3, 'Martyn', 'Godfray'],
                [4, 'John', 'Harrison'],
                [5, 'Steve', 'Green'],
                [6, 'Greg', 'Hamerton'],
                [7, 'Susan', 'Hill'],
            ]
        );

        $this->batchInsert('book',
            ['id', 'name', 'preview', 'author_id', 'date'],
            [
                [1, 'Pig', 'pig.jpg', 1, '1990-01-01'],
                [2, 'The story', 'the_story.jpg', 2, '1991-01-01'],
                [3, 'Fire', 'fire.jpg', 3, '1985-01-01'],
                [4, 'The Pastel City', 'the_pastel_city.jpg', 4, '1971-01-01'],
                [5, 'Personal Life', 'personal_life.jpg', 5, '2000-01-01'],
                [6, 'The Journey', 'the_journey.jpg', 6, '2008-01-01'],
                [7, 'Second Sight', 'second_sight.jpg', 6, '2010-01-01'],
                [8, 'The Woman in Black', 'the_woman_in_black.jpg', 7, '1983-01-01'],
                [9, 'The story 2', 'the_story_2.jpg', 2, '1993-01-01'],
            ]
        );

        $this->batchInsert('user',
            ['id', 'username', 'password', 'auth_key'],
            [
                [1, 'admin', '4297f44b13955235245b2497399d7a93', '21232f297a57a5a743894a0e4a801fc3'],
                [2, 'user', '4297f44b13955235245b2497399d7a93', 'ee11cbb19052e40b07aac0ca060c23ee'],
                [3, 'user1', '4297f44b13955235245b2497399d7a93', '24c9e15e52afc47c225b757e7bee1f9d'],
                [4, 'user2', '4297f44b13955235245b2497399d7a93', '7e58d63b60197ceb55a1c487989a3720'],
            ]
        );
    }

    public function down()
    {
        echo "m150609_074026_init cannot be reverted.\n";

        return false;
    }
}
