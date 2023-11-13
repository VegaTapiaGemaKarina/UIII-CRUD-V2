<?php
include("db.php");
$Nomempleado = '';
$Apaterno = '';
$Amaterno = '';
$Direccion= '';
$Puesto = '';
$Celular = '';
$Email = '';

if  (isset($_GET['idEmpleado'])) {
  $idEmpleado = $_GET['idEmpleado'];
  $query = "SELECT * FROM empleado WHERE idEmpleado=$idEmpleado";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $Nomempleado = $row['Nomempleado'];
    $Apaterno =  $row['Apaterno'];
    $Amaterno =  $row['Amaterno'];
    $Direccion=  $row['Direccion'];
    $Puesto =  $row['Puesto'];
    $Celular = $row['Celular'];
    $Email =  $row['Email'];
  }
}

if (isset($_POST['update'])) {
  $idEmpleado = $_GET['idEmpleado'];
  $Nomempleado = $_POST['Nomempleado'];
  $Apaterno = $_POST['Apaterno'];
  $Amaterno = $_POST['Amaterno'];
  $Direccion= $_POST['Direccion'];
  $Puesto = $_POST['Puesto'];
  $Celular = $_POST['Celular'];
  $Email = $_POST['Email'];

  $query = "UPDATE empleado set Nomempleado = '$Nomempleado', Apaterno = '$Apaterno' , Amaterno = '$Amaterno', Direccion = '$Direccion', Puesto = '$Puesto',  Celular= '$Celular', Email = '$Email' WHERE idEmpleado=$idEmpleado";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Exito se actializo con exito';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?idEmpleado=<?php echo $_GET['idEmpleado']; ?>" method="POST">
        <div class="form-group">
          <input name="Nomempleado" type="text" class="form-control" value="<?php echo $Nomempleado; ?>" placeholder="Nombre">
        </div>
        <div class="form-group">
        <input name="Apaterno" type="text" class="form-control" value="<?php echo $Apaterno; ?>" placeholder=" Apelllido paterno">
        </div>
        <div class="form-group">
        <input name="Amaterno" type="text" class="form-control" value="<?php echo $Amaterno; ?>" placeholder="Apelllido materno">
        </div>
        <div class="form-group">
        <input name="Direccion" type="text" class="form-control" value="<?php echo $Direccion;  ?>" placeholder="Direccion">
        </div>
        <div class="form-group">
        <input name="Puesto" type="text" class="form-control" value="<?php echo $Puesto; ?>" placeholder="Puesto">
        </div>
        <div class="form-group">
        <input name="Celular" type="text" class="form-control" value="<?php echo $Celular; ?>" placeholder="Celular">
        </div>
        <div class="form-group">
        <input name="Email" type="text" class="form-control" value="<?php echo $Email; ?>" placeholder="Email">
        </div>
        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
