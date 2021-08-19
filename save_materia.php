<?php

include('db.php');

if (isset($_POST['save_materia'])) {
  $Materia = $_POST['materia'];
  $description = $_POST['description'];
  
  $query = "INSERT INTO (materia, description) VALUES ('$materia', '$description')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed");
  }

  $_SESSION['message'] = 'Materia Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
