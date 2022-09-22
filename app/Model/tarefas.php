<?php

namespace App\Model;

class tarefas{
    private $id;
    private $titulo="1";
    private $descricao="1";
    private $dataLimite="1";
    private $situacao="1";

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function getDescricao(){
        return $this->descricao;
    }
    
    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function getData(){
        return $this->dataLimite;
    }

    public function setData($data){
        $this->dataLimite = $data;
    }

    public function getSituacao(){
        return $this->situacao;
    }

    public function setSituacao($situacao){
        $this->situacao = $situacao;
    }

    


}