<?php
include_once "conn.php";

// Handle Delete Request
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];

    $sql = "DELETE FROM registration WHERE ID='$id'";
    if (mysqli_query($conn, $sql)) {
        header("Location: index.php?status=201"); // Success: Record deleted
    } else {
        header("Location: index.php?status=404"); // Error
    }
    exit;
}

// Handle Update Request
if (isset($_POST['update'])) {
    $id = $_POST["ID"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email_id = $_POST["email_id"];
    $permanent_address = $_POST["permanent_address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $pincode = $_POST["pincode"];

    // Update query
    $sql = "UPDATE registration SET 
            first_name='$first_name', 
            last_name='$last_name', 
            email_id='$email_id', 
            permanent_address='$permanent_address', 
            city='$city', 
            state='$state', 
            pincode='$pincode' 
            WHERE ID='$id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php?status=200"); // Success: Record updated
    } else {
        header("Location: index.php?status=404"); // Error
    }
    exit;
}
?>
