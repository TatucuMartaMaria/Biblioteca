<?php

class Client
{
    protected $nume,$nr_carti_imprumutate = 0, $data_retur = null;

    public static $evidenta_clienti = [];

    use adaugaSIafiseaza;

    public function __construct($nume)
    {
        $this->nume = $nume;
    }

    public static function afiseazaClienti()
    {
        (new Client(''))->afiseaza(get_class(), self::$evidenta_clienti);
    }

    public static function celMaiFidelCititor()
    {
        $max = 0;
        foreach(self::$evidenta_clienti as $item) {
            foreach (self::$evidenta_clienti as $client) {
                $max = ($client->nr_carti_imprumutate > $max) ? $client->nr_carti_imprumutate : $max;;

            }
            if ($item->nr_carti_imprumutate == $max) {
                echo "<pre>";
                print_r($item);
                echo "</pre>";
            }
        }
    }

    public function imprumutaCarte($carte)
    {
        if($carte->disponibilitate == false)
        {
            throw new Exception('CarteIndisponibilaException');
        }

        try{
            if(is_null($this->data_retur))
            {
                $carte->disponibilitate = false;
                date_default_timezone_set("Europe/Bucharest");
                $this->data_retur = date("d/m/Y", strtotime("+2 weeks"));
                $this->nr_carti_imprumutate++;
            }else{
                echo "<br><b style='color: red'>Se poate imprumuta o singura carte!
                                     Vei putea imprumuta o noua carte cand vei returna I carte.</b><br>";
            }
        }catch(Exception $e){
            echo $e->getMessage(), "\n";
        }
    }

    public function returneazaCarte($carte)
    {
        $carte->disponibilitate = true;
        $this->data_retur = null;
    }

    public function arePenalitati()
    {
        if(is_null($this->data_retur))
        {
            echo "<br><b style='color: green'>Nu are penalitati.</b><br>";
        }else{
            date_default_timezone_set("Europe/Bucharest");
            $a = convertDateInToNr($this->data_retur);
            $b = convertDateInToNr(date('d/m/Y'));

            if( $a < $b)
            {
                echo "<br><b style='color: red'>PENALITATE!!!Clientul trebuie sa returneze cartea.</b><br>";
            }
        }

    }

}

?>
