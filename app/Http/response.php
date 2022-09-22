<?php

namespace App\Http;

class response{
/**
 * Código do status HTTP
 * @var int
 */
private $httpCode = 200;

/**
 *Cabeçalho do Response
 */
private $headers = [];

/**
 * Tipo de conteúdo que está sendo retornado
 * @var string
 */
private $contentType = 'text/html';

/**
 * Guardar conteúdo do response
 * @var mixed
 */
private $content;

/**
 * Método responsável por iniciar a classe e definir os valores.
 * @param int $httpCode
 * @param mixed $content
 * @param string $contentType
 */
public function __construct($httpCode,$content,$contentType = 'text/html'){
  $this->httpCode = $httpCode;
  $this->content = $content;
  $this->setContentType($contentType);
}

/**
 * Metodo responsável por alterar o content-type do response
 * @param string
 */
public function setContentType($contentType){
  $this->contentType = $contentType;
  $this->addHeader('Content-Type',$contentType);
}

/**
 * Metodo responsável por adicionar um registro no cabeçalho de response
 * @param string $key
 * @param string $value
 */
public function addHeader($key, $value){
  $this->headers[$key] = $value;
}

/**
 * Metodo responsável por enviar os headers para o navegador.
 */
private function sendHeaders(){
  //status
  http_response_code($this->httpCode);

  //enviar headers
  foreach($this->headers as $key=>$value){
    header($key." : ".$value);
  }
}

/**
 * Metodo responsável por enviar a resposta para o usuário
 */
public function sendResponse(){
  //ENVIA OS HEADERS
  $this->sendHeaders();

  //IMPRIME O CONTEÚDO
  switch ($this->contentType) {
    case 'text/html':
      echo $this->content;
      exit;
  }
}

}

 ?>
