<?php
require __DIR__. '/vendor/autoload.php';

use App\Http\router;
use App\Http\response;
use App\Controller\Paginas\home;

define('URL','http://projetos/cursoMVC');

$obRouter = new router(URL);

//ROTA HOME
$obRouter->get('/',[
  function(){
    return new response(200,home::getHome());
  }
]);

//
$obRouter->run()->sendResponse();

