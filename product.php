<!DOCTYPE html>
<html lang="en">
<head>
     <!-- HEAD -->
     <?php include('include/head.php'); ?>

       <script src="https://www.paypalobjects.com/api/checkout.js"></script>
</head>
<body>

<!-- Navigation -->
<?php include('include/navigation.php'); ?>

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">E-COMMERCE PRODUCT</h1>
        <p class="lead text-muted mb-0">Your standard product page, with settings, description and reviews. We added the PayPal Shortcut button here which allows a quick and seamless purchase of the product without going through the standard, lengthy checkout experience.</p>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="category.php">Category</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Product</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <!-- Image -->
        <div class="col-12 col-lg-6">
            <div class="card bg-light mb-3">
                <div class="card-body">
                    <a href="" data-toggle="modal" data-target="#productModal">
                        <img class="img-fluid" src="img/PayPal-tshirt_800x800.jpg" />
                        <p class="text-center">Zoom</p>
                    </a>
                </div>
            </div>
        </div>

        <!-- Add to cart -->
        <div class="col-12 col-lg-6 add_to_cart_block">
            <div class="card bg-light mb-3">
                <div class="card-body">
                    <p class="price">10.00 $</p>
                    <p class="price_discounted">15.90 $</p>

                    <!--<form method="get" action="cart.php">-->
                    <form id="payment" action="payment.php" method="post">
                        <div class="form-group">
                            <label for="size">Size</label>
                            <select class="custom-select" id="size" name="size">
                                <!--<option selected>Select</option>-->
                                <option selected value="Small">Small</option>
                                <option value="Medium">Medium</option>
                                <option value="Large">Large</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Quantity :</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control"  id="quantity" name="quantity" min="1" max="100" value="1">
                                <div class="input-group-append">
                                    <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="btn-group">
                            <a href="cart.php" class="btn btn-success btn-lg" style="width: 232px; height: 48px; border-radius: 5px;">
                                <i class="fa fa-shopping-cart"></i> Add To Cart
                            </a>
                            <label class="label-or">or</label>
                            <div class="xo-button-wrap gold " style="width: 232px;">
                                <button type="submit" name="action" value="product-shortcut" form="payment" pa-tracked="1" >
                                    <img class="paypal-button-logo paypal-button-logo-pp paypal-button-logo-gold" alt="pp" src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMzIiIHZpZXdCb3g9IjAgMCAyNCAzMiIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBwcmVzZXJ2ZUFzcGVjdFJhdGlvPSJ4TWluWU1pbiBtZWV0Ij4KICAgIDxwYXRoIGZpbGw9IiMwMDljZGUiIGQ9Ik0gMjAuOTA1IDkuNSBDIDIxLjE4NSA3LjQgMjAuOTA1IDYgMTkuNzgyIDQuNyBDIDE4LjU2NCAzLjMgMTYuNDExIDIuNiAxMy42OTcgMi42IEwgNS43MzkgMi42IEMgNS4yNzEgMi42IDQuNzEgMy4xIDQuNjE1IDMuNiBMIDEuMzM5IDI1LjggQyAxLjMzOSAyNi4yIDEuNjIgMjYuNyAyLjA4OCAyNi43IEwgNi45NTYgMjYuNyBMIDYuNjc1IDI4LjkgQyA2LjU4MSAyOS4zIDYuODYyIDI5LjYgNy4yMzYgMjkuNiBMIDExLjM1NiAyOS42IEMgMTEuODI1IDI5LjYgMTIuMjkyIDI5LjMgMTIuMzg2IDI4LjggTCAxMi4zODYgMjguNSBMIDEzLjIyOCAyMy4zIEwgMTMuMjI4IDIzLjEgQyAxMy4zMjIgMjIuNiAxMy43OSAyMi4yIDE0LjI1OCAyMi4yIEwgMTQuODIxIDIyLjIgQyAxOC44NDUgMjIuMiAyMS45MzUgMjAuNSAyMi44NzEgMTUuNSBDIDIzLjMzOSAxMy40IDIzLjE1MyAxMS43IDIyLjAyOSAxMC41IEMgMjEuNzQ4IDEwLjEgMjEuMjc5IDkuOCAyMC45MDUgOS41IEwgMjAuOTA1IDkuNSI+PC9wYXRoPgogICAgPHBhdGggZmlsbD0iIzAxMjE2OSIgZD0iTSAyMC45MDUgOS41IEMgMjEuMTg1IDcuNCAyMC45MDUgNiAxOS43ODIgNC43IEMgMTguNTY0IDMuMyAxNi40MTEgMi42IDEzLjY5NyAyLjYgTCA1LjczOSAyLjYgQyA1LjI3MSAyLjYgNC43MSAzLjEgNC42MTUgMy42IEwgMS4zMzkgMjUuOCBDIDEuMzM5IDI2LjIgMS42MiAyNi43IDIuMDg4IDI2LjcgTCA2Ljk1NiAyNi43IEwgOC4yNjcgMTguNCBMIDguMTczIDE4LjcgQyA4LjI2NyAxOC4xIDguNzM1IDE3LjcgOS4yOTYgMTcuNyBMIDExLjYzNiAxNy43IEMgMTYuMjI0IDE3LjcgMTkuNzgyIDE1LjcgMjAuOTA1IDEwLjEgQyAyMC44MTIgOS44IDIwLjkwNSA5LjcgMjAuOTA1IDkuNSI+PC9wYXRoPgogICAgPHBhdGggZmlsbD0iIzAwMzA4NyIgZD0iTSA5LjQ4NSA5LjUgQyA5LjU3NyA5LjIgOS43NjUgOC45IDEwLjA0NiA4LjcgQyAxMC4yMzIgOC43IDEwLjMyNiA4LjYgMTAuNTEzIDguNiBMIDE2LjY5MiA4LjYgQyAxNy40NDIgOC42IDE4LjE4OSA4LjcgMTguNzUzIDguOCBDIDE4LjkzOSA4LjggMTkuMTI3IDguOCAxOS4zMTQgOC45IEMgMTkuNTAxIDkgMTkuNjg4IDkgMTkuNzgyIDkuMSBDIDE5Ljg3NSA5LjEgMTkuOTY4IDkuMSAyMC4wNjMgOS4xIEMgMjAuMzQzIDkuMiAyMC42MjQgOS40IDIwLjkwNSA5LjUgQyAyMS4xODUgNy40IDIwLjkwNSA2IDE5Ljc4MiA0LjYgQyAxOC42NTggMy4yIDE2LjUwNiAyLjYgMTMuNzkgMi42IEwgNS43MzkgMi42IEMgNS4yNzEgMi42IDQuNzEgMyA0LjYxNSAzLjYgTCAxLjMzOSAyNS44IEMgMS4zMzkgMjYuMiAxLjYyIDI2LjcgMi4wODggMjYuNyBMIDYuOTU2IDI2LjcgTCA4LjI2NyAxOC40IEwgOS40ODUgOS41IFoiPjwvcGF0aD4KPC9zdmc+Cg==">
                                    <img class="paypal-button-logo paypal-button-logo-paypal paypal-button-logo-gold" alt="paypal" src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwIiBoZWlnaHQ9IjMyIiB2aWV3Qm94PSIwIDAgMTAwIDMyIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaW5ZTWluIG1lZXQiPgogICAgPHBhdGggZmlsbD0iIzAwMzA4NyIgZD0iTSAxMiA0LjkxNyBMIDQuMiA0LjkxNyBDIDMuNyA0LjkxNyAzLjIgNS4zMTcgMy4xIDUuODE3IEwgMCAyNS44MTcgQyAtMC4xIDI2LjIxNyAwLjIgMjYuNTE3IDAuNiAyNi41MTcgTCA0LjMgMjYuNTE3IEMgNC44IDI2LjUxNyA1LjMgMjYuMTE3IDUuNCAyNS42MTcgTCA2LjIgMjAuMjE3IEMgNi4zIDE5LjcxNyA2LjcgMTkuMzE3IDcuMyAxOS4zMTcgTCA5LjggMTkuMzE3IEMgMTQuOSAxOS4zMTcgMTcuOSAxNi44MTcgMTguNyAxMS45MTcgQyAxOSA5LjgxNyAxOC43IDguMTE3IDE3LjcgNi45MTcgQyAxNi42IDUuNjE3IDE0LjYgNC45MTcgMTIgNC45MTcgWiBNIDEyLjkgMTIuMjE3IEMgMTIuNSAxNS4wMTcgMTAuMyAxNS4wMTcgOC4zIDE1LjAxNyBMIDcuMSAxNS4wMTcgTCA3LjkgOS44MTcgQyA3LjkgOS41MTcgOC4yIDkuMzE3IDguNSA5LjMxNyBMIDkgOS4zMTcgQyAxMC40IDkuMzE3IDExLjcgOS4zMTcgMTIuNCAxMC4xMTcgQyAxMi45IDEwLjUxNyAxMy4xIDExLjIxNyAxMi45IDEyLjIxNyBaIj48L3BhdGg+CiAgICA8cGF0aCBmaWxsPSIjMDAzMDg3IiBkPSJNIDM1LjIgMTIuMTE3IEwgMzEuNSAxMi4xMTcgQyAzMS4yIDEyLjExNyAzMC45IDEyLjMxNyAzMC45IDEyLjYxNyBMIDMwLjcgMTMuNjE3IEwgMzAuNCAxMy4yMTcgQyAyOS42IDEyLjAxNyAyNy44IDExLjYxNyAyNiAxMS42MTcgQyAyMS45IDExLjYxNyAxOC40IDE0LjcxNyAxNy43IDE5LjExNyBDIDE3LjMgMjEuMzE3IDE3LjggMjMuNDE3IDE5LjEgMjQuODE3IEMgMjAuMiAyNi4xMTcgMjEuOSAyNi43MTcgMjMuOCAyNi43MTcgQyAyNy4xIDI2LjcxNyAyOSAyNC42MTcgMjkgMjQuNjE3IEwgMjguOCAyNS42MTcgQyAyOC43IDI2LjAxNyAyOSAyNi40MTcgMjkuNCAyNi40MTcgTCAzMi44IDI2LjQxNyBDIDMzLjMgMjYuNDE3IDMzLjggMjYuMDE3IDMzLjkgMjUuNTE3IEwgMzUuOSAxMi43MTcgQyAzNiAxMi41MTcgMzUuNiAxMi4xMTcgMzUuMiAxMi4xMTcgWiBNIDMwLjEgMTkuMzE3IEMgMjkuNyAyMS40MTcgMjguMSAyMi45MTcgMjUuOSAyMi45MTcgQyAyNC44IDIyLjkxNyAyNCAyMi42MTcgMjMuNCAyMS45MTcgQyAyMi44IDIxLjIxNyAyMi42IDIwLjMxNyAyMi44IDE5LjMxNyBDIDIzLjEgMTcuMjE3IDI0LjkgMTUuNzE3IDI3IDE1LjcxNyBDIDI4LjEgMTUuNzE3IDI4LjkgMTYuMTE3IDI5LjUgMTYuNzE3IEMgMzAgMTcuNDE3IDMwLjIgMTguMzE3IDMwLjEgMTkuMzE3IFoiPjwvcGF0aD4KICAgIDxwYXRoIGZpbGw9IiMwMDMwODciIGQ9Ik0gNTUuMSAxMi4xMTcgTCA1MS40IDEyLjExNyBDIDUxIDEyLjExNyA1MC43IDEyLjMxNyA1MC41IDEyLjYxNyBMIDQ1LjMgMjAuMjE3IEwgNDMuMSAxMi45MTcgQyA0MyAxMi40MTcgNDIuNSAxMi4xMTcgNDIuMSAxMi4xMTcgTCAzOC40IDEyLjExNyBDIDM4IDEyLjExNyAzNy42IDEyLjUxNyAzNy44IDEzLjAxNyBMIDQxLjkgMjUuMTE3IEwgMzggMzAuNTE3IEMgMzcuNyAzMC45MTcgMzggMzEuNTE3IDM4LjUgMzEuNTE3IEwgNDIuMiAzMS41MTcgQyA0Mi42IDMxLjUxNyA0Mi45IDMxLjMxNyA0My4xIDMxLjAxNyBMIDU1LjYgMTMuMDE3IEMgNTUuOSAxMi43MTcgNTUuNiAxMi4xMTcgNTUuMSAxMi4xMTcgWiI+PC9wYXRoPgogICAgPHBhdGggZmlsbD0iIzAwOWNkZSIgZD0iTSA2Ny41IDQuOTE3IEwgNTkuNyA0LjkxNyBDIDU5LjIgNC45MTcgNTguNyA1LjMxNyA1OC42IDUuODE3IEwgNTUuNSAyNS43MTcgQyA1NS40IDI2LjExNyA1NS43IDI2LjQxNyA1Ni4xIDI2LjQxNyBMIDYwLjEgMjYuNDE3IEMgNjAuNSAyNi40MTcgNjAuOCAyNi4xMTcgNjAuOCAyNS44MTcgTCA2MS43IDIwLjExNyBDIDYxLjggMTkuNjE3IDYyLjIgMTkuMjE3IDYyLjggMTkuMjE3IEwgNjUuMyAxOS4yMTcgQyA3MC40IDE5LjIxNyA3My40IDE2LjcxNyA3NC4yIDExLjgxNyBDIDc0LjUgOS43MTcgNzQuMiA4LjAxNyA3My4yIDYuODE3IEMgNzIgNS42MTcgNzAuMSA0LjkxNyA2Ny41IDQuOTE3IFogTSA2OC40IDEyLjIxNyBDIDY4IDE1LjAxNyA2NS44IDE1LjAxNyA2My44IDE1LjAxNyBMIDYyLjYgMTUuMDE3IEwgNjMuNCA5LjgxNyBDIDYzLjQgOS41MTcgNjMuNyA5LjMxNyA2NCA5LjMxNyBMIDY0LjUgOS4zMTcgQyA2NS45IDkuMzE3IDY3LjIgOS4zMTcgNjcuOSAxMC4xMTcgQyA2OC40IDEwLjUxNyA2OC41IDExLjIxNyA2OC40IDEyLjIxNyBaIj48L3BhdGg+CiAgICA8cGF0aCBmaWxsPSIjMDA5Y2RlIiBkPSJNIDkwLjcgMTIuMTE3IEwgODcgMTIuMTE3IEMgODYuNyAxMi4xMTcgODYuNCAxMi4zMTcgODYuNCAxMi42MTcgTCA4Ni4yIDEzLjYxNyBMIDg1LjkgMTMuMjE3IEMgODUuMSAxMi4wMTcgODMuMyAxMS42MTcgODEuNSAxMS42MTcgQyA3Ny40IDExLjYxNyA3My45IDE0LjcxNyA3My4yIDE5LjExNyBDIDcyLjggMjEuMzE3IDczLjMgMjMuNDE3IDc0LjYgMjQuODE3IEMgNzUuNyAyNi4xMTcgNzcuNCAyNi43MTcgNzkuMyAyNi43MTcgQyA4Mi42IDI2LjcxNyA4NC41IDI0LjYxNyA4NC41IDI0LjYxNyBMIDg0LjMgMjUuNjE3IEMgODQuMiAyNi4wMTcgODQuNSAyNi40MTcgODQuOSAyNi40MTcgTCA4OC4zIDI2LjQxNyBDIDg4LjggMjYuNDE3IDg5LjMgMjYuMDE3IDg5LjQgMjUuNTE3IEwgOTEuNCAxMi43MTcgQyA5MS40IDEyLjUxNyA5MS4xIDEyLjExNyA5MC43IDEyLjExNyBaIE0gODUuNSAxOS4zMTcgQyA4NS4xIDIxLjQxNyA4My41IDIyLjkxNyA4MS4zIDIyLjkxNyBDIDgwLjIgMjIuOTE3IDc5LjQgMjIuNjE3IDc4LjggMjEuOTE3IEMgNzguMiAyMS4yMTcgNzggMjAuMzE3IDc4LjIgMTkuMzE3IEMgNzguNSAxNy4yMTcgODAuMyAxNS43MTcgODIuNCAxNS43MTcgQyA4My41IDE1LjcxNyA4NC4zIDE2LjExNyA4NC45IDE2LjcxNyBDIDg1LjUgMTcuNDE3IDg1LjcgMTguMzE3IDg1LjUgMTkuMzE3IFoiPjwvcGF0aD4KICAgIDxwYXRoIGZpbGw9IiMwMDljZGUiIGQ9Ik0gOTUuMSA1LjQxNyBMIDkxLjkgMjUuNzE3IEMgOTEuOCAyNi4xMTcgOTIuMSAyNi40MTcgOTIuNSAyNi40MTcgTCA5NS43IDI2LjQxNyBDIDk2LjIgMjYuNDE3IDk2LjcgMjYuMDE3IDk2LjggMjUuNTE3IEwgMTAwIDUuNjE3IEMgMTAwLjEgNS4yMTcgOTkuOCA0LjkxNyA5OS40IDQuOTE3IEwgOTUuOCA0LjkxNyBDIDk1LjQgNC45MTcgOTUuMiA1LjExNyA5NS4xIDUuNDE3IFoiPjwvcGF0aD4KPC9zdmc+Cg==">
                                    <span class="paypal-button-text"> Checkout</span>
                                </button>
                                <span>The safer, easier way to pay</span>
                            </div>
                        </div>
