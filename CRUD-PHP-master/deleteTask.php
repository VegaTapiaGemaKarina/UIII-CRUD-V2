<?php

include("db.php");

if(isset($_GET['idEmpleado'])) {
  $idEmpleado = $_GET['idEmpleado'];
  $query = "DELETE FROM empleado WHERE idEmpleado = $idEmpleado";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Consulta fallida.");
  }

  $_SESSION['message'] = 'Borrado con Exito';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}

?>