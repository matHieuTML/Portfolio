<?php


include "includes/init.inc.php";

$methode =     $_GET["methode"] ?? "liste";
$controleur =  $_GET["controleur"] ?? "message";
$id =          $_GET["id"] ?? null;

$nomClasse = "Controleurs\\" . ucfirst($controleur) . "Controleur";
/* j'instancie un objet Controleur de manière dynamique ($nomClasse peut avoir n'importe quel
     nom de classe Controleur) */
$controleur = new $nomClasse;
$controleur->$methode($id);