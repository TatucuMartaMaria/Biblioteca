<?php


class Carte
{
    protected $titlu, $autor, $gen;
    public $disponibilitate = true;

    public static $evidenta_carti = [];
    //public static $evidenta_carti_disponibile = [];

    use adaugaSIafiseaza;

    public function __construct($titlu, $autor, $gen)
   {

//        if($nr_pg < 0)
//        {
//            throw new Exception('Cred ca s-a produs o greseala, nr de pagini introdus nu este unul relevant!');
//        }
//        try{
//            $this->nr_pg = $nr_pg;
//        }catch(Exception $e){
//            echo $e->getMessage(), "\n";
//        }

        $this->titlu = $titlu;
        $this->autor = $autor;
        $this->gen = $gen;
    }

    public static function afiseazaCarti()
    {
        (new Carte('','',''))->afiseaza(get_class(), self::$evidenta_carti);
    }

    public static function adaugaCarte($carte)
    {
        self::$evidenta_carti = $carte->adauga($carte, self::$evidenta_carti);
    }

    public static function afiseazaCartiDisponibile()
    {
        foreach(self::$evidenta_carti as $carte)
        {
            if($carte->disponibilitate)
            {
                echo "<pre>";
                print_r($carte);
                echo "</pre>";
            }
        }
    }

    public static function cautaCarte($input)
    {

        foreach(self::$evidenta_carti as $carte)
        {
            $a = eliminareCaractereSpeciale($carte->titlu);
            $b = eliminareCaractereSpeciale($carte->autor);
            $c = eliminareCaractereSpeciale($input);

            $conditie1 = (similarText($a, $c) >= 50);
            $conditie2 = (similarText($b, $c) >= 50);

            if($conditie1 || $conditie2) {
                echo "<pre>";
                print_r($carte);
                echo "</pre>";
            }
        }
    }

    public static function filtreazaCartiDupaGen($gen_ales)
    {
        foreach(self::$evidenta_carti as $carte)
        {
            if($carte->gen == $gen_ales)
            {
                echo "<pre>";
                print_r($carte);
                echo "</pre>";
            }
        }
    }


}


?>
