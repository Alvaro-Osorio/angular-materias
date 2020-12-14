<?php

require 'conexion.php';

$materias = [];
$sql = 'SELECT cveMateria, nombreMateria, creditosMateria FROM Materia';

if($result = mysqli_query($con,$sql))
{
  $i = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $materias[$i]['cveMateria']    = $row['cveMateria'];
    $materias[$i]['nombreMateria'] = $row['nombreMateria'];
    $materias[$i]['creditosMateria'] = $row['creditosMateria'];
    $i++;
  }

  echo json_encode($materias);
}
else
{
  http_response_code(404);
}
?>