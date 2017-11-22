<?php



$HOST = "fdb17.awardspace.net";
$USER = "2464328_clinicamedica";
$PASSWORD = "bckclinica12345";
$DATABASE = "2464328_clinicamedica";



  $conn = new mysqli($HOST, $USER, $PASSWORD, $DATABASE);
  if ($conn->connect_error)
    throw new Exception('Falha na conexão com o MySQL: ' . $conn->connect_error);


?>