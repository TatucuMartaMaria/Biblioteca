<?php

class Profesor extends Client
{
    //protected $materia_predata;

    public static function adaugaProfesor($profesor)
    {
        self::$evidenta_clienti = $profesor->adauga($profesor, self::$evidenta_clienti);
    }

}

?>