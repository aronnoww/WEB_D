<?php
include_once "conn.php"; // Include the database connection file

// Initialize error message
$error = "";

// Check if form data is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize user input
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $email_id = mysqli_real_escape_string($conn, $_POST['email']); // Adjusted to email_id

    // Debugging: Print the values of ID and email_id
    echo "ID: " . $id . "<br>";
    echo "Email: " . $email_id . "<br>";

    // Query to check if the ID and Email exist in the database
    $sql = "SELECT * FROM registration WHERE ID = '$id' AND email_id = '$email_id'"; // Corrected the column name to email_id

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if (!$result) {
        // If the query failed, display an error
        die("Query failed: " . mysqli_error($conn));
    }

    // Debugging: Print the number of rows found
    echo "Rows found: " . mysqli_num_rows($result) . "<br>";

    // If a matching record is found
    if (mysqli_num_rows($result) > 0) {
        // Redirect to congrats.php on successful login
        header("Location: congrats.php");
        exit();
    } else {
        // If no match, display login failure message
        $error = "Login Failed: Invalid ID or Email!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Authentication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #F4CCCC;
            font-family: Arial, sans-serif;
        }
        .form-container {
            width: 480px;
            padding: 30px;
            border-radius: 12px;
            background-color: #B8CE99;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }
        .error {
            color: #d03e5b;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <center style="margin-top: 5%">
        <div class="form-container">
            <!-- Display error message if login fails -->
            <?php if ($error): ?>
                <div class="error"><?php echo $error; ?></div>
            <?php endif; ?>
        </div>
    </center>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.
