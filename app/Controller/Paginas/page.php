<?php

namespace App\Controller\Paginas;

use App\Utilitarios\view;

class page{

    private static function getHeader(){
        return view::render("Paginas/header");
    }
    
    /** Método responsável por retornar o conteúdo(view) da nossa página genérica.
     * @return string
     */

    public static function getPage($title,$content){
        return view::render('Paginas/page',[
    "title" => $title,
    "header" => self::getHeader(),
    "content" => $content,
    "footer" => self::getFooter()
    ]);
    }

    private static function getFooter(){
        return view::render("Paginas/footer");
    }

}