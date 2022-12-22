<?php
include './database/config.php';

$did = $_GET['id'];

  $query = "UPDATE for_adoption SET `adopted` = '1' WHERE child_id ='$did'";
  $query_run = mysqli_query($conn, $query);

  if ($query_run) {   

    echo "<script> 
    alert('Congratulations on a Successfull Adoption');
    window.location.href='orphanage_adoption.php';
    </script>";
    

  }else{
    echo "<script>alert('Cannot Confirm Adoption Request');
      window.location.href='orphanage_adoption.php';
      </script>";
  }
?>