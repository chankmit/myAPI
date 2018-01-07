<?php

use Slim\Http\Request;
use Slim\Http\Response;

// get all regis user
$app->get('/regis', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT * FROM regis ORDER BY code");
   $sth->execute();
   $todos = $sth->fetchAll();
   return $this->response->withJson($todos);
});
$app->get('/regis/[{id}]', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT * FROM regis WHERE id=:id");
   $sth->bindParam("id", $args['id']);
   $sth->execute();
   $todos = $sth->fetchObject();
   return $this->response->withJson($todos);
});


$app->get('/hello', function ($request, $response) {
    return $response->write("Hello !! Welcome to my API");
});
$app->get('/first', function ($request, $response) {
    return $response->write("This is my First routing with Slim Framework");
}); 
$app->get('/news/{name}', function ($request, $response, $args) {
    return $response->write("News Group : " . $args['name']);
});
$app->get('/fixjson', function ($request, $response) {
    $data = array(
        array('title'=>'Hello: This is JSON from Array',
        'name'=>'Wichan Thumthong','age'=>28),
        array('title'=>'Group no.2 of Array',
        'name'=>'Wichan Thumthong','age'=>29),
        array('title'=>'Group no.3 of Array',
        'name'=>'Wichan Thumthong','age'=>30)
    );
    $jsresponse = $response->withJson($data);
    return $jsresponse;
});
