<?php
require_once "$pathway/../app/db.php";
$clause = 'services';
$pdo = getPDO();
$data = Select($pdo, $clause);

dd($data);