<?php

use App\Router;


Router::get('^/$', function(){
    echo "HEllo";
});

Router::get('^/example/([0-9]+)$', function($id){
    echo "Example $id";
});

Router::get('^/example/([0-9]+)/([0-9]+)$', function($id, $id2){
    echo "Example $id $id2";
});

Router::get('^/example/([0-9]+)/([0-9]+)$', function($id, $id2){
    echo "Example $id $id2";
});
