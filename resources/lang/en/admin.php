<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'article' => [
        'title' => 'Articles',

        'actions' => [
            'index' => 'Articles',
            'create' => 'New Article',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'visible' => 'Visible',
            'title' => 'Title',
            'subHeadline' => 'SubHeadline',
            'article' => 'Article',
            'image' => 'Image',
            'video' => 'Video',
            'audio' => 'Audio',
            'videoUrl' => 'VideoUrl',
            'audioUrl' => 'AudioUrl',
            'file' => 'File',
            
        ],
    ],

    'article' => [
        'title' => 'Articles',

        'actions' => [
            'index' => 'Articles',
            'create' => 'New Article',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'visible' => 'Visible',
            'title' => 'Title',
            'subHeadline' => 'SubHeadline',
            'article' => 'Article',
            'image' => 'Image',
            'video' => 'Video',
            'audio' => 'Audio',
            'videoUrl' => 'VideoUrl',
            'audioUrl' => 'AudioUrl',
            'file' => 'File',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];