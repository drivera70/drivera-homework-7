<?php

namespace app\models;

class Post
{
    public function getAllPosts() {
        return [
            [
                'id' => '1',
                'username' => 'ultron',
                'content' => 'Hey!'
            ],
            [
                'id' => '2',
                'username' => 'jarvis',
                'content' => 'Howdy!'
            ]
            ];
    }
}