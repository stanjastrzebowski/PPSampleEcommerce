
<?php
    session_start();

    include("include/settings.php");
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
        <h1 class="jumbotron-heading">E-COMMERCE CART</h1>
     </div>
</section>

<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Product</th>
                            <th scope="col">Available</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-right">Price</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="img/PayPal-socks.jpg" width="50" height="50" /> </td>
                            <td><?php print $_SESSION['item1_name']; ?></td>
                            <td>In stock</td>
                            <td><input class="form-control" type="text" value="<?php print $_SESSION['item1_qty']; ?>" /></td>
                            <td class="text-right"><?php print $_SESSION['item1_total']; ?> $</td>
                            <td class="text-right"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> </td>
                        </tr>
                        <tr>
                            <td><img src="img/PayPal-infant.jpg" width="50" height="50" /> </td>
                            <td><?php print $_SESSION['item2_name']; ?></td>
                            <td>In stock</td>
                            <td><input class="form-control" type="text" value="<?php print $_SESSION['item2_qty']; ?>" /></td>
                            <td class="text-right"><?php print $_SESSION['item2_total']; ?> $</td>
                            <td class="text-right"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> </td>
                        </tr>
                        <tr>
                            <td><img src="img/PayPal-tshirt.jpg" width="50" height="50" /> </td>
                            <td><?php print $_SESSION['item3_name']; ?></td>
                            <td>In stock</td>
                            <td><input class="form-control" type="text" value="<?php print $_SESSION['item3_qty']; ?>" /></td>
                            <td class="text-right"><?php print $_SESSION['item3_total']; ?> $</td>
                            <td class="text-right"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-right">Sub-Total</br>Tax</br>Shipping</br>Handling</br>Discount</br>Insurance</td>
                            <td class="text-right">
                                <?php 
                                    print $_SESSION['subtotal']." $</br>"; 
                                    print $_SESSION['tax']." $</br>"; 
                                    print $_SESSION['shipping']." $</br>"; 
                                    print $_SESSION['handling']." $</br>"; 
                                    print $_SESSION['discount']." $</br>"; 
                                    print $_SESSION['insurance']." $</br>"; 
                                ?>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-right"><strong>Total</strong></td>
                            <td class="text-right"><strong><?php print $_SESSION['total']; ?> $</strong></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                </br>
                </br>
            </div>
        </div>

        <div class="col mb-2">
            <div class="row">
                    <form id="payment" action="payment.php" method="post">
                    </form>
                    <div class="col-sm-12  col-md-6">
                        <!--<button class="btn btn-block btn-light">Continue Shopping</button>-->
                        <div class="xo-button-wrap gold rect responsive">
                            <button type="submit" name="action" value="cart-shortcut" form="payment" class="js-open-dialog" pa-tracked="1">
                                <img class="paypal-button-logo paypal-button-logo-pp paypal-button-logo-gold" alt="pp" src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMzIiIHZpZXdCb3g9IjAgMCAyNCAzMiIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBwcmVzZXJ2ZUFzcGVjdFJhdGlvPSJ4TWluWU1pbiBtZWV0Ij4KICAgIDxwYXRoIGZpbGw9IiMwMDljZGUiIGQ9Ik0gMjAuOTA1IDkuNSBDIDIxLjE4NSA3LjQgMjAuOTA1IDYgMTkuNzgyIDQuNyBDIDE4LjU2NCAzLjMgMTYuNDExIDIuNiAxMy42OTcgMi42IEwgNS43MzkgMi42IEMgNS4yNzEgMi42IDQuNzEgMy4xIDQuNjE1IDMuNiBMIDEuMzM5IDI1LjggQyAxLjMzOSAyNi4yIDEuNjIgMjYuNyAyLjA4OCAyNi43IEwgNi45NTYgMjYuNyBMIDYuNjc1IDI4LjkgQyA2LjU4MSAyOS4zIDYuODYyIDI5LjYgNy4yMzYgMjkuNiBMIDExLjM1NiAyOS42IEMgMTEuODI1IDI5LjYgMTIuMjkyIDI5LjMgMTIuMzg2IDI4LjggTCAxMi4zODYgMjguNSBMIDEzLjIyOCAyMy4zIEwgMTMuMjI4IDIzLjEgQyAxMy4zMjIgMjIuNiAxMy43OSAyMi4yIDE0LjI1OCAyMi4yIEwgMTQuODIxIDIyLjIgQyAxOC44NDUgMjIuMiAyMS45MzUgMjAuNSAyMi44NzEgMTUuNSBDIDIzLjMzOSAxMy40IDIzLjE1MyAxMS43IDIyLjAyOSAxMC41IEMgMjEuNzQ4IDEwLjEgMjEuMjc5IDkuOCAyMC45MDUgOS41IEwgMjAuOTA1IDkuNSI+PC9wYXRoPgogICAgPHBhdGggZmlsbD0iIzAxMjE2OSIgZD0iTSAyMC45MDUgOS41IEMgMjEuMTg1IDcuNCAyMC45MDUgNiAxOS43ODIgNC43IEMgMTguNTY0IDMuMyAxNi40MTEgMi42IDEzLjY5NyAyLjYgTCA1LjczOSAyLjYgQyA1LjI3MSAyLjYgNC43MSAzLjEgNC42MTUgMy42IEwgMS4zMzkgMjUuOCBDIDEuMzM5IDI2LjIgMS42MiAyNi43IDIuMDg4IDI2LjcgTCA2Ljk1NiAyNi43IEwgOC4yNjcgMTguNCBMIDguMTczIDE4LjcgQyA4LjI2NyAxOC4xIDguNzM1IDE3LjcgOS4yOTYgMTcuNyBMIDExLjYzNiAxNy43IEMgMTYuMjI0IDE3LjcgMTkuNzgyIDE1LjcgMjAuOTA1IDEwLjEgQyAyMC44MTIgOS44IDIwLjkwNSA5LjcgMjAuOTA1IDkuNSI+PC9wYXRoPgogICAgPHBhdGggZmlsbD0iIzAwMzA4NyIgZD0iTSA5LjQ4NSA5LjUgQyA5LjU3NyA5LjIgOS43NjUgOC45IDEwLjA0NiA4LjcgQyAxMC4yMzIgOC43IDEwLjMyNiA4LjYgMTAuNTEzIDguNiBMIDE2LjY5MiA4LjYgQyAxNy40NDIgOC42IDE4LjE4OSA4LjcgMTguNzUzIDguOCBDIDE4LjkzOSA4LjggMTkuMTI3IDguOCAxOS4zMTQgOC45IEMgMTkuNTAxIDkgMTkuNjg4IDkgMTkuNzgyIDkuMSBDIDE5Ljg3NSA5LjEgMTkuOTY4IDkuMSAyMC4wNjMgOS4xIEMgMjAuMzQzIDkuMiAyMC42MjQgOS40IDIwLjkwNSA5LjUgQyAyMS4xODUgNy40IDIwLjkwNSA2IDE5Ljc4MiA0LjYgQyAxOC42NTggMy4yIDE2LjUwNiAyLjYgMTMuNzkgMi42IEwgNS43MzkgMi42IEMgNS4yNzEgMi42IDQuNzEgMyA0LjYxNSAzLjYgTCAxLjMzOSAyNS44IEMgMS4zMzkgMjYuMiAxLjYyIDI2LjcgMi4wODggMjYuNyBMIDYuOTU2IDI2LjcgTCA4LjI2NyAxOC40IEwgOS40ODUgOS41IFoiPjwvcGF0aD4KPC9zdmc+Cg==">
                                <img class="paypal-button-logo paypal-button-logo-paypal paypal-button-logo-gold" alt="paypal" src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwIiBoZWlnaHQ9IjMyIiB2aWV3Qm94PSIwIDAgMTAwIDMyIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaW5ZTWluIG1lZXQiPgogICAgPHBhdGggZmlsbD0iIzAwMzA4NyIgZD0iTSAxMiA0LjkxNyBMIDQuMiA0LjkxNyBDIDMuNyA0LjkxNyAzLjIgNS4zMTcgMy4xIDUuODE3IEwgMCAyNS44MTcgQyAtMC4xIDI2LjIxNyAwLjIgMjYuNTE3IDAuNiAyNi41MTcgTCA0LjMgMjYuNTE3IEMgNC44IDI2LjUxNyA1LjMgMjYuMTE3IDUuNCAyNS42MTcgTCA2LjIgMjAuMjE3IEMgNi4zIDE5LjcxNyA2LjcgMTkuMzE3IDcuMyAxOS4zMTcgTCA5LjggMTkuMzE3IEMgMTQuOSAxOS4zMTcgMTcuOSAxNi44MTcgMTguNyAxMS45MTcgQyAxOSA5LjgxNyAxOC43IDguMTE3IDE3LjcgNi45MTcgQyAxNi42IDUuNjE3IDE0LjYgNC45MTcgMTIgNC45MTcgWiBNIDEyLjkgMTIuMjE3IEMgMTIuNSAxNS4wMTcgMTAuMyAxNS4wMTcgOC4zIDE1LjAxNyBMIDcuMSAxNS4wMTcgTCA3LjkgOS44MTcgQyA3LjkgOS41MTcgOC4yIDkuMzE3IDguNSA5LjMxNyBMIDkgOS4zMTcgQyAxMC40IDkuMzE3IDExLjcgOS4zMTcgMTIuNCAxMC4xMTcgQyAxMi45IDEwLjUxNyAxMy4xIDExLjIxNyAxMi45IDEyLjIxNyBaIj48L3BhdGg+CiAgICA8cGF0aCBmaWxsPSIjMDAzMDg3IiBkPSJNIDM1LjIgMTIuMTE3IEwgMzEuNSAxMi4xMTcgQyAzMS4yIDEyLjExNyAzMC45IDEyLjMxNyAzMC45IDEyLjYxNyBMIDMwLjcgMTMuNjE3IEwgMzAuNCAxMy4yMTcgQyAyOS42IDEyLjAxNyAyNy44IDExLjYxNyAyNiAxMS42MTcgQyAyMS45IDExLjYxNyAxOC40IDE0LjcxNyAxNy43IDE5LjExNyBDIDE3LjMgMjEuMzE3IDE3LjggMjMuNDE3IDE5LjEgMjQuODE3IEMgMjAuMiAyNi4xMTcgMjEuOSAyNi43MTcgMjMuOCAyNi43MTcgQyAyNy4xIDI2LjcxNyAyOSAyNC42MTcgMjkgMjQuNjE3IEwgMjguOCAyNS42MTcgQyAyOC43IDI2LjAxNyAyOSAyNi40MTcgMjkuNCAyNi40MTcgTCAzMi44IDI2LjQxNyBDIDMzLjMgMjYuNDE3IDMzLjggMjYuMDE3IDMzLjkgMjUuNTE3IEwgMzUuOSAxMi43MTcgQyAzNiAxMi41MTcgMzUuNiAxMi4xMTcgMzUuMiAxMi4xMTcgWiBNIDMwLjEgMTkuMzE3IEMgMjkuNyAyMS40MTcgMjguMSAyMi45MTcgMjUuOSAyMi45MTcgQyAyNC44IDIyLjkxNyAyNCAyMi42MTcgMjMuNCAyMS45MTcgQyAyMi44IDIxLjIxNyAyMi42IDIwLjMxNyAyMi44IDE5LjMxNyBDIDIzLjEgMTcuMjE3IDI0LjkgMTUuNzE3IDI3IDE1LjcxNyBDIDI4LjEgMTUuNzE3IDI4LjkgMTYuMTE3IDI5LjUgMTYuNzE3IEMgMzAgMTcuNDE3IDMwLjIgMTguMzE3IDMwLjEgMTkuMzE3IFoiPjwvcGF0aD4KICAgIDxwYXRoIGZpbGw9IiMwMDMwODciIGQ9Ik0gNTUuMSAxMi4xMTcgTCA1MS40IDEyLjExNyBDIDUxIDEyLjExNyA1MC43IDEyLjMxNyA1MC41IDEyLjYxNyBMIDQ1LjMgMjAuMjE3IEwgNDMuMSAxMi45MTcgQyA0MyAxMi40MTcgNDIuNSAxMi4xMTcgNDIuMSAxMi4xMTcgTCAzOC40IDEyLjExNyBDIDM4IDEyLjExNyAzNy42IDEyLjUxNyAzNy44IDEzLjAxNyBMIDQxLjkgMjUuMTE3IEwgMzggMzAuNTE3IEMgMzcuNyAzMC45MTcgMzggMzEuNTE3IDM4LjUgMzEuNTE3IEwgNDIuMiAzMS41MTcgQyA0Mi42IDMxLjUxNyA0Mi45IDMxLjMxNyA0My4xIDMxLjAxNyBMIDU1LjYgMTMuMDE3IEMgNTUuOSAxMi43MTcgNTUuNiAxMi4xMTcgNTUuMSAxMi4xMTcgWiI+PC9wYXRoPgogICAgPHBhdGggZmlsbD0iIzAwOWNkZSIgZD0iTSA2Ny41IDQuOTE3IEwgNTkuNyA0LjkxNyBDIDU5LjIgNC45MTcgNTguNyA1LjMxNyA1OC42IDUuODE3IEwgNTUuNSAyNS43MTcgQyA1NS40IDI2LjExNyA1NS43IDI2LjQxNyA1Ni4xIDI2LjQxNyBMIDYwLjEgMjYuNDE3IEMgNjAuNSAyNi40MTcgNjAuOCAyNi4xMTcgNjAuOCAyNS44MTcgTCA2MS43IDIwLjExNyBDIDYxLjggMTkuNjE3IDYyLjIgMTkuMjE3IDYyLjggMTkuMjE3IEwgNjUuMyAxOS4yMTcgQyA3MC40IDE5LjIxNyA3My40IDE2LjcxNyA3NC4yIDExLjgxNyBDIDc0LjUgOS43MTcgNzQuMiA4LjAxNyA3My4yIDYuODE3IEMgNzIgNS42MTcgNzAuMSA0LjkxNyA2Ny41IDQuOTE3IFogTSA2OC40IDEyLjIxNyBDIDY4IDE1LjAxNyA2NS44IDE1LjAxNyA2My44IDE1LjAxNyBMIDYyLjYgMTUuMDE3IEwgNjMuNCA5LjgxNyBDIDYzLjQgOS41MTcgNjMuNyA5LjMxNyA2NCA5LjMxNyBMIDY0LjUgOS4zMTcgQyA2NS45IDkuMzE3IDY3LjIgOS4zMTcgNjcuOSAxMC4xMTcgQyA2OC40IDEwLjUxNyA2OC41IDExLjIxNyA2OC40IDEyLjIxNyBaIj48L3BhdGg+CiAgICA8cGF0aCBmaWxsPSIjMDA5Y2RlIiBkPSJNIDkwLjcgMTIuMTE3IEwgODcgMTIuMTE3IEMgODYuNyAxMi4xMTcgODYuNCAxMi4zMTcgODYuNCAxMi42MTcgTCA4Ni4yIDEzLjYxNyBMIDg1LjkgMTMuMjE3IEMgODUuMSAxMi4wMTcgODMuMyAxMS42MTcgODEuNSAxMS42MTcgQyA3Ny40IDExLjYxNyA3My45IDE0LjcxNyA3My4yIDE5LjExNyBDIDcyLjggMjEuMzE3IDczLjMgMjMuNDE3IDc0LjYgMjQuODE3IEMgNzUuNyAyNi4xMTcgNzcuNCAyNi43MTcgNzkuMyAyNi43MTcgQyA4Mi42IDI2LjcxNyA4NC41IDI0LjYxNyA4NC41IDI0LjYxNyBMIDg0LjMgMjUuNjE3IEMgODQuMiAyNi4wMTcgODQuNSAyNi40MTcgODQuOSAyNi40MTcgTCA4OC4zIDI2LjQxNyBDIDg4LjggMjYuNDE3IDg5LjMgMjYuMDE3IDg5LjQgMjUuNTE3IEwgOTEuNCAxMi43MTcgQyA5MS40IDEyLjUxNyA5MS4xIDEyLjExNyA5MC43IDEyLjExNyBaIE0gODUuNSAxOS4zMTcgQyA4NS4xIDIxLjQxNyA4My41IDIyLjkxNyA4MS4zIDIyLjkxNyBDIDgwLjIgMjIuOTE3IDc5LjQgMjIuNjE3IDc4LjggMjEuOTE3IEMgNzguMiAyMS4yMTcgNzggMjAuMzE3IDc4LjIgMTkuMzE3IEMgNzguNSAxNy4yMTcgODAuMyAxNS43MTcgODIuNCAxNS43MTcgQyA4My41IDE1LjcxNyA4NC4zIDE2LjExNyA4NC45IDE2LjcxNyBDIDg1LjUgMTcuNDE3IDg1LjcgMTguMzE3IDg1LjUgMTkuMzE3IFoiPjwvcGF0aD4KICAgIDxwYXRoIGZpbGw9IiMwMDljZGUiIGQ9Ik0gOTUuMSA1LjQxNyBMIDkxLjkgMjUuNzE3IEMgOTEuOCAyNi4xMTcgOTIuMSAyNi40MTcgOTIuNSAyNi40MTcgTCA5NS43IDI2LjQxNyBDIDk2LjIgMjYuNDE3IDk2LjcgMjYuMDE3IDk2LjggMjUuNTE3IEwgMTAwIDUuNjE3IEMgMTAwLjEgNS4yMTcgOTkuOCA0LjkxNyA5OS40IDQuOTE3IEwgOTUuOCA0LjkxNyBDIDk1LjQgNC45MTcgOTUuMiA1LjExNyA5NS4xIDUuNDE3IFoiPjwvcGF0aD4KPC9zdmc+Cg==">
                                <span class="paypal-button-text"> Checkout</span>
                            </button>
                            <span>The safer, easier way to pay</span>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 text-right">
                        <button type="submit" name="action" value="cart-checkout" form="payment" class="btn btn-lg btn-block btn-success">Checkout</button>
                    </div>
                <!--</form>-->

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
