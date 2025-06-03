<?php
$pdo = new PDO("pgsql:host=localhost;dbname=sig_tuto", "postgres", "admin");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
return $pdo;
