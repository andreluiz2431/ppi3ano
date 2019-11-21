<?php
$this->pdo = new PDO('mysql:host=localhost;dbname=ppi3ano','root','');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
