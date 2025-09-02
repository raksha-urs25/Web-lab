Lab-10a
<!DOCTYPE html>
<html>
    <head>
        <title>My PHP Page</title>
    </head>
    <body>
 
<?php
$today=date("d-m-Y");
echo "Today's date is $today";
?>
   </body>
</html>



Lab-10b
<!DOCTYPE html>
<html>
<head>
  <title>Prime Number Checker</title>
</head>
<body>
  <h1>Prime Number Checker</h1>
  <form method="POST">
    <label>Number</label>
    <input name="num" required/>
    <button type="submit">Check!</button>
  </form>
    <p>
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num = $_POST["num"];
    if ($num == 1 || $num == 0) {
      echo "The number $num is neither prime nor not prime";
      return;
    }
    $flag = 0;
    for ($i = 2; $i <= sqrt($num); $i++) {
    if ($num % $i == 0) {
        $flag = 1;
        break;
    }
    }
    if ($flag == 1) 
    echo "The number $num is not a prime number";
    else
    echo "The number $num is a prime number";
  }
  ?>
    </p>
</body>
</html>



Lab-11
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission</title>
    <style>
        .container {
            margin: 50px auto;
            width: 400px;
            padding: 30px;
            background-color: #f5f5f5;
            border-radius: 10px;
            box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.5);
        }

        textarea {
            font-size: 12px;
            padding: 10px;
            margin: 5px;
            border-radius: 2px;
            width: 70%;
        }

        input[type="submit"], input[type="reset"] {
            font-size: 12px;
            background-color: rgb(204, 222, 216);
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Enter Your Information</h2>
        <form action="" method="POST">
            <label for="info">Information:</label><br>
            <textarea id="info" name="info" rows="6" cols="50"></textarea><br><br>
            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the information from the form
        $info = $_POST["info"];

        // Validate if the information is not empty
        if (!empty($info)) {
            // Open a text file to store the information
            $file = fopen("form.txt", "a"); // "a" mode for appending

            // Write the information to the text file
            fwrite($file, $info . "\n");

            // Close the file
            fclose($file);

            // Display a success message in an alert
            echo "<script>alert('Information submitted successfully!\\n" . htmlspecialchars($info) . "');</script>";
        } else {
            // Display an error message in an alert if information is empty
            echo "<script>alert('Please enter some information!');</script>";
        }
    }
    ?>
</body>
</html>



Lab-12
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        .container {
            margin: 50px auto;
            width: 400px;
            padding: 30px;
            background-color: #f5f5f5;
            border-radius: 10px;
            box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.5);
        }

        input {
            font-size: 12px;
            padding: 10px;
            margin: 5px;
            border-radius: 2px;
            width: 70%;
        }
    </style>

</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="" method="POST">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username"><br><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password"><br><br>
            <button type="submit">Login</button>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $uname = $_POST["username"];
        $pass = $_POST["password"];
        $file = fopen("login.txt", "r");
        
        $is_valid = false;

        while (($line = fgets($file)) !== false) {
            $content = trim($line);
            if ($content == $uname . ":" . $pass) {
                $is_valid = true;
                break;
            }
        }
        fclose($file);

        if ($is_valid) {
            echo "<script>alert('Access granted!');</script>";
        } else {
            echo "<script>alert('Incorrect');</script>";
        }
    }
    ?>
</body>
</html>
