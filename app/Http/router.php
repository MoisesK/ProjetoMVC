<?php

namespace App\Http;

use \Closure;
use \Exception;

class router{
  /**
   * URL completa do projeto / raiz do projeto
   * @var string
   */
  private $url ='';

/**
 * Prefixo de todas as rotas
 * @var string
 */
  private $prefix = '';

/**
 * Indice de rotas
 * @var array
 */
  private $routes = [];

/**
 * Instância de request
 * @var request
 */
  private $request;

  /**
   * Método responsável por iniciar a classe
   */
  public function __construct($url){
     $this->request = new request();
     $this->url = $url;
     $this->setPrefix();
  }

/**
 * Metodo responsável por definir o prefixo das rotas
 */
  private function setPrefix(){
    //Informações da URL atual.
    $parseUrl = parse_url($this->url);

    //Define prefixo
    $this->prefix = $parseUrl['path'] ?? '';
  }

/**
 * Método responsável por adicionar uma rota na classe
 */
  private function addRoute($method,$route,$params = []){
      //VALIDAÇÃO DOS Parametros
      foreach ($params as $key => $value) {
        if($value instanceof Closure){
          $params['Controller'] = $value;
          unset($params[$key]);
          continue;
        }
      }

    //PADRÃO DE VALIDAÇÃO DA URL
    $patternRoute = '/^'.str_replace('/','\/',$route).'$/';

    //ADICIONA A ROTA DENTRO DA CLASSE
    $this->routes[$patternRoute][$method] = $params;
  }

/**
 * Método responsável por definir uma rota de GET
 */
  public function get($route,$params = []){
    return $this->addRoute('GET',$route,$params);
  }

  /**
   * Método responsável por retornar a URI desconsiderando o prefixo
   */
  private function getUri(){

    //URI da request
    $uri = $this->request->getURI();

    /**
     * Fatia a URI com o prefixo
     * @var [type]
     */
    $xUri = strlen($this->prefix) ? explode($this->prefix,$uri) : [$uri];

  //Retorna URI sem prefixo
    return end($xUri);

  }

  /**
   *Método responsável por retornar os dados da rota atual
   * @return array
   */
  private function getRoute(){
    //uri
    $uri = $this->getUri();

    //HTTPMethod
    $httpMethod = $this->request->gethttpMethod();

    //VALIDA AS ROTAS
    foreach ($this->routes as $patternRoute => $methods) {
      //VERIFICA SE A URI BATE COM O PADRÃO
      if(preg_match($patternRoute,$uri)){
        //VERIFICA O METODO
        if($methods[$httpMethod]){
          //RETORNO DOS PARAMETROS DA ROTA
          return $methods[$httpMethod];
        }
  //MÉTODO NÃO PERMITIDO/DEFINIDO
        throw new Exception("Método não permitido", 405 );

      }
    }

    //URL NÃO ENCONTRADA
    throw new Exception("URL não encontrada", 404);

  }

/**
 * Método responsável por executar a rota atual
 * @return response
 */
  public function run(){
    try {
      //obtem a rota atual
      $route = $this->getRoute();
      echo "<pre>";
      print_r($route);
      echo "</pre>"; exit;

    } catch (Exception $e) {
        return new Response($e->getCode(),$e->getMessage());
    }

  }


}

 ?>
