<?php
    date_default_timezone_set("Asia/Dhaka");

if(isset($_POST['submit'])){

    $donner = $_POST['donner'];
    $donation_to = $_POST['donation_to'];
    $donation = $_POST['donation'];
    $date = date("Y/m/d h:i:sa");

    $query2 = "INSERT INTO donations(`donation_amount`, donation_reciever_id, doner_name, date)
    VALUES ('$donation', '$donation_to', '$donner', '$date')";
    $query_run2 = mysqli_query($conn, $query2);
                    
    if ($query_run2) {
        echo "<script>alert('Donation Successfully Send.');
      </script>";
    } 
    else {
        echo "<script>alert('Could not Send Donation.');
        </script>";
    }
  
  
  }

?>

<div class="modal fade" id="modal-donate-now" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    style="padding-top:0px;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Make a Donation</h4>
            </div>
            <div class="modal-body">
                <div class="donation-form-outer">
                    <form action="" method="post">
                        <!--Form Portlet-->
                        <h3>Donner Name</h3>
                        <div class="form-group col-xs-12">
                            <input type="text" placeholder="Enter Donner Name" value="" name="donner">
                        </div>
                        <h3>Donation To</h3>
                        <div class="form-group col-xs-12">
                            <select id="donation_to" name="donation_to" required>
                                <option>-- Select Orphanage --</option>
                                <?php
                                    $br_option = "SELECT * FROM orphanage";
                                    $br_option_run = mysqli_query($conn, $br_option);

                                    if (mysqli_num_rows($br_option_run) > 0) {
                                        foreach ($br_option_run as $row2) {
                                    ?>
                                <option value="<?php echo $row2['orphanage_id']; ?>">
                                    <?php echo $row2['orphanage_name']."(".$row2['address']." ".$row2['city']."-".$row2['zip'].")"; ?></option>
                                <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <h3>Donation Amount</h3>
                        <div class="row clearfix">


                            <div class="form-group col-xs-12">
                                <input type="text" placeholder="Other Amount" value="" name="donation">
                            </div>
                            <div class="text-center">
                                <button class="thm-btn mt_30 mb_30" type="submit" name="submit">Donate
                                    Now</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>