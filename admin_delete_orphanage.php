<?php
include './database/config.php';

$did = $_GET['id'];

  $query = "DELETE FROM orphanage WHERE orphanage_id='$did'";
  $query_run = mysqli_query($conn, $query);

  if ($query_run) {   

    echo "<script> 
    alert('Orphanage Successfully Deleted.');
    window.location.href='admin_orphanages.php';
    </script>";
    

  }else{
    echo "<script>alert('Cannot Delete Orphanage');
      window.location.href='admin_orphanages.php';
      </script>";
  }
?>