<?php include ("db.php") ?>
<?php include('includes/header.php')?>


    <h1> SI SARA</h1>
    <main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

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
        <form action="save_materia.php" method="POST">
          <div class="form-group">
            <input type="text" name="materia" class="form-control" placeholder="materia" autofocus>
          </div>
          <div class="form-group">
            <textarea name="description" rows="2" class="form-control" placeholder="Description"></textarea>
          </div>
          <input type="submit" name="save_materia" class="btn btn-success btn-block" value="Save Materia">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Materia</th>
            <th>Description</th>
            <th>Hora</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM materia";
          $result_materias = mysqli_query($conn, $query);    

          while ($row=mysqli_fetch_array($result_materias)) { ?>
          <tr>
            <td><?php echo $row['materia']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['hora']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
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


<?php include ('includes/footer.php') ?>