<!--
<div id="paypal-button"></div>

<script>
  paypal.Button.render({
    env: 'sandbox', // Or 'sandbox',

    client: {
        sandbox:    'AYSRZ3IyZL20IIo9d_cdRJ8vzDROidG6_ETORLpi1ICt1wDkYp2K7ZnRwz0KVmdfmo5hCuYBbeyIONc6',
        production: 'xxxxxxxxx'
    },

    commit: true, // Show a 'Pay Now' button

    style: {
        layout: 'vertical',
        color: 'blue',
        size: 'medium',
        shape: 'rect',
    },

    funding: {
            allowed: [ paypal.FUNDING.CARD, paypal.FUNDING.CREDIT ],
            disallowed: [ ]
    },

    payment: function(data, actions) {
        return actions.payment.create({
                payment: {
                    transactions: [
                        {
                            amount: { total: '1.00', currency: 'USD' }
                        }
                    ]
                }
            });
    },

    onAuthorize: function(data, actions) {
        if (error === 'INSTRUMENT_DECLINED') {
                actions.restart();
        }

        return actions.payment.get().then(function(data) {
            // The payment is complete!
            // You can now show a confirmation message to the customer
            window.alert('Payment Complete!');

            // Display the payment details and a confirmation button

            var shipping = data.payer.payer_info.shipping_address;

            document.querySelector('#recipient').innerText = shipping.recipient_name;
            document.querySelector('#line1').innerText     = shipping.line1;
            document.querySelector('#city').innerText      = shipping.city;
            document.querySelector('#state').innerText     = shipping.state;
            document.querySelector('#zip').innerText       = shipping.postal_code;
            document.querySelector('#country').innerText   = shipping.country_code;

            document.querySelector('#paypal-button-container').style.display = 'none';
            document.querySelector('#confirm').style.display = 'block';

            // Listen for click on confirm button
            document.querySelector('#confirmButton').addEventListener('click', function() {

                // Disable the button and show a loading message
                document.querySelector('#confirm').innerText = 'Loading...';
                document.querySelector('#confirm').disabled = true;

                // Execute the payment
                return actions.payment.execute().then(function() {

                    // Show a thank-you note
                    document.querySelector('#thanksname').innerText = shipping.recipient_name;

                    document.querySelector('#confirm').style.display = 'none';
                    document.querySelector('#thanks').style.display = 'block';
                });
            });
        });
    },

    onCancel: function(data, actions) {
      /* 
       * Buyer cancelled the payment 
       */
    },

    onError: function(err) {
      /* 
       * An error occurred during the transaction 
       */
    }
  }, '#paypal-button');
</script>
-->

                    </form>



                    <div class="product_rassurance">
                        <ul class="list-inline">
                            <li class="list-inline-item"><i class="fa fa-truck fa-2x"></i><br/>Fast delivery</li>
                            <li class="list-inline-item"><i class="fa fa-credit-card fa-2x"></i><br/>Secure payment</li>
                            <li class="list-inline-item"><i class="fa fa-phone fa-2x"></i><br/>+ 1 123 141 1516</li>
                        </ul>
                    </div>
                    <div class="reviews_product p-3 mb-2 ">
                        3 reviews
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        (4/5)
                        <a class="pull-right" href="#reviews">View all reviews</a>
                    </div>
                    <div class="datasheet p-3 mb-2 bg-info text-white">
                        <a href="" class="text-white"><i class="fa fa-file-text"></i> Download DataSheet</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Description -->
        <div class="col-12">
            <div class="card border-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-align-justify"></i> Description</div>
                <div class="card-body">
                    <p class="card-text">
                        Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.
                    </p>
                    <p class="card-text">
                        Contrairement à une opinion répandue, le Lorem Ipsum n'est pas simplement du texte aléatoire. Il trouve ses racines dans une oeuvre de la littérature latine classique datant de 45 av. J.-C., le rendant vieux de 2000 ans. Un professeur du Hampden-Sydney College, en Virginie, s'est intéressé à un des mots latins les plus obscurs, consectetur, extrait d'un passage du Lorem Ipsum, et en étudiant tous les usages de ce mot dans la littérature classique, découvrit la source incontestable du Lorem Ipsum. Il provient en fait des sections 1.10.32 et 1.10.33 du "De Finibus Bonorum et Malorum" (Des Suprêmes Biens et des Suprêmes Maux) de Cicéron. Cet ouvrage, très populaire pendant la Renaissance, est un traité sur la théorie de l'éthique. Les premières lignes du Lorem Ipsum, "Lorem ipsum dolor sit amet...", proviennent de la section 1.10.32.
                    </p>
                </div>
            </div>
        </div>

        <!-- Reviews -->
        <div class="col-12" id="reviews">
            <div class="card border-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-comment"></i> Reviews</div>
                <div class="card-body">
                    <div class="review">
                        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                        <meta itemprop="datePublished" content="01-01-2016">January 01, 2018

                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        by Paul Smith
                        <p class="blockquote">
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        </p>
                        <hr>
                    </div>
                    <div class="review">
                        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                        <meta itemprop="datePublished" content="01-01-2016">January 01, 2018

                        <span class="fa fa-star" aria-hidden="true"></span>
                        <span class="fa fa-star" aria-hidden="true"></span>
                        <span class="fa fa-star" aria-hidden="true"></span>
                        <span class="fa fa-star" aria-hidden="true"></span>
                        <span class="fa fa-star" aria-hidden="true"></span>
                        by Paul Smith
                        <p class="blockquote">
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        </p>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Footer -->
<?php include('include/footer.php'); ?>


<!-- Modal image -->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Youth 'I luv PayPal' Tee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img class="img-fluid" src="img/PayPal-tshirt_800x800.jpg" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- JS -->
<script src="//code.jquery.com/jquery-3.2.1.slim.min.js" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" type="text/javascript"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
    //Plus & Minus for Quantity product
    $(document).ready(function(){
        var quantity = 1;

        $('.quantity-right-plus').click(function(e){
            e.preventDefault();
            var quantity = parseInt($('#quantity').val());
            $('#quantity').val(quantity + 1);
        });

        $('.quantity-left-minus').click(function(e){
            e.preventDefault();
            var quantity = parseInt($('#quantity').val());
            if(quantity > 1){
                $('#quantity').val(quantity - 1);
            }
        });

    });
</script>
</body>
</html>
