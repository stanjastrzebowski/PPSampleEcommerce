<!--<nav class="navbar navbar-expand-md navbar-dark bg-dark">-->
<nav class="navbar navbar-expand-md navbar-dark bg-logo">
    <div class="container">
<!--        <a class="navbar-brand" href="index.php">Simple Ecommerce</a>-->
        <a class="navbar-brand" href="index.php"><img src="img/hipshop_logo2.png" width="50%" height="30%"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
            <ul class="navbar-nav m-auto">
                <li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'index.php'){echo 'nav-item active'; }else { echo 'nav-item'; } ?>">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'category.php'){echo 'nav-item active'; }else { echo 'nav-item'; } ?>">
                    <a class="nav-link" href="category.php">Categories</a>
                </li>
                <li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'product.php'){echo 'nav-item active'; }else { echo 'nav-item'; } ?>">
                    <a class="nav-link" href="product.php">Product</a>
                </li>
                <li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'cart.php'){echo 'nav-item active'; }else { echo 'nav-item'; } ?>">
                    <a class="nav-link" href="cart.php">Cart</a>
                </li>
                <li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'contact.php'){echo 'nav-item active'; }else { echo 'nav-item'; } ?>">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
            </ul>

            <form class="form-inline my-2 my-lg-0">
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control" placeholder="Search...">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-secondary btn-number">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <a class="btn btn-success btn-sm ml-3" href="cart.php">
                    <i class="fa fa-shopping-cart"></i> Cart
                    <span class="badge badge-light">3</span>
                </a>
            </form>
        </div>
    </div>
</nav>