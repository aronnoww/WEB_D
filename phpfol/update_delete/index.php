<?php
include_once "conn.php";


if(isset($_GET['status'])){
    if($_GET['status']==200){
        echo "
        <script>
        alert('Data Updated Successfully !')
        window.location.href='index.php';
        </script>
        ";
    }
    if($_GET['status']==404){
        echo "
        <script>
        alert('Error !')
        window.location.href='index.php';
        </script>
        ";
    }
    if($_GET['status']==201){
        echo "
        <script>
        alert('Record Deleted !')
        window.location.href='index.php';
        </script>
        ";
    }
}

// to calculate the no of rows:
$sql="select count('ID') from registration";
$results=mysqli_query($conn,$sql);
$data=mysqli_fetch_row($results);
$rows=$data[0][0];





$sql="select * from registration";
$results=mysqli_query($conn,$sql);
$row=mysqli_fetch_all($results);


?>

<html>
<head>
    <title>
        UPDATE & DELETE
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
<center style="margin-top: 5%">


    <div style="width: 500px" class="responsive">

        <table class="table table-hover">
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
            for($i=0;$i<$rows;$i++){
                ?>



            <tr>
                <th scope="row">  <?php echo $row[$i][0] ?>  </th>
                <td> <?php echo $row[$i][1] ?></td>
                <td> <?php echo $row[$i][2] ?></td>
                <td> <?php echo $row[$i][3] ?></td>
                <td> <?php echo $row[$i][4] ?></td>
                <td> <?php echo $row[$i][5] ?></td>
                <td> <?php echo $row[$i][6] ?></td>
                <td> <?php echo $row[$i][7] ?></td>
                <td> <?php echo $row[$i][8] ?></td>
                        



                    </td>
                    <td><input name="update" class="btn btn-success" type="submit" value="UPDATE"></td>
                        <td><input name="del" class="btn btn-danger" type="submit" value="DELETE"></td>
                    </form>
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