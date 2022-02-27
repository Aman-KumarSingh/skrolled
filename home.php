<?php 
     include "connection.php";
        $query = "SELECT * FROM campaign";
        $result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
        <h3 class="text-center text-white pt-5">Earn Now</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12"  >
                        
                    <?php 
                    while($row=mysqli_fetch_assoc($result)){
                        $campaignId = $row['campaign_id'];
                        $campaignname = $row['campaignname'];
                        $earnpay = $row['earnpay'];   
                            ?>
                         <div class="card text-center m-5 p-5" >
                           <div>
                               <h4><?php echo $campaignname;?></h4>
                           </div>
                           <div>
                               <h6>Install, Register and Get Instant Paytm Cash</h6>
                           </div>
                            <div>
                                <h6>Offer Amount: <?php echo $earnpay;?><h6>
                            </div>
                            <div>
                                <a href="earn.php?campaign=<?php echo $campaignId;  ?>"><button class="btn btn-primary">Claim Now</button></a>
                              
                            </div>
                           </div>
                           <?php  }?>
                           <div class="m-3">
                        <div class="form-group text-center">
                                <a href="refer.php"><button class="btn btn-info btn-md" type="button">Create Refferal Link</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</body>
</html>