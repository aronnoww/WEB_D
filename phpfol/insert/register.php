<?php
include_once "conn.php";

$ID = $_POST["ID"]; 
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$email_id = $_POST["email_id"];
$permanent_address = $_POST["permanent_address"]; 
$city = $_POST["city"];
$state = $_POST["state"];
$pincode = $_POST["pincode"];


$sql = "INSERT INTO registration (ID, first_name, last_name, email_id, permanent_address, city, state, pincode) 
        VALUES ('$ID', '$first_name', '$last_name', '$email_id', '$permanent_address', '$city', '$state', '$pincode')";

$status = mysqli_query($con, $sql);

if (!$status) {
    header("location:index.php?status=404");
} else {
    header("location:index.php?status=200");
}
?>