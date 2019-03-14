<?php

//making this a function
//session_destroy();
require_once('databasephp.php');
session_start();

//ALTER THE TABLE DEFAULT VALUES FOR ALL THE REQUIRED COLUMNS 05/02/2019
mysqli_query($link,"ALTER TABLE customers
/*ALTER COLUMN store_id SET DEFAULT NULL,
ALTER COLUMN address_id SET DEFAULT NULL,
ALTER COLUMN active SET DEFAULT '1',
ALTER COLUMN create_date SET DEFAULT CURRENT_TIMESTAMP*/
))");

//ALTER THE TABLE DEFAULT VALUES FOR ALL THE REQUIRED COLUMNS 05/02/2019
mysqli_query($link,"ALTER TABLE drivers
/*ALTER COLUMN store_id SET DEFAULT NULL,
ALTER COLUMN address_id SET DEFAULT NULL,
ALTER COLUMN active SET DEFAULT '1',
ALTER COLUMN create_date SET DEFAULT CURRENT_TIMESTAMP*/
))");

//$firstName = $_POST['first_name'] ?? '1'; //dataphp 7.0
//$familyName = $_POST['last_name'] ?? '1';
$_SESSION['logged'] = 1;
$emailSql=$_POST['email']; //want to retrieve email
$passwordSQL=$_POST['password'];
/*$qryAdd = "INSERT INTO customer (first_name, last_name, email) VALUES (";
$qryAdd .= "'" . $firstName . "', '" . $familyName . "', '" . $emailSql . "')";*/

$qryFind1 = "SELECT * FROM customers ";
$qryFind1 .= " WHERE password = '" . $passwordSQL ."' AND email = '" . $emailSql . "'";

$qryFind2 = "SELECT * FROM drivers ";
$qryFind2 .= " WHERE password = '" . $passwordSQL ."' AND email = '" . $emailSql . "'";

$connection = connectToDb();
//do something there to force unset all the data, on SLIDE Refer to the PHP manual and use:


//Check if the name exists
$result1 = mysqli_query($connection, $qryFind1);
$result2 = mysqli_query($connection, $qryFind2);
if (empty($result1) & empty($result2)){
    echo "The result is empty";
}

if (mysqli_num_rows($result1) > 0) {

    echo '<script type="text/javascript"> alert("You are logged in!"); location="../index.php";</script>';
    $user = mysqli_fetch_assoc($result1);
    $_SESSION['logged'] = 1;
    //echo "Welcome";
    //echo $user['first_name'];
    //echo $user['last_name'];
    $userID=$user['customerID'];
    $_SESSION['userFirstName'] =$user['first_name'];
    $_SESSION['schoolID']=$user['schoolID'];

    echo '<script type="text/javascript"> alert("<?php echo $userID; ?>"); location="../index.php"; </script>';
    $_SESSION['userID']=$userID;
    //echo $userID; //test to make sure customer id in sql database corresponds
    //header('Location: http://localhost/DinnersDirecHuiEn/startbootstrap-shop-homepage-gh-pages/index.html');
    //exit;
}

if (mysqli_num_rows($result2) > 0) {

    echo '<script type="text/javascript"> alert("You are logged in!"); location="pulldriverschedule.php"; </script>';
    //echo
    $user = mysqli_fetch_assoc($result2);
    //echo "Welcome";
    //echo $user['first_name'];
    //echo $user['last_name'];
    $driverID=$user['driverID'];
    $_SESSION['driverID']=$driverID;
    $_SESSION['schoolIDdriver']=$user['schoolID'];
    require("pulldriverschedule.php");
    //echo $userID; //test to make sure customer id in sql database corresponds
    //header('Location: http://localhost/DinnersDirecHuiEn/startbootstrap-shop-homepage-gh-pages/index.html');
    //exit;
}

else {

    echo '<script type="text/javascript"> alert("Cannot find the selected user. Please try again or create a new account.!"); location="../login.php"; </script>';
    echo "$emailSql, $passwordSQL";
    closeDb($connection);
}

?>
