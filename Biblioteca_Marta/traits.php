<?php

trait adaugaSIafiseaza
{
    public function afiseaza($class_name, $evidenta)
    {
        foreach ($evidenta as $obiect)
        {
            if($obiect instanceof ($class_name))
            {
                echo "<pre>";
                print_r($obiect);
                echo "</pre>";
            }
        }
    }

    public function adauga($obiect1, $evidenta)
    {
        if(count($evidenta) == 0)
        {
            array_push($evidenta, $obiect1);
        }

        else {
            if($obiect1 instanceof Client)
            {
                foreach ($evidenta as $obiect2)
                {
                    if (($obiect1->nume) == ($obiect2->nume))
                    {
                        throw new Exception('NumeDejaExistentException');
                    }
                }
            }
            try {
                array_push($evidenta, $obiect1);
            } catch (Exception $e) {
                echo $e->getMessage(), "\n";
            }
        }
        return $evidenta;
    }

}


?>