<?php



$HOST = "fdb17.awardspace.net";
$USER = "";
$PASSWORD = "";
$DATABASE = "";



  $conn = new mysqli($HOST, $USER, $PASSWORD, $DATABASE);
  if ($conn->connect_error)
    throw new Exception('Falha na conexão com o MySQL: ' . $conn->connect_error);


?>
