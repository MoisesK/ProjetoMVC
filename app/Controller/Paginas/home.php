<?php

namespace App\Controller\Paginas;

use App\Utilitarios\view;

class home extends page{
   
    /** Método responsável por retornar o conteúdo(view) da home.
     * @return string
     */
    public static function getHome(){
    // RETORNA A VIEW DA HOME

    $content = view::render('Paginas/home',[
    "HomeName" => "Projetos pendentes",
    "descriçãoHome" => "Veja aqui os projetos que estão pendente a serem realizados!"
    ]);
    
    // RETORNA A VIEW DA PÁGINA
    return parent::getPage("Home - Lista de Projetos", $content);
   
    }

}