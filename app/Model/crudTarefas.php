<?php

namespace App\Model;

use App\Controller\Conexao\conexaoDB;

class crudTarefas{

    public function create(tarefas $t){
      $sql = "INSERT INTO tarefas (id,titulo,descricao,dataLimite,situacao) VALUES (NULL,?,?,?,?)";

      $stmt = conexaoDB::getConn()->prepare($sql);
      $stmt->bindValue(1,$t->getTitulo());
      $stmt->bindValue(2,$t->getDescricao());
      $stmt->bindValue(3,$t->getData());
      $stmt->bindValue(4,$t->getSituacao());

      $stmt->execute();

    }

    public static function read(){
        $sql = "SELECT * FROM tarefas";

        $stmt = conexaoDB::getConn()->prepare($sql);
        $stmt->execute();

    }

    public static function exibirDados($dado){
      $tarefas = new crudTarefas();
      foreach($tarefas->read() as $Tarefa){
        $tarefaFinal = $Tarefa["\".$dado\"."];
      }

      echo $tarefaFinal;
    }

    public static function update(){

    }

    public static function delete(){

    }

}
