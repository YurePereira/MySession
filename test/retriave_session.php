<?php

require_once '../session.php';

$session = new Session();

$id = $session->getSess('id');
$username = $session->getSess('username');
$password = $session->getSess('password');
$type = $session->getSess('type');

//Verificar se a session id existe
if ($session->hasSess('id')) {

  echo "Id: " . $id . "<br>";
  echo "Username: " . $username . "<br>";
  echo "Password: " . $password . "<br>";
  echo "Type: " . $type . "<br>";

} else {

  echo "Erro.";

}
