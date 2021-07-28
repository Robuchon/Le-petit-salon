<?php

function getPDO (): PDO {
    return new PDO("sqlite:../app/lepetitsalon.db");
}

function Select ($pdo, $clause): array { 
$query = $pdo->query("SELECT DISTINCT $clause FROM service");
return $query->fetchALL();
}