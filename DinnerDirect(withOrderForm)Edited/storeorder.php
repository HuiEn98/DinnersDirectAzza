<?php
session_start();
require_once("dbConnect.php");
$db_handle = new DBConnect();
$conn = $db_handle -> connectDB();



$table = "CREATE TABLE ordersthis (
    
    order_id INT NOT NULL AUTO_INCREMENT,
    item_id  INT NOT NULL,
    quantity int NOT NULL ,
    time_date  varchar(100) NOT NULL,
    price double NOT NULL,
    PRIMARY KEY (order_id),
    FOREIGN KEY (item_id) REFERENCES mealdeal(ID)

); ";

$createtable = mysqli_query($conn, $table);

if ($createtable)
{
    echo "Table created successfully";
}
else
{
    die ("Table unsuccessfully created");
}


?>