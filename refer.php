<?php include "connection.php";
$query = "SELECT * FROM campaign";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
            body {
  margin: 0;
  padding: 0;
  background-color: #17a2b8;
  height: 100vh;
}
#login .container #login-row #login-column #login-box {
  margin-top: 120px;
  max-width: 600px;
  height: auto;
  margin-bottom: 50px;
  border: 1px solid #9C9C9C;
  background-color: #EAEAEA;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -85px;
}
    </style>
</head>
<body>
<div id="login">
        <h3 class="text-center text-white pt-5">Generate Offer link</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Share Offers Refer and Earn</h3>
                            <div class="form-group">
                            <select class="form-select" name="campaignname" id="campaignname" required>
                            <option value="" >Select Campaign</option>
                                <?php 
                                while($row=mysqli_fetch_assoc($result)){
                                    $campaignId = $row['campaign_id'];
                                    $campaignname = $row['campaignname'];   
                                        ?>
                                    <option value="<?php echo $campaignId;?>"><?php echo $campaignname;?></option>
                                    <?php }
                                ?>
                                
                                
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="paytmno" class="text-info">Enter your paytm number:</label><br>
                                <input type="number" name="paytmno" id="paytmno" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Generate Refer Link">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
if(isset($_POST['submit'])){

    $campaignId = $_POST['campaignname'];
    $paytmno = $_POST['paytmno'];
    $user = $campaignId . $paytmno;
    $url_link = "http://localhost/skrolled/earn.php";
    $link = $url_link."?campaign=" . $campaignId ."&refer=".$user;
        echo "<script>alert('Refer link generated successfully: ".$link."')</script>";
}

?>
</html>