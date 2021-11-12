<?php

 function eliminareCaractereSpeciale($str)
{
    $rez = preg_replace('/[^a-zA-Z0-9_ -]/s','',$str);
    $rez = str_replace(' ', '', $rez);
    return $rez;
}

 function similarText($text1 , $text2)
{
    similar_text(strtolower($text1) , strtolower($text2),$percent);
    return $percent;
}

function convertDateInToNr($date)
{
    $date = str_replace('/', '-', $date);
    $date = date('Y/m/d', strtotime($date));
    $date = (int)eliminareCaractereSpeciale($date);
    return $date;
}



?>