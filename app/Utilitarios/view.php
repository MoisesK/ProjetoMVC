<?php

namespace App\Utilitarios;

class view {
    
    /** Metodo responsável por retornar o conteúdo de uma view */
    private static function getContentView($view){
        $file = __DIR__ . '/../../resources/view/'. $view .'.html';

        /** Verifica se o diretório e o conteúdo existe
         * Caso exista retorna o conteúdo. 
         */
        return file_exists($file) ? file_get_contents($file) : '';

    }

    /** Metodo responsável por retornar o conteúdo renderizado de uma View     */
    public static function render($view, $vars = []){
        //CONTEUDO DA VIEW
        $contentView = self::getContentView($view);

        // CHAVES DO ARRAY DE VARIAVEIS

        $keys = array_keys($vars);
        $keys = array_map(function($item){
            return '{{'.$item.'}}';
        },$keys);
        
        // RETORNA CONTEÚDO RENDERIZADO
        return str_replace($keys,array_values($vars),$contentView);
    }
}