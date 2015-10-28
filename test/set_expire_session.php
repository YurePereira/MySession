<?php

require_once '../session.php';

$session = new Session();

$session->setSessExpire(1);

//Criando novas Sessions
$session->setSess('id', 2);
$session->setSess('username', "Lucas");
$session->setSess('password', "minhasenha");
$session->setSess('type', 1);
