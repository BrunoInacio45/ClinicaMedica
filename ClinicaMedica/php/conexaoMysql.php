<?php

/*define("HOST", ""); 
define("USER", "2464328_clinicamedica");
define("PASSWORD", "Clinica2017"); 
define("DATABASE", "2464328_clinicamedica");*/

define("HOST", "localhost"); 
define("USER", "root");
define("PASSWORD", ""); 
define("DATABASE", "clinicamedica");

function conectaAoMySQL()
{
  $conn = new mysqli(HOST, USER, PASSWORD, DATABASE);
  if ($conn->connect_error)
    throw new Exception('Falha na conexão com o MySQL: ' . $conn->connect_error);

  return $conn;   
}

?>