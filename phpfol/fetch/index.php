<?php
include_once "conn.php";

// Calculate the number of rows:
$sql = "SELECT count('ID') FROM registration";
$results = mysqli_query($conn, $sql);
$data = mysqli_fetch_row($results);
$rows = $data[0][0];

$sql = "SELECT * FROM registration";
$results = mysqli_query($conn, $sql);
$row = mysqli_fetch_all($results);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #ffcad4; /* Soft light gray-blue background */
            font-family: Arial, sans-serif;
        }

        .table-container {
            width: 1000px;
            max-height: 600px;
            border-radius: 12px;
            background-color: #ffffff; /* White background for the table */
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            overflow-y: auto; /* Allows vertical scrolling */
            padding: 20px;
        }

        table.table-hover {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 8px; /* Soft row separation */
            background-color: #ffffff;
        }

        thead th {
            background-color: #4a90e2; /* Soft blue for headers */
            color: #ffffff;
            font-weight: bold;
            text-align: center;
            padding: 12px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        /* Styling for table rows and alternating row colors */
        tbody tr {
            background-color: #f9f9fc;
            border-radius: 8px;
            overflow: hidden;
        }

        tbody tr:hover {
            background-color: #e6efff; /* Light blue for hover */
        }

        tbody tr td {
            padding: 15px;
            text-align: left;
            color: #333333;
            border-bottom: 1px solid #e0e0e0; /* Light border for separation */
        }

        /* ID Column Styling */
        tbody tr th {
            padding: 15px;
            text-align: left;
            color: #333333;
            background-color: transparent; /* Keep ID column neutral */
            font-weight: normal;
        }

        /* Customize specific column colors for better readability */
        tbody tr td:nth-child(2), /* First Name */
        tbody tr td:nth-child(3), /* Last Name */
        tbody tr td:nth-child(4) /* Email */ {
            color: #4a4a4a;
        }

        /* Responsive styling for mobile screens */
        @media (max-width: 768px) {
            .table-container {
                width: 95%;
            }

            table.table-hover {
                font-size: 14px;
            }

            thead th, tbody tr td {
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <center style="margin-top: 5%">
        <div class="table-container">
            <table class="table-hover table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Permanent Address</th>
                        <th scope="col">City</th>
                        <th scope="col">State</th>
                        <th scope="col">Pincode</th>
                        <th scope="col">CreatedAt</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < $rows; $i++) {
                    ?>
                    <tr>
                        <th scope="row"> <?php echo $row[$i][0] ?> </th>
                        <td> <?php echo $row[$i][1] ?></td>
                        <td> <?php echo $row[$i][2] ?></td>
                        <td> <?php echo $row[$i][3] ?></td>
                        <td> <?php echo $row[$i][4] ?></td>
                        <td> <?php echo $row[$i][5] ?></td>
                        <td> <?php echo $row[$i][6] ?></td>
                        <td> <?php echo $row[$i][7] ?></td>
                        <td> <?php echo $row[$i][8] ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </center>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
