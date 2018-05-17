<?php
    session_start();
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
        <h1 class="jumbotron-heading">Order Summary</h1>
     </div>
</section>
<!--
<div class="container mb-4">
    <div class="row">
        <p>You chose to cancel this PP transaction. Please let us know if you encountered any difficulties during the checkout process. We'll be happy to assist you!</p>
        <a href="index.php">Click here to return to homepage</a>
    </div>
</div>
-->

<?php
    date_default_timezone_set('America/Los_Angeles');    

    //We get redirected back to this page using the ReturnURL that was set in the payments/payment payload, we should receive EC-TOKEN, Payer ID & Payment ID
    if(isset($_GET["token"]) && isset($_GET["PayerID"]) && isset($_GET["paymentId"]))
    {
        //Note: we haven't received any payment yet.
        $token        = $_GET["token"];
        $payerid      = $_GET["PayerID"];
        $paymentId    = $_GET["paymentId"];

        $_SESSION['token']     = $token;
        $_SESSION['PayerID']   = $payerid;
        $_SESSION['paymentId'] = $paymentId;
        $access_token = $_SESSION['access_token'];
        
/*
        // order details
        $item1_name = $_SESSION['item1_name'];
        $item1_desc = $_SESSION['item1_desc'];
        $item1_qty  = $_SESSION['item1_qty'];
        $item1_price= $_SESSION['item1_price'];
        
        $item2_name = $_SESSION['item2_name'];
        $item2_desc = $_SESSION['item2_desc'];
        $item2_qty  = $_SESSION['item2_qty'];
        $item2_price= $_SESSION['item2_price'];

        $subtotal   = $_SESSION['subtotal'];
        $tax        = $_SESSION['tax'];
        $shipping   = $_SESSION['shipping'];
        $handling   = $_SESSION['handling'];
        $discount   = $_SESSION['discount'];
        $insurance  = $_SESSION['insurance'];
        $total      = $_SESSION['total'];

        // shipping details
        $recipient_name = $_SESSION['recipient_name'];
        $line1          = $_SESSION['line1'];
        $line2          = $_SESSION['line2'];
        $city           = $_SESSION['city'];
        $country_code   = $_SESSION['country_code'];
        $postal_code    = $_SESSION['postal_code'];
        $state          = $_SESSION['state'];
*/         
        /*
        print $token."</br>";
        print $payerid."</br>";
        print $paymentId."</br>";
        print $access_token."</br>";
        */
    //}  else {
    //    header('Location: index.php');
    //} elseif (isset($_SESSION['checkout-payment-mark']) && $_SESSION['checkout-payment-mark'] == 1) {
    //    $_SESSION['checkout-payment-mark'] = 0;
    //    $_SESSION['PP_payment'] = 1;
    }
?>        

