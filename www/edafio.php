<?php
header('Content-Type: application/json');
require_once("lib/selida.php");

$query = "SELECT MAX(`id`) FROM `edafio`";

$result = Selida::query($query);

if (!$result)
exit(0);

$row = $result->fetch_row();
$result->close();

if (!$row)
exit(0);

$query = "SELECT * FROM `edafio` WHERE `id` = " . random_int(1, intval($row[0]));

$result = Selida::query($query);

if (!$result)
exit(0);

$row = $result->fetch_object();
$result->close();

print json_encode($row);
?>