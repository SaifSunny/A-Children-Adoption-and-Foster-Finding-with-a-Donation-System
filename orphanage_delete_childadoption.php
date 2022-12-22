<?php
include './database/config.php';

$did = $_GET['id'];

  $query = "DELETE FROM for_adoption WHERE child_id='$did'";
  $query_run = mysqli_query($conn, $query);

  if ($query_run) {   

    echo "<script> 
    alert('Child profile has been Deleted.');
    window.location.href='orphanage_adoption.php';
    </script>";
    

  }else{
    echo "<script>alert('Cannot Delete Child profile');
      window.location.href='orphanage_adoption.php';
      </script>";
  }
?>