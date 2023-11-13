<?php

include('db.php');

if (isset($_POST['saveTask'])) {
  $Nomempleado = $_POST['Nomempleado'];
  $Apaterno = $_POST['Apaterno'];
  $Amaterno = $_POST['Amaterno'];
  $Direccion= $_POST['Direccion'];
  $Puesto = $_POST['Puesto'];
  $Celular = $_POST['Celular'];
  $Email = $_POST['Email'];
  $query = "INSERT INTO empleado(Nomempleado, Apaterno, Amaterno, Direccion, Puesto, Celular, Email) VALUES ('$Nomempleado', '$Apaterno', '$Amaterno', '$Direccion', '$Puesto', '$Celular', '$Email')";
  $result = mysqli_query($conn, $query);                                              
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Guardado ';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>