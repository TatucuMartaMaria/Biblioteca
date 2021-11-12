<?php

class Student extends Client
{
    // protected $facultate, $an_studiu;

    public static function adaugaStudent($student)
    {
        self::$evidenta_clienti = $student->adauga($student, self::$evidenta_clienti);
    }

    public static function afiseazaStudenti()
    {
        (new Student(''))->afiseaza(get_class(), self::$evidenta_clienti);
    }

}

?>