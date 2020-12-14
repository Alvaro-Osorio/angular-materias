<?php
require 'conexion.php';

$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
 
  $request = json_decode($postdata);

  if(trim($request->cve)==''|| trim($request->snombre) === '' || trim($request->sapepat) == '')
  {
    return http_response_code(400);
  }

  $cve = mysqli_real_escape_string($con, trim($request->cve));
  $snombre = mysqli_real_escape_string($con, trim($request->snombre));
  $sapepat = mysqli_real_escape_string($con, trim($request->sapepat));

  $sql ="INSERT INTO `Usuario`(`sCveUsuario`,`sNombre`,`sApePat`) VALUES ('{$cve}','{$snombre}','{$sapepat}')";

  if(mysqli_query($con,$sql))
  {
    http_response_code(201);
    $usuarios = [
      'cve' => $cve,
      'snombre' => $snombre,
      'sapepat' => $sapepat
     
    ];
    echo json_encode($usuarios);
  }
  else
  {
    http_response_code(422);
  }
}

?>