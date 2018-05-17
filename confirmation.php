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
    
    //We get redirected back to this page using the ReturnURL that was set in the payments/payment payload, we should receive EC-TOKEN, Payer ID & Payment ID
    if(isset($_GET["token"]) && isset($_GET["PayerID"]) && isset($_GET["paymentId"]))
    {
        $token = $_GET["token"];
        $payerid = $_GET["PayerID"];
        $paymentId = $_GET["paymentId"];
/*
        //open connection
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/payments/payment/".$paymentId."/execute");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n  \"payer_id\": \"".$payerid."\"\n}");
        curl_setopt($ch, CURLOPT_POST, 1);
        // remove this option for production use as this is making the connection insecure
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $headers = array();
        $headers[] = "Content-Type: application/json";
        $headers[] = "Authorization: Bearer ".$access_token;
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close ($ch);

        $res = json_decode($result, true);
        
        if (is_array($res)) {
            foreach($res as $key => $value) {
                $stringData .= "$key = $value <br/>";
            }
        }
        //print "$stringData </br>";
    */

        $endpoint_url = "https://api.sandbox.paypal.com/v1/payments/payment/".$paymentId."/execute";
        $payload_data = "{\n  \"payer_id\": \"".$payerid."\"\n}";
        try {

            $res = curl_call_api($endpoint_url, $payload_data, $access_token);
            
        } catch (Exception $e) {
            echo 'HipShop: ' .$e->getMessage();
        }

        foreach($res["transactions"] as $elemarray) {
            foreach($elemarray as $key => $value) {
                $stringData2 .= "$key = $value <br/>";
                if ($key == "item_list") {
                    foreach($value as $key2 => $value2) {
                        $stringData4 .= "$key2 = $value2 <br/>";
                        if ($key2 == "sale") {
                            foreach($value2 as $key3 => $value3) {
                                $stringData5 .= "$key3 = $value3 <br/>";
                            }
                        }
        
                    }
                }
                if ($key == "related_resources") {
                    foreach($value[0] as $key2 => $value2) {
                        $stringData5 .= "$key2 = $value2 <br/>";
                        if ($key2 == "sale") {
                            foreach($value2 as $key3 => $value3) {
                                $stringData6 .= "$key3 = $value3 <br/>";
                            }
                        }
        
                    }
                }
            }
        }
        foreach($res["links"] as $elemarray) {
            foreach($elemarray as $key => $value) {
                $stringData3 .= "$key = $value <br/>";
            }
        }
        /*
        print "$stringData2 </br>";
        print "$stringData3 </br>";
        print "$stringData4 </br>";
        print "$stringData5 </br>";
        print "$stringData6 </br>";
        */

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
    }
    elseif(isset($_SESSION["token"]) && isset($_SESSION["PayerID"]) && isset($_SESSION["paymentId"]))
    {
        //Note: we haven't received any payment yet.
        //$token = $_GET["token"];
        //$payerid = $_GET["PayerID"];
        //$paymentId = $_GET["paymentId"];

        $token = $_SESSION["token"];
        $payerid = $_SESSION["PayerID"];
        $paymentId = $_SESSION["paymentId"];

        //open connection
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/payments/payment/".$paymentId."/execute");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n  \"payer_id\": \"".$payerid."\"\n}");
        curl_setopt($ch, CURLOPT_POST, 1);
        // remove this option for production use as this is making the connection insecure
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $headers = array();
        $headers[] = "Content-Type: application/json";
        $headers[] = "Authorization: Bearer ".$access_token;
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close ($ch);

        $res = json_decode($result, true);
        
        if (is_array($res)) {
            foreach($res as $key => $value) {
                $stringData .= "$key = $value <br/>";
            }
        }
        //print "$stringData </br>";
    
        foreach($res["transactions"] as $elemarray) {
            foreach($elemarray as $key => $value) {
                $stringData2 .= "$key = $value <br/>";
                if ($key == "item_list") {
                    foreach($value as $key2 => $value2) {
                        $stringData4 .= "$key2 = $value2 <br/>";
                        if ($key2 == "sale") {
                            foreach($value2 as $key3 => $value3) {
                                $stringData5 .= "$key3 = $value3 <br/>";
                            }
                        }
        
                    }
                }
                if ($key == "related_resources") {
                    foreach($value[0] as $key2 => $value2) {
                        $stringData5 .= "$key2 = $value2 <br/>";
                        if ($key2 == "sale") {
                            foreach($value2 as $key3 => $value3) {
                                $stringData6 .= "$key3 = $value3 <br/>";
                            }
                        }
        
                    }
                }
            }
        }
        foreach($res["links"] as $elemarray) {
            foreach($elemarray as $key => $value) {
                $stringData3 .= "$key = $value <br/>";
            }
        }
        /*
        print "$stringData2 </br>";
        print "$stringData3 </br>";
        print "$stringData4 </br>";
        print "$stringData5 </br>";
        print "$stringData6 </br>";
        */

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
    } else {
        header('Location: index.php');
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
