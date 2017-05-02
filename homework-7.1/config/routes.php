<?php
return array(

    'users/([0-9]+)' => 'users/user/$1',
    'users' =>'users/users',

    'login'=>'login/login',
    'register'=>'register/register',
    'logout'=>'register/logout',
    'profile/([0-9]+)' => 'profile/post/$1',
    'profile'=>'profile/profile',

    'index.twig'=>'index',
    '' =>'index',

);