<?php
    session_start();

    include("include/curl.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <!-- HEAD -->
     <?php include('include/head.php'); ?>
</head>
<body>

<!-- Navigation -->
<?php include('include/navigation.php'); ?>

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Thank you for your order!</h1>
     </div>
</section>


<?php
    $invoice_number = $_SESSION['invoice_number'];
    $access_token = $_SESSION['access_token'];
    
    // We get redirected back to this page using the ReturnURL that was set in the payments/payment payload, we should receive the TOKEN, Payer ID & Payment ID
    if(isset($_GET["token"]) && isset($_GET["PayerID"]) && isset($_GET["paymentId"]))
    {
        $token = $_GET["token"];
        $payerid = $_GET["PayerID"];
        $paymentId = $_GET["paymentId"];
    } 
    // We arrive here from the the three parameters are passed
    elseif(isset($_SESSION["token"]) && isset($_SESSION["PayerID"]) && isset($_SESSION["paymentId"]))
    {
        $token = $_SESSION["token"];
        $payerid = $_SESSION["PayerID"];
        $paymentId = $_SESSION["paymentId"];
    } 
    else 
    {
        header('Location: index.php');
    }

    $endpoint_url = "https://api.sandbox.paypal.com/v1/payments/payment/".$paymentId."/execute";
    $payload_data = "{\n  \"payer_id\": \"".$payerid."\"\n}";
    
    try {
        // Execute the payment (CurlCallAPI definition in include/curl.php)
        $res = CurlCallAPI($endpoint_url, $payload_data, $access_token);
        
    } catch (Exception $e) {
        echo 'HipShop: ' .$e->getMessage();
    }

    if ($res["transactions"][0]["related_resources"][0]["sale"]["state"] == "completed")
    {
?>

<div class="container mb-4">
    <div class="row">
         
        <!-- Order details -->
        <div class="col-12 col-lg-6">
            <div class="card bg-light mb-3">
                <div class="card-body">
<?php
                    print "<p>Invoice number is $invoice_number.</br>";
                    print "You will receive an email confirmation shortly.</br></br>";
?>
                    <a href="index.php">Back to the homepage</a>
                    </p>
                 </div>
            </div>
        </div>

        <!-- Shipping details -->
        <div class="col-12 col-lg-6">
            </br></br>
            <center><img src="img/shipping.png" ></center>
        </div>
    </div>    
</div>


<?php
    }
?>

<!-- Footer -->
<?php include('include/footer.php'); ?>

<!-- JS -->
<script src="//code.jquery.com/jquery-3.2.1.slim.min.js" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" type="text/javascript"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" type="text/javascript"></script>

</body>
</html>
