<?php

session_start();
require_once("dbConnect.php");
$db_handle = new DBConnect();
$conn = $db_handle -> connectDB();

if($_SERVER['REQUEST_METHOD']=$_POST){
    $delivery = $_POST['dt'];
}


if(isset($_SESSION["cart_item"])){
print_r($_SESSION["cart_item"]);

echo "<br>";


    $schoolID=$_SESSION['schoolID'];

    $customerID=$_SESSION['userID'];

    $item_date = $delivery;

    $total_price = "";

    foreach ($_SESSION["cart_item"] as $item => $value ){
        $item_price = $_SESSION["cart_item"][$item]['price'];
        $item_quantity = $_SESSION["cart_item"][$item]['quantity'];

        $sub_price = $item_price * $item_quantity;
        $total_price += $sub_price;
    }

    echo $total_price;

    $query = "INSERT INTO orderlist (customer_id, school_id, time_date, price, driver_id) VALUES ('$customerID', '$schoolID', '$item_date', '$total_price', '1')";

    echo "<br> query here: " . $query;
    echo "<br>";
    if(mysqli_query($conn, $query)) {
        echo "submit query succeclesflsdjf<br>";
    }else {
        echo "nononono<br>";
    }
    ;

    $order_id = mysqli_insert_id($conn);

    echo "<br>order id here: " . $order_id;

    foreach ($_SESSION["cart_item"] as $item => $value ){
        echo $item." => ".$value. "<br>";
        $item_id = $_SESSION["cart_item"][$item]['ID'];

        $item_quantity = $_SESSION["cart_item"][$item]['quantity'];

        $item_price = $_SESSION["cart_item"][$item]['price'];





        $item_code = $_SESSION["cart_item"][$item]['code'];

        $timestamp = time();
        $time = (date("F d, Y h:i:s A", $timestamp));

        $query = "INSERT INTO orderitem (order_id, item_id, quantity) " .
            "VALUES ('$order_id', '$item_id', '$item_quantity')";

        mysqli_query($conn, $query);

        //$value is the array that has the information
        //under foreach loop we can access the array one by one
        //array_walk_recursive($value,"myfunction"); //this one helps us visualise the array to debug

    }
    unset($_SESSION["cart_item"]);
    echo '<script type="text/javascript"> alert("Payment successful!");  location="phpdata/pullorderdata.php";</script>';

}