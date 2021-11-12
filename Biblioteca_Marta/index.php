<?php

require 'requires.php';


//VERIFICARE METODE:


$student1 = new Student("Popescu Ana");
$profesor1 = new Profesor("Popescu Anca");

$student2 = new Student("Vasile Andrei");
$profesor2 = new Profesor("Dragotescu Diana");

Student::adaugaStudent($student1);
Profesor::adaugaProfesor($profesor1);

Student::adaugaStudent($student2);
Profesor::adaugaProfesor($profesor2);

echo "<br><b>Clienti</b><br>";
Client::afiseazaClienti();

echo "<br><b>Studenti clienti</b><br>";
Student::afiseazaStudenti();

//CARTI:

$carte1 = new Carte("Atomic Habits", "James Clear", "Dezvoltare personala" );
$carte4 = new Carte("Atomic Habits", "James Clear", "Dezvoltare personala" );
$carte2 = new Carte("Inteligenta emotionala", "Daniel Goleman", "Psihologie");
$carte3 = new Carte("Fizica povestita", "Cristian Presura", "Fizica");

Carte::adaugaCarte($carte1);
Carte::adaugaCarte($carte2);
Carte::adaugaCarte($carte3);
Carte::adaugaCarte($carte4);

echo "<br><b>Carti</b><br>";
Carte::afiseazaCarti();

echo "<br><b>Carti disponibile:</b><br>";
Carte::afiseazaCartiDisponibile();

echo "<br><b>Carti dupa gen: </b><br>";
Carte::filtreazaCartiDupaGen('Dezvoltare personala');

echo "<br><b>Cautare carte dupa titlu si autor: </b><br>";
Carte::cautaCarte('Atomic');

echo "<br><b>Cel mai fidel cititor: </b><br>";
Client::celMaiFidelCititor();

$student1->imprumutaCarte($carte3);
$profesor2->imprumutaCarte($carte2);
$profesor2->returneazaCarte($carte2);
$profesor2->imprumutaCarte($carte1);

echo "<br><b>Cel mai fidel cititor: </b><br>";
Client::celMaiFidelCititor();

$student1->returneazaCarte($carte3);

echo "<br><b>Carti disponibile:</b><br>";
Carte::afiseazaCartiDisponibile();

echo "<br><b>Clienti</b><br>";
Client::afiseazaClienti();

//$profesor2->arePenalitati();
$student1->arePenalitati();

?>