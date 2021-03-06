<?php

require_once('databasephp.php');
$connection = connectToDb();
session_start();

//$srch_term = $_GET['srch-term'] ?? '1'; //PHP 7.0
//$srch= $_GET['srch-term'] ?? '1'; //dataphp 7.0
//echo "$srch";

$userIDpullorderdatainstance=$_SESSION['userID'];//$y is any declared variable
//echo $userIDpullorderdatainstance;


$query = "SELECT cus.first_name, cus.last_name, ordspec.time_date, ordspec.price, orderitem.quantity, orderitem.item_id, ordspec.order_id FROM orderlist ordspec
JOIN customers cus /*alias of cus for customer*/
    on ordspec.customer_id = cus.customerID
    JOIN orderitem ON ordspec.order_id = orderitem.order_id
WHERE ordspec.customer_id = '" . $userIDpullorderdatainstance."'";

$query3 = "SELECT first_name, last_name FROM customers
WHERE customers.customerID = '" . $userIDpullorderdatainstance."'";


//search database
//check if the variable has not been initalized
$result = mysqli_query($connection, $query);
$result2 = mysqli_query($connection, $query);
$result3 = mysqli_query($connection, $query3);

if (empty($result)){
    exit("databasePhp query failed, the result does not exist.");
}

// Close the connection
mysqli_close($connection);
?>



<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome to Dinners Direct</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/shop-homepage.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">Dinners Direct</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="../index.html" collapse="navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../about.html">About</a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="pullorderdata.php">My Account</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../createnewaccount.html">Create Account</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../menu.php">Order</a>
                    <!--<a class="nav-link text-uppercase text-expanded" href="products.html">Products</a>!-->
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="logOut.php">Log Out</a>
                    <!--<a class="nav-link text-uppercase text-expanded" href="products.html">Products</a>!-->
                </li>
            </ul>
        </div>
    </div>
</nav>



<!-- Page Content -->
<div class="container">
    <h1> Past Orders</h1>

    <table class="table" >
        <tr>
            <th>Name</th>
        </tr>
        <tr>
            <td><?php //print_r($user2);
            $names=($result2->fetch_assoc()); //instance var to just get the first and last name
                $names3=($result3->fetch_assoc());
                    echo $names3['first_name']. " ".$names3['last_name'] ?></td>
        </tr>


        <tr>
            <th>Order ID</th>
            <th>Order item ID</th>
            <th>Date ordered</th>
            <th>Total Price</th>
            <th> Quantity</th>
        </tr>
        <?php  while( $user=mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?php echo $user['order_id'] ?></td>
            <td><?php print_r($user['item_id']) ?> </td>
            <td><?php echo $user['time_date'] ?></td>
            <td><?php echo $user['price'] ?></td>
            <td><?php echo $user['quantity'] ?></td>
        </tr>

<? }?>
    </table>
    <div class="row">

    </div>
    <?php
    // Free the results from memory
    //unset all variables
//at the start of every page runs that code
    mysqli_free_result($result);
    mysqli_free_result($result2);

    //session_destroy();

    ?>

</div>


<!-- /.container -->


<!-- Bootstrap core JavaScript -->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>


