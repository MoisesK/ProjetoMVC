<?php

namespace App\Controller\Paginas;

use App\Utilitarios\view;

class pageTarefas extends page{
   
    /** Método responsável por retornar o conteúdo(view) das Tarefas.
     * @return string
     */
    public static function getPageTarefas(){
    // RETORNA A VIEW DA PÁGINA DE TAREFAS
    $tabelaDeTarefas = view::render('Utilitarios/tabela');

    $content = view::render('Paginas/tarefas',[
    "tarefas" => "Estas são suas tarefas cadastradas!",
    "tabelaDeTarefas" => $tabelaDeTarefas
    ]);
    
    // RETORNA A VIEW DA PÁGINA
    return parent::getPage("Tarefas - Lista de tarefas", $content);
   
    }

}