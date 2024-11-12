<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
        * {
    box-sizing: border-box;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
    background-color: #604949; 
}

.form-container {
    width: 480px;
    padding: 30px;
    border-radius: 12px;
    background-color: #BC8F8F;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
}


.form-group {
    display: flex;
    flex-direction: column;
    margin-bottom: 15px;
}

.form-row {
    display: flex;
    gap: 15px;
    margin-bottom: 15px;
}

.form-row .form-group {
    flex: 1;
}

label {
    font-size: 1rem;
    color: #555; 
    font-weight: 600;
    margin-bottom: 5px;
}

input,
select {
    padding: 12px;
    font-size: 1rem;
    width: 100%;
    border: 1px solid #ddd; 
    border-radius: 8px;
    margin-top: 5px;
    background-color: #fff; 
    transition: border-color 0.3s, box-shadow 0.3s;
}

input:focus,
select:focus {
    outline: none;
    border-color: #d03e5b; 
    box-shadow: 0 0 5px rgba(208, 62, 91, 0.5); 
}

input::placeholder {
    color: #aaa; 
}

button {
    width: 100%;
    padding: 12px;
    font-size: 1.1rem;
    color: #fff;
    background-color: #B0C4DE; 
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.2s;
    margin-top: 15px;
}

button:hover {
    background-color: #4fb1e0; 
    transform: translateY(-2px); 
}

    </style>
<body>
<div class="form-container">
<?php
  
  if(isset($_GET['status'])){
    if($_GET['status']==200){
        echo "
        <script>
        alert('REGISTRATION SUCCESSFUL !');
        </script>
        ";
        if($_GET['status']==404){
            echo "
        <script>
        alert('REGISTRATION FAILED !');
        </script>
        ";
        }
    }
  }
?>

<center>
<form action="register.php" method="post">
            <div class="form-row">
            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" id="ID" name="ID" placeholder="ID">
            </div>
            
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" id="first_name" name="first_name" placeholder="First Name" required>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" id="last_name" name="last_name" placeholder="Last Name" required>
                </div>
            </div>
            
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" id="email_id" name="email_id" placeholder="Email address" required>
            </div>
            
            <div class="form-group">
                <label for="permanent_address">Permanent Address</label>
                <input type="text" id="permanent_address" name="permanent_address" placeholder="Permanent Address" required>
            </div>
      
            <div class="form-row">
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" id="city" name="city" placeholder="City" required>
                </div>
                
                <div class="form-group">
                    <label for="state">State</label>
                    <input type="text" id="state" name="state" placeholder="State" required>
                </div>
                
                <div class="form-group">
                    <label for="zip">Zip Code</label>
                    <input type="text" id="pincode" name="pincode" placeholder="Zip Code" required>
                </div>
            </div>

            <button type="submit">Register</button>
        </form>
    </div>
</center>
</div> 
</body>
</html>