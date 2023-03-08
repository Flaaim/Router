<?php

use App\Router;


Router::get('', function(){
    echo "HEllo";
});

Router::get('/user/:id/post/:id', function($id, $id2){
    echo "Example $id - $id2";
});

Router::get('/:id/:id', function($id, $id2){
    echo "Example $id - $id2";
});