<div class="container">
    <!--<div class="row">-->

        <!-- Order details -->
      <!--  <div class="col-12 col-lg-6">
            <div class="card bg-light mb-3">
                <div class="card-body">-->

        <!--<div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">-->
            <div class="row">
                <!--<div class="col-xs-6 col-sm-6 col-md-6">-->
                <div class="col-12 col-lg-6">   
                    <address>
                        <strong><?php print $_SESSION['recipient_name']; ?></strong>
                        <br>
                        <?php print $_SESSION['line1']." ".$_SESSION['line2']; ?>
                        <br>
                        <?php print $_SESSION['city'].", ".$_SESSION['state']." ".$_SESSION['postal_code']; ?>
                        <br>
                        <abbr title="Phone">P:</abbr> <?php print $_SESSION['phone']; ?>
                    </address>
                </div>
                <!--<div class="col-xs-6 col-sm-6 col-md-6 text-right">-->
                <div class="col-12 col-lg-6 text-right">
                    <p>
                        <em>Date: <?php echo date('F j, Y, H:i:s'); ?></em>
                    </p>
                    <p>
                        <em>Receipt #: <?php print $_SESSION['invoice_number']; ?></em>
                    </p>
                    <p>
                        <em>Delivery: <?php print $_SESSION['delivery_method']; ?></em>
                    </p>
                </div>
            </div>
            </br>
            </br>
            <div class="row">
                <div class="text-center">
                    <h1></h1>
                </div>
                </span>
                <!--<table class="table table-hover">-->
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>#</th>
                            <th class="text-right">Price</th>
                            <th class="text-right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-md-7"><em><?php print $_SESSION['item1_name']; ?></em></h4></td>
                            <td class="col-md-1" style="text-align: left"> <?php print $_SESSION['item1_qty']; ?> </td>
                            <td class="col-md-2 text-right"><?php print $_SESSION['item1_price']." $"; ?></td>
                            <td class="col-md-2 text-right"><?php print $_SESSION['item1_total']." $"; ?></td>
                        </tr>
                        <tr>
                            <td class="col-md-7"><em><?php print $_SESSION['item2_name']; ?></em></h4></td>
                            <td class="col-md-1" style="text-align: left"> <?php print $_SESSION['item2_qty']; ?> </td>
                            <td class="col-md-2 text-right"><?php print $_SESSION['item2_price']." $"; ?></td>
                            <td class="col-md-2 text-right"><?php print $_SESSION['item2_total']." $"; ?></td>
                        </tr>
                        <tr>
                            <td class="col-md-7"><em><?php print $_SESSION['item3_name']; ?></em></h4></td>
                            <td class="col-md-1" style="text-align: left"> <?php print $_SESSION['item3_qty']; ?> </td>
                            <td class="col-md-2 text-right"><?php print $_SESSION['item3_price']." $"; ?></td>
                            <td class="col-md-2 text-right"><?php print $_SESSION['item3_total']." $"; ?></td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="col-md-2 text-right">
                                <strong>Subtotal: </strong>
                                </br>
                                <strong>Tax: </strong>
                                </br>
                                <strong>Shipping: </strong>
                                </br>
                                <strong>Handling: </strong>
                                </br>
                                <strong>Discount: </strong>
                                </br>
                                <strong>Insurance: </strong>
                            </td>
                            <td class="col-md-2 text-right">
                                <strong><?php print $_SESSION['subtotal']." $"; ?></strong>
                                </br>
                                <strong><?php print $_SESSION['tax']." $"; ?></strong>
                                </br>
                                <strong><?php print $_SESSION['shipping']." $"; ?></strong>
                                </br>
                                <strong><?php print $_SESSION['handling']." $"; ?></strong>
                                </br>
                                <strong><?php print $_SESSION['discount']." $"; ?></strong>
                                </br>
                                <strong><?php print $_SESSION['insurance']." $"; ?></strong>
                            </td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="col-md-2 text-right"><h4><strong>Total: </strong></h4></td>
                            <td class="col-md-2 text-right text-success"><h4><strong><?php print $_SESSION['total']."$"; ?></strong></h4></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="row">
                <div class="col-12">
                
<?php //
if (isset($_SESSION['checkout-payment-mark'])) {
    unset($_SESSION['checkout-payment-mark']);
?>
                    <form id="payment2" action="payment.php" method="post">
                        <button type="submit" name="action" value="redirect-to-paypal" form="payment2" class="btn btn-lg btn-block btn-success">Pay Now</button>
                    </form>
                         <!--<a href="payment.php" class="btn btn-success btn-lg btn-block">Pay Now</a>-->
<?php
} else {
?>
                    
                    <a href="confirmation.php" class="btn btn-success btn-lg btn-block">Pay Now</a>
<?php
}
?>

                </div>
            </div>
    </div>

<!--</div>-->


<!-- Footer -->
<?php print "</br></br>"; include('include/footer.php'); ?>


<!-- JS -->
<script src="//code.jquery.com/jquery-3.2.1.slim.min.js" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" type="text/javascript"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" type="text/javascript"></script>

</body>
</html>
