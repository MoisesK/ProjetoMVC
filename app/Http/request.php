<?php

namespace App\Http;

class request{

      /** Método HTTP da requisição
       * @var string
       */
    private $httpMethod;

    /**
     * URI da página
     * @var string
     */
    private $uri;

    /**
     * Parametros da URL;
     * @var array
     */
    private $queryParams = [];

    /**
     * Variaveis recebidas do POST da página
     * @var array
     */
    private $postVars = [];

    /**
     * Cabeçalho da requisição
     * @var array
     */
    private $headers = [];

    /**
     * Construtor da classe
     */
    public function __construct(){
      $this->queryParams = $_GET ?? [];
      $this->postVars = $_POST ?? [];
      $this->headers = getallheaders();
      $this->httpMethod = $_SERVER['REQUEST_METHOD'] ?? '';
      $this->uri = $_SERVER['REQUEST_URI'] ?? '';
    }

    /**
     * Metodo responsável por retornar o método HTTP da requisição
     * @return string
     */
    public function gethttpMethod(){
      return $this->httpMethod;
    }

    /**
     * Metodo responsável por retornar a URI da requisição
     * @return string
     */
    public function getURI(){
      return $this->uri;
    }

    /**
     * Metodo responsável por retornar os headers da requisição
     * @return array
     */
    public function getHeaders(){
      return $this->headers;
    }

    /**
     * Metodo responsável por retornar os parametros/variaveis da url da requisição
     * @return array
     */
    public function getQueryParams(){
      return $this->queryParams;
    }

    /**
     * Metodo responsável por retornar as variaves POST da requisição
     * @return array
     */
    public function getPostVars(){
      return $this->postVars;
    }
}
 ?>
