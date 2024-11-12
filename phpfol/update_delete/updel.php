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

if(isset($_POST['del'])){

    $sql="delete from registration where ID='$ID'";




    if(mysqli_query($conn,$sql)){
        header("location:index.php?status=201");
    }
    else{
        header("location:index.php?status=404");
    }

}
if(isset($_POST['update'])){
    $sql="update registration set ID='$ID', first_name='$first_name',last_name='$last_name',email_id='$email_Id', permanent_address='$permanent_address', city='$city', state='$state', pincode='$pincode' where ID='$ID'";




    if(mysqli_query($conn,$sql)){
        header("location:index.php?status=200");
    }
    else{
        header("location:index.php?status=404");
    }
}