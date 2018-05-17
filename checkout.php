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
        <h1 class="jumbotron-heading">E-COMMERCE CHECKOUT</h1>
     </div>
</section>


<div class="container mb-4">
    <div class="row">
        <div class="col-12">
    
        <form id="payment" action="payment.php" method="post">
            <div class="paymentCont">
                <div class="headingWrap">
                    <h4 class="headingTop text-left">1. Select Your Payment Method</h4>	
                    <hr>
                </div>
                <div class="paymentWrap">
                    <div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
                        <label class="btn paymentMethod active">
                            <div class="method paypal"></div>
                            <input type="radio" name="options" checked> 
                        </label>
                        <label class="btn paymentMethod">
                            <div class="method visa"></div>
                            <input type="radio" name="options"> 
                        </label>
                        <label class="btn paymentMethod">
                            <div class="method master-card"></div>
                            <input type="radio" name="options"> 
                        </label>
                        <label class="btn paymentMethod">
                            <div class="method amex"></div>
                            <input type="radio" name="options">
                        </label>
                        <label class="btn paymentMethod">
                            <div class="method ez-cash"></div>
                            <input type="radio" name="options"> 
                        </label>
                    </div>        
                </div>
            </div>
            </br>
            </br>
            <div class="deliveryCont">
                <div class="headingWrap">
                    <h4 class="headingTop text-left">2. Select Your Delivery Method</h4>	
                    <!--<p class="text-center">Created with bootsrap button and using radio button</p>-->
                    <hr>
                </div>
                <div class="deliveryWrap">
                    <div class="btn-group deliveryBtnGroup btn-group-justified" data-toggle="buttons">
                        <label class="btn deliveryMethod active">
                            <div class="method fedex"></div>
                            <input type="radio" name="options" checked> 
                        </label>
                        <label class="btn deliveryMethod">
                            <div class="method ups"></div>
                            <input type="radio" name="options"> 
                        </label>
                        <label class="btn deliveryMethod">
                            <div class="method usps"></div>
                            <input type="radio" name="options"> 
                        </label>
                    </div>        
                </div>
            </div>
            </br>
            </br>
           <!-- <div class="deliveryCont">-->
                <div class="headingWrap">
                    <h4 class="headingTop text-left">3. Enter your shipping details</h4>	
                    <!--<p class="text-center">Created with bootsrap button and using radio button</p>-->
                    <hr>
                </div>
               
                <table>
                    <tbody>
                        <tr> 
                            <td>
                                <div class="form-group2">
                                    <label>Email address:</label> <input type="text" name="email_address" id="email_address" value="brobinson@hotmail.com" class="form-control2 input-sm" placeholder="Email address">
                                </div>
                            </td>
                            
                            <td>
                                <div class="form-group2">
                                    <label>Mobile phone:</label><input type="text" name="mobile_phone" id="mobile_phone" value="4073714321" class="form-control2 input-sm" placeholder="Mobile phone">
                                </div>
                            </td>
                        </tr>

                        <tr> 
                            <td>
                                <div class="form-group2">
                                    <label>First name:</label> <input type="text" name="first_name" id="first_name" value="Brian" class="form-control2 input-sm" placeholder="First Name">
                                </div>
                            </td>
                            
                            <td>
                                <div class="form-group2">
                                    <label>Last name:</label> <input type="text" name="last_name" id="last_name" value="Robinson" class="form-control2 input-sm" placeholder="Last Name">
                                </div>
                            </td>
                        </tr>
                        
                        <tr> 
                            <td>
                                <div class="form-group2">
                                    <label>Address line 1:</label> <input type="text" name="address_line1" id="address_line1" value="4th Floor" class="form-control2 input-sm" placeholder="Address line 1">
                                </div>
                            </td>
                            
                            <td>
                                <div class="form-group2">
                                    <label>Address line 2:</label> <input type="text" name="address_line2" id="address_line2" value="Unit #34" class="form-control2 input-sm" placeholder="Address line 2">
                                </div>
                            </td>
                        </tr>

                        <tr> 
                            <td>
                                <div class="form-group2">
                                    <label>City:</label><input type="text" name="city" id="city" value="San Jose" class="form-control2 input-sm" placeholder="city">
                                </div>
                            </td>
                            
                            <td>
                                <div class="form-group2">
                                    <label>State:</label><input type="text" name="state" id="state" value="CA" class="form-control2 input-sm" placeholder="state">
                                </div>
                            </td>
                        </tr>

                        <tr> 
                            <td>
                                <div class="form-group2">
                                    <label>Zip:</label><input type="text" name="zipcode" id="zipcode" value="95131" class="form-control2 input-sm" placeholder="zipcode">
                                </div>
                            </td>
                            
                            <td>
                                <div class="form-group2">
                                    <label>Country:</label><input type="text" name="country" id="country" value="US" class="form-control2 input-sm" placeholder="country">
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
        </form>
        </div>
    </div>
    </br>
    <div class="col mb-2">
        <div class="row">
            <div class="col-sm-12  col-md-6">
                <button type="submit" name="action" value="continue-shopping" form="payment" class="btn btn-lg btn-block btn-light">Continue Shopping</button>
            </div>
            <div class="col-sm-12 col-md-6 text-right">
                <button type="submit" name="action" value="checkout-payment-mark" form="payment" class="btn btn-lg btn-block btn-success">Order Summary</button>
            </div>
        </div>
    </div>
</div>


<!-- Footer -->
<?php include('include/footer.php'); ?>


<!-- JS -->
<script src="//code.jquery.com/jquery-3.2.1.slim.min.js" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" type="text/javascript"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" type="text/javascript"></script>

</body>
</html>
