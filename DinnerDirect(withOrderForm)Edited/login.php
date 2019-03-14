<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome to DinnersDirect </title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">Dinners Direct</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="index.html" collapse="navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="phpdata/pullorderdata.php">My Account</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="createnewaccount.html">Create Account</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="menu.php">Order</a>
                    <!--<a class="nav-link text-uppercase text-expanded" href="products.html">Products</a>!-->
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="phpdata/logOut.php">Log Out</a>
                    <!--<a class="nav-link text-uppercase text-expanded" href="products.html">Products</a>!-->
                </li>
            </ul>
        </div>
    </div>
</nav>



<!-- Page Content -->
<div class="container">
    <?php

    if($_SESSION['logged']==1)
    {
        echo $_SESSION['userFirstName'];
    }
    elseif ($_SESSION['logged']!=1)
    { ?>
        <?= '<h1> login to your account </h1>


    <form method="post" action="phpdata/logincheck.php">
        Your Email:<br>
        <input type="email" name="email" required><br>
        Your password:<br>
        <input type="password" name="password" required><br>
        <br><br> 
        <input type="submit" class="btn btn-primary" value="Submit" required>
    </form>
    
    
    <br>
    <p>Do not have an account?</p>
    <a href="createnewaccount.html" class="btnCreateNewAccount">Create New Account</a>' ?>
    <?php } ?>


</div>
<!-- /.row -->

</div>
<!-- /.col-lg-9 -->

</div>
<!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; DinnersDirect 2019</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
