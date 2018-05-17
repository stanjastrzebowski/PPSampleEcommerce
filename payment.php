<?php
    session_start();
    //session_destroy();

    include("include/settings.php");    
    include("include/curl.php");

    //print_r($_POST);
    //print_r($_SESSION);

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $command = isset($_POST['action']) ? $_POST['action'] : "";

        //print $command."</br>";

        switch ($command) {
            case "cart-shortcut":           // from cart.php
                //echo "cart-shortcut";
                PP_payment('continue', $return_url_continue);
                break;
            case "redirect-to-paypal":      // from summary.php
                //echo "redirect-to-paypal!";
                PP_payment('commit', $return_url_commit);
                break;
            case "cart-checkout":           // from cart.php
                //echo "cart-checkout!";
                header("Location: checkout.php");
                break;
            case "product-shortcut":        // from cart.php
                //echo "product-shortcut";
                PP_payment('continue', $return_url_continue);
                break;
            case "checkout-payment-mark":   // from checkout.php
                //echo "checkout-payment-mark!";
                CheckoutMark();
                break;
            case "continue-shopping":       // from checkout.php
                header('Location: category.php');
                break;
            default:
                header('Location: index.php');
                //break;
        }
    }

    /*
    function curl_call_api($endpoint, $payload, $access_token_ready)
    {
        global $client;
        global $secret;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_POST, 1);
        // remove this option for production use as this is making the connection insecure
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $headers = array();

        if ($access_token_ready == "") {
            curl_setopt($ch, CURLOPT_USERPWD, $client . ":" . $secret);

            $headers[] = "Accept: application/json";
            $headers[] = "Accept-Language: en_US";
            $headers[] = "Content-Type: application/x-www-form-urlencoded";
        
        } else {

            $headers[] = "Content-Type: application/json";
            $headers[] = "Authorization: Bearer ".$access_token_ready;
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        //print_r($result);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
            curl_close ($ch);
            exit(1);
        }
        
        curl_close ($ch);

        $res = "";

        try {
            $res = json_decode($result, true);
        } catch (Exception $e) {
            throw new Exception('HipShop: ' .$e->getMessage());
        }
        
        return $res;
    }
*/



    function PP_payment($user_action, $return_url)
    {

        var_dump("testing error...");

// add DEBUG option configurable in config file; explore var_dump and logging capabilities in PHP
// add try {} catch {}
// add payload to a separate JSON file; use another file with variables (item details, etc.); have a scvript that's dynamically replacing the $var1, $var2 etc in json; think about the dynamic JSON for a dynamic cart
// check the deserialization of JSON response in payment.php into an object

        // the ClientID and secret values are stored in the settings.php file
        global $client;
        global $secret;

        global $return_url_commit;
        global $cancel_url;          

        try {

            $res = curl_call_api("https://api.sandbox.paypal.com/v1/oauth2/token", "grant_type=client_credentials", "");
            
            if (is_array($res)) {
                foreach($res as $key => $value) {
                    //$stringData .= "$key = $value <br/>";
                    if ($key == "access_token") {
                        $access_token = $value;
                    }
                }
            } else {
                // error
                throw new Exception("is_array(res) is not an array");
            }
        } catch (Exception $e) {
            echo 'HipShop: ' .$e->getMessage();
        }

        //echo "</br>" . $stringData . "<br/>";
        //echo "access_token: " . $access_token . "</br>";

        $_SESSION['access_token'] = $access_token;
   
        if ($user_action == 'continue') {
            $invoice_number = "INV-".rand();
            if (isset($_SESSION['invoice_number'])) {
                unset($_SESSION['invoice_number']);
            }
            $_SESSION['invoice_number'] = $invoice_number;    
        } else {
            $invoice_number = $_SESSION['invoice_number'];
        }


        if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['quantity']) and isset($_POST['size'])) {

            $product_size = $_POST['size'];
            $product_quantity = $_POST['quantity'];

            // Note: here you might want to pull the already calculated values and pass them with the payload to PayPal; doing it here just for the purpose of this demo
            $product_price    = 10;
            $product_subtotal = $product_quantity * $product_price;
            $product_total    = $product_subtotal + 4;

            $return_url = $return_url_commit;

            // In real world conditions, the payload data needs to be built dynamically (based on the customer order) and filled with the information from the database.
            // This example, for the sake of simplicity, uses a static payload filled with static data defined in the settings.php file.
            // One product (Shortcut "Buy Now") payload
            $json_data = '{
                "intent": "sale",
                "payer": {
                "payment_method": "paypal"
                },
                "application_context": {
                    "brand_name": "HipShop: REST and be API",
                    "user_action": "commit"
                },
                "transactions": [
                {
                    "amount": {
                    "total": "'.$product_total.'",
                    "currency": "USD",
                    "details": {
                        "subtotal": "'.$product_subtotal.'",
                        "tax": "2",
                        "shipping": "5",
                        "handling_fee": "1",
                        "shipping_discount": "-5",
                        "insurance": "1"
                    }
                    },
                    "description": "The payment transaction description.",
                    "custom": "HIP_EMS_90048630024435",
                    "invoice_number": "'.$invoice_number.'",
                    "payment_options": {
                        "allowed_payment_method": "INSTANT_FUNDING_SOURCE"
                    },
                    "soft_descriptor": "HPSP5786786",
                    "item_list": {
                    "items": [
                        {
                        "name": "Youth \'I Luv PayPal\' Tee",
                        "description": "Size: '.$product_size.'",
                        "quantity": "'.$product_quantity.'",
                        "price": "'.$product_price.'",
                        "tax": "2.00",
                        "sku": "1",
                        "currency": "USD"
                        }
                    ],
                    "shipping_address": {
                        "recipient_name": "'.$_SESSION['recipient_name'].'",
                        "line1": "'.$_SESSION['line1'].'",
                        "line2": "'.$_SESSION['line2'].'",
                        "city": "'.$_SESSION['city'].'",
                        "country_code": "'.$_SESSION['country_code'].'",
                        "postal_code": "'.$_SESSION['postal_code'].'",
                        "phone": "'.$_SESSION['phone'].'",
                        "state": "'.$_SESSION['state'].'"
                    }
                    }
                }
                ],
                "note_to_payer": "Contact us for any questions on your order.",
                "redirect_urls": {
                    "return_url": "'.$return_url_commit.'",
                    "cancel_url": "'.$cancel_url.'"
                }
            }';
                
        } 
        else 
        {
            // Multiple-item payload
            $json_data = '{
                "intent": "sale",
                "payer": {
                "payment_method": "paypal"
                },
                "application_context": {
                    "brand_name": "HipShop: REST and be API",
                    "user_action": "'.$user_action.'"
                },
                "transactions": [
                {
                    "amount": {
                    "total": "'.$_SESSION['total'].'",
                    "currency": "USD",
                    "details": {
                        "subtotal": "'.$_SESSION['subtotal'].'",
                        "tax": "'.$_SESSION['tax'].'",
                        "shipping": "'.$_SESSION['shipping'].'",
                        "handling_fee": "'.$_SESSION['handling'].'",
                        "shipping_discount": "'.$_SESSION['discount'].'",
                        "insurance": "'.$_SESSION['insurance'].'"
                    }
                    },
                    "description": "The payment transaction description.",
                    "custom": "EBAY_EMS_90048630024435",
                    "invoice_number": "'.$invoice_number.'",
                    "payment_options": {
                        "allowed_payment_method": "INSTANT_FUNDING_SOURCE"
                    },
                    "soft_descriptor": "ECHI5786786",
                    "item_list": {
                    "items": [
                        {
                        "name": "'.$_SESSION['item1_name'].'",
                        "description": "'.$_SESSION['item1_desc'].'",
                        "quantity": "'.$_SESSION['item1_qty'].'",
                        "price": "'.$_SESSION['item1_price'].'",
                        "tax": "0.01",
                        "sku": "1",
                        "currency": "USD"
                        },
                        {
                        "name": "'.$_SESSION['item2_name'].'",
                        "description": "'.$_SESSION['item2_desc'].'",
                        "quantity": "'.$_SESSION['item2_qty'].'",
                        "price": "'.$_SESSION['item2_price'].'",
                        "tax": "0.01",
                        "sku": "2",
                        "currency": "USD"
                        },
                        {
                        "name": "'.$_SESSION['item3_name'].'",
                        "description": "'.$_SESSION['item3_desc'].'",
                        "quantity": "'.$_SESSION['item3_qty'].'",
                        "price": "'.$_SESSION['item3_price'].'",
                        "tax": "0.01",
                        "sku": "3",
                        "currency": "USD"
                        }
                    ],
                    "shipping_address": {
                        "recipient_name": "'.$_SESSION['recipient_name'].'",
                        "line1": "'.$_SESSION['line1'].'",
                        "line2": "'.$_SESSION['line2'].'",
                        "city": "'.$_SESSION['city'].'",
                        "country_code": "'.$_SESSION['country_code'].'",
                        "postal_code": "'.$_SESSION['postal_code'].'",
                        "phone": "'.$_SESSION['phone'].'",
                        "state": "'.$_SESSION['state'].'"
                    }
                    }
                }
                ],
                "note_to_payer": "Contact us for any questions on your order.",
                "redirect_urls": {
                    "return_url": "'.$return_url.'",
                    "cancel_url": "'.$cancel_url.'"
                }
            }';

        }


        try {

            $res = curl_call_api("https://api.sandbox.paypal.com/v1/payments/payment", $json_data, $access_token);
            
            foreach($res["links"] as $elemarray) {
                foreach($elemarray as $key => $value) {
                    // $stringData2 .= "$key = $value <br/>";
                    if ($key == "href") {
                        $href = $value;
                    }
                    if ($key == "rel" && $value == "approval_url") {
                        // save the previously recorded href value as the approval_url
                        $approval_url = $href;
                    }
                }
            }
        } catch (Exception $e) {
            echo 'HipShop: ' .$e->getMessage();
        }
        
        // print "$stringData2 </br>";

        // redirect the user to the payment approval flow
        //print $approval_url;
        header("Location: ".$approval_url);
    }   



    
    function CheckoutMark()
    {
/*
        print $_POST['email_address']."</br>";    
        print $_POST['mobile_phone']."</br>";        
    
        // shipping details
        print $_POST['first_name']."</br>";
        print $_POST['last_name']."</br>";
        print $_POST['address_line1']."</br>";
        print $_POST['address_line2']."</br>";
        print $_POST['city']."</br>";
        print $_POST['zipcode']."</br>";
        print $_POST['state']."</br>";
        print $_POST['country']."</br>";
        //header("Location: summary.php");
*/
        // shipping details
        $_SESSION['recipient_name'] = $_POST['first_name']." ".$_POST['last_name'];
        $_SESSION['line1']          = $_POST['address_line1'];
        $_SESSION['line2']          = $_POST['address_line2'];
        $_SESSION['city']           = $_POST['city'];
        $_SESSION['state']          = $_POST['state'];
        $_SESSION['postal_code']    = $_POST['zipcode'];
        $_SESSION['country_code']   = $_POST['country'];
        $_SESSION['phone']          = $_POST['mobile_phone'];
        $_SESSION['email']          = $_POST['email_address'];

        if (!isset($_SESSION['checkout-payment-mark'])) {
            $_SESSION['checkout-payment-mark'] = 1;
        }

        $invoice_number = "INV-".rand();
        if (isset($_SESSION['invoice_number'])) {
            unset($_SESSION['invoice_number']);
        }
        $_SESSION['invoice_number'] = $invoice_number;

        header("Location: summary.php");
    }    
    
?>
