<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
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
        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }
        label {
            font-size: 1rem;
            color: #555;
            font-weight: 600;
            margin-bottom: 5px;
        }
        input {
            padding: 12px;
            font-size: 1rem;
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-top: 5px;
            background-color: #fff;
            transition: border-color 0.3s, box-shadow 0.3s;
        }
        input:focus {
            outline: none;
            border-color: #d03e5b;
            box-shadow: 0 0 5px rgba(208, 62, 91, 0.5);
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
</head>
<body>
    <center style="margin-top: 5%">
        <div class="form-container">
            <!-- Login Form -->
            <form action="auth.php" method="POST">
                <div class="form-group">
                    <label for="id">ID</label>
                    <input type="text" id="id" name="id" required placeholder="Enter your ID">
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required placeholder="Enter your email">
                </div>
                <button type="submit">Login</button>
            </form>
        </div>
    </center>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
