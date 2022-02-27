<?php include "connection.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
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
        <h3 class="text-center text-white pt-5">Create Campaign</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Create</h3>
                            <div class="form-group">
                                <label for="campaignname" class="text-info">Campaign Name:</label><br>
                                <input type="text" name="campaignname" id="campaignname" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="link" class="text-info">Offer 18 Link:</label><br>
                                <input type="text" name="link" id="link" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="earnpay" class="text-info">Earn Pay</label><br>
                                <input type="number" name="earnpay" id="earnpay" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="referpay" class="text-info">Refer Pay</label><br>
                                <input type="number" name="referpay" id="referpay" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="steps" class="text-info">Steps </label><br>
                                <input type="text" name="steps" id="steps" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="t_c" class="text-info">T & C</label><br>
                                <input type="text" name="t_c" id="t_c" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
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
        $campaignname = $_POST['campaignname'];
        $campaignId=uniqid();
        $link = $_POST['link'];
        $earnpay = $_POST['earnpay'];
        $referpay = $_POST['referpay'];
        $steps = $_POST['steps'];
        $t_c = $_POST['t_c'];
        if($campaignname && $link && $earnpay && $referpay && $steps && $t_c){
            $query = "INSERT INTO campaign(id,campaign_id,campaignname,olink,earnpay,referpay,steps,t_c) VALUES(NULL,'$campaignId','$campaignname','$link','$earnpay','$referpay','$steps','$t_c')";
            $result = mysqli_query($conn,$query);
            if($result){
                echo "<script>alert('Campaign Created Successfully')</script>";
            }
            else{
                //echo mysqli_error($conn);
                echo "<script>alert('Campaign Not Created')</script>";
            }
        }
        else{
            echo "<script>alert('Please Fill All Fields')</script>";
        }
    }

?>
</html>