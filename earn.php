<?php include "connection.php";
if(isset($_GET['refer'])){
    $refer=$_GET['refer'];
}
else{
    $refer="none";
}
$campaignId = $_GET['campaign'];
$query = "SELECT * FROM campaign WHERE campaign_id='$campaignId' limit 1";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Earn</title>
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
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <?php $row = mysqli_fetch_assoc($result); ?>
                            <h3 class="text-center text-info">Install, Register And Get Rs.<?php echo $row['earnpay']; ?> Paytm Cash Instant</h3>
                            <div class="form-group">
                                <label for="paytmno" class="text-info">Enter your paytm number:</label><br>
                                <input type="number" name="paytmno" id="paytmno" class="form-control">
                            </div>
                            <div class="form-group text-center">
                                <h3><?php echo $row['campaignname']; ?></h3>
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-info btn-md" value="submit" name="submit">Submit</button>
                            </div>

                        </form>
                        <div>
                            <h4>Steps</h4>
                            <p><?php echo $row['steps']; ?></p>
                        </div>
                        <div>
                            <h4>Terms & Conditions</h4>
                            <p><?php echo $row['t_c']; ?></p>

                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
if (isset($_POST['submit'])) {
    $paytmno = $_POST['paytmno'];
    $query1 = "SELECT * FROM campaign WHERE campaign_id='$campaignId' limit 1";
    $result1 = mysqli_query($conn, $query1);
    $row1 = mysqli_fetch_assoc($result1);
    $link = $row1['olink'];
    $user = $campaignId . $paytmno;
    //we can customised this link and parameter according to o18 link
    $o18link = $link . "?paytmno=" . $paytmno . "&campaign=" . $campaignId . "&a=" . $user . "&refer=".$refer;
    $query2 = "SELECT * FROM earn_data WHERE earn_id='$user' limit 1";
    $result2 = mysqli_query($conn, $query2);
    $row2 = mysqli_fetch_assoc($result2);
    if (mysqli_num_rows($result2) > 0) {
        echo "<script>alert('You have already registered for this campaign');</script>";
    } else {
        $query4 = "INSERT INTO earn_data (id,campaign_id,earn_id,refer_id) VALUES (NULL,'$campaignId','$user','$refer')";
        $result4 = mysqli_query($conn, $query4);
        if ($result4) {
            echo "<script>alert('You will be redirected to this link: ". $o18link ." we can customised this link and parameter according to o18 link');</script>";
        } else {
            echo "<script>alert('Something went wrong');</script>";
        }
    }
}


?>

</html>