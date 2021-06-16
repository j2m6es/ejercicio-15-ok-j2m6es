<?php

namespace App\Services;


/**
 * Gestión de Idiomas del site publico
 */
class GestorIdioma
{
    // Configura el idioma de las plantillas publicas
    public function cambiarIdioma(String $idioma):bool
    {
        return true;
    }

    // Devuelve el idioma de las paginas publicas
    public function verIdioma():string
    {
        $idioma="ES";
        return $idioma;
    }
}