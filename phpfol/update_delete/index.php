<?php
include_once "conn.php";

if (isset($_GET['status'])) {
    $message = '';
    if ($_GET['status'] == 200) {
        $message = "Data Updated Successfully!";
    } elseif ($_GET['status'] == 404) {
        $message = "Error!";
    } elseif ($_GET['status'] == 201) {
        $message = "Record Deleted!";
    }

    echo "<script>
        alert('$message');
        window.location.href='index.php';
    </script>";
}

// Fetch data from the `registration` table
$sql = "SELECT * FROM registration";
$results = mysqli_query($conn, $sql);
$rowCount = mysqli_num_rows($results);
?>

<!DOCTYPE html>
<html>
<head>
    <title>UPDATE & DELETE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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

        .d-flex.gap-2 {
            justify-content: center; /* Center-align buttons */
        }
    </style>
</head>
<body>
    <div class="table-container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Permanent Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Pincode</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($rowCount > 0) {
                    while ($row = mysqli_fetch_assoc($results)) {
                        ?>
                        <tr id="row-<?php echo $row['ID']; ?>">
                            <form method="POST" action="updel.php">
                                <input type="hidden" name="ID" value="<?php echo $row['ID']; ?>">
                                <td><?php echo $row['ID']; ?></td>
                                <td>
                                    <input type="text" class="form-control" name="first_name" value="<?php echo $row['first_name']; ?>" 
                                           <?php echo isset($_GET['edit_id']) && $_GET['edit_id'] == $row['ID'] ? '' : 'readonly'; ?>>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="last_name" value="<?php echo $row['last_name']; ?>" 
                                           <?php echo isset($_GET['edit_id']) && $_GET['edit_id'] == $row['ID'] ? '' : 'readonly'; ?>>
                                </td>
                                <td>
                                    <input type="email" class="form-control" name="email_id" value="<?php echo $row['email_id']; ?>" 
                                           <?php echo isset($_GET['edit_id']) && $_GET['edit_id'] == $row['ID'] ? '' : 'readonly'; ?>>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="permanent_address" value="<?php echo $row['permanent_address']; ?>" 
                                           <?php echo isset($_GET['edit_id']) && $_GET['edit_id'] == $row['ID'] ? '' : 'readonly'; ?>>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="city" value="<?php echo $row['city']; ?>" 
                                           <?php echo isset($_GET['edit_id']) && $_GET['edit_id'] == $row['ID'] ? '' : 'readonly'; ?>>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="state" value="<?php echo $row['state']; ?>" 
                                           <?php echo isset($_GET['edit_id']) && $_GET['edit_id'] == $row['ID'] ? '' : 'readonly'; ?>>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="pincode" value="<?php echo $row['pincode']; ?>" 
                                           <?php echo isset($_GET['edit_id']) && $_GET['edit_id'] == $row['ID'] ? '' : 'readonly'; ?>>
                                </td>
                                <td><?php echo $row['created_at']; ?></td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <?php if (isset($_GET['edit_id']) && $_GET['edit_id'] == $row['ID']) { ?>
                                            <button type="submit" name="update" class="btn btn-primary btn-sm">Save</button>
                                        <?php } else { ?>
                                            <a href="index.php?edit_id=<?php echo $row['ID']; ?>" class="btn btn-success btn-sm">Update</a>
                                            <a href="updel.php?delete_id=<?php echo $row['ID']; ?>" class="btn btn-danger btn-sm" 
                                               onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                                        <?php } ?>
                                    </div>
                                </td>
                            </form>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='10'>No data found!</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
