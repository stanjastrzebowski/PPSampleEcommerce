<?php

// PayPal API credentials - you can configure them in the PayPal Developer Dashboard by logging in here: https://developer.paypal.com
$client = "<your PayPal client ID here>";
$secret = "<your PayPal secret here>";

// PayPal redirect URLs
$base_url               = "http://localhost/PPSampleEcommerce/";
$return_url_commit      = $base_url . "confirmation.php";
$return_url_continue    = $base_url . "summary.php";
$cancel_url             = $base_url . "cancel.php";

// order details - normally this data would be pulled from the DB but for the demo purposes I
$_SESSION['item1_name']  = 'PayPal Socks';
$_SESSION['item1_desc']  = 'Show off your PayPal pride with these fun siocks!';
$_SESSION['item1_qty']   = '3';
$_SESSION['item1_price'] = '12';
$_SESSION['item1_tax']   = '4.00';
$_SESSION['item1_total'] = '36.00';

$_SESSION['item2_name']  = 'PayPal Infant short-sleeve bodysuit';
$_SESSION['item2_desc']  = 'These bodysuits feature lap shoulders to make it easier for the many times a day that parents have to change baby\'s outfit.';
$_SESSION['item2_qty']   = '1';
$_SESSION['item2_price'] = '10';
$_SESSION['item2_tax']   = '1.00';
$_SESSION['item2_total'] = '10.00';

$_SESSION['item3_name']  = "Youth 'I Luv PayPal' Tee";
$_SESSION['item3_desc']  = 'A year-round essential.';
$_SESSION['item3_qty']   = '2';
$_SESSION['item3_price'] = '10';
$_SESSION['item3_tax']   = '2.00';
$_SESSION['item3_total'] = '20.00';

$_SESSION['subtotal']    = '66.00';
$_SESSION['tax']         = '7.00';
$_SESSION['shipping']    = '5.99';
$_SESSION['handling']    = '1.00';
$_SESSION['discount']    = '-5.99';
$_SESSION['insurance']   = '2.00';
$_SESSION['total']       = '76.00';

$_SESSION['delivery_method'] = 'FedEx Express';

// shipping details
$_SESSION['recipient_name'] = 'Brian Robinson';
$_SESSION['line1']          = '4th Floor';
$_SESSION['line2']          = 'Unit #34';
$_SESSION['city']           = 'San Jose';
$_SESSION['state']          = 'CA';
$_SESSION['postal_code']    = '95131';
$_SESSION['country_code']   = 'US';
$_SESSION['phone']          = '011862212345678';

?>