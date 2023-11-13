<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MENSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="saveTask.php" method="POST">
          <div class="form-group">
            <input type="text" name="Nomempleado" class="form-control" placeholder="Nombre" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="Apaterno" rows="2" class="form-control" placeholder="Apellido Paterno">
          </div>
          <div class="form-group">
            <input type="text" name="Amaterno" class="form-control" placeholder="Apellido materno" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="Direccion" class="form-control" placeholder="Direccion" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="Puesto" class="form-control" placeholder="Puesto" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="Celular" class="form-control" placeholder="Celular" autofocus>
          </div>
          <div class="form-group">
            <input type="email" name="Email" class="form-control" placeholder="Email" autofocus>
          </div>
          <input type="submit" name="saveTask" class="btn btn-success btn-block" value="Guardar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nomempleado</th>
            <th>Apaterno</th>
            <th>Amaterno</th>
            <th>Direccion</th>
            <th>Puesto</th>
            <th>Celular</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM empleado";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['Nomempleado']; ?></td>
            <td><?php echo $row['Apaterno']; ?></td>
            <td><?php echo $row['Amaterno']; ?></td>
            <td><?php echo $row['Direccion']; ?></td>
            <td><?php echo $row['Puesto']; ?></td>
            <td><?php echo $row['Celular']; ?></td>
            <td><?php echo $row['Email']; ?></td>
            <td>
              <a href="edit.php?idEmpleado=<?php echo $row['idEmpleado']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="deleteTask.php?idEmpleado=<?php echo $row['idEmpleado']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>