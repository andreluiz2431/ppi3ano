<?php
$host = 'localhost';
$bd = 'ppi3ano';
$user = 'root';
$senha = '';
$this->pdo = new PDO('mysql:host='.$host.';dbname='.$bd.'',$user,$senha);
$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// teste youtube
?>
