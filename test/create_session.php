<?php

require_once '../session.php';

$session = new Session();

//Criando novas Sessions
$session->setSess('id', 1);
$session->setSess('username', "Joao");
$session->setSess('password', "minhasenha");
$session->setSess('type', 1);
