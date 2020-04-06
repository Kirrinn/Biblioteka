<?php

$ime_hosta = 'localhost';
$korisnik = 'root';
$sifra = '';
$ime_baze = "biblioteka";

$konekcioni_string = "mysql:host=" . $ime_hosta . ";dbname=" . $ime_baze;
$dbh = new PDO($konekcioni_string, $korisnik, $sifra);
