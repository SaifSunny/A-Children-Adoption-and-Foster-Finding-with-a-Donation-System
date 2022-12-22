<?php
include './database/config.php';

$did = $_GET['id'];

  $query = "UPDATE for_foster SET `fostered` = '1' WHERE child_id ='$did'";
  $query_run = mysqli_query($conn, $query);

  if ($query_run) {   

    echo "<script> 
    alert('Congratulations on a Successfull Fostering');
    window.location.href='orphanage_foster.php';
    </script>";
    

  }else{
    echo "<script>alert('Cannot Confirm fostering Request');
      window.location.href='orphanage_foster.php';
      </script>";
  }
?>