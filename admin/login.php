<?php
session_start(); // Initialize session handling
require('connection.inc.php');
require('function.inc.php');

$msg = "";

if (isset($_POST['submit'])) {
    // Get username and password from POST data
    $username = get_safe_value($con, $_POST['username']);
    $password = get_safe_value($con, $_POST['password']);

    // SQL query using prepared statement to check if username and password match
    $stmt = $con->prepare("SELECT * FROM admin_users WHERE username=? AND password=?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $res = $stmt->get_result();

    // Check if the query was executed successfully
    if ($res) {
        // Count the number of rows returned
        $count = mysqli_num_rows($res);

        // Check if username and password match
        if ($count > 0) {
            // If match, set session variables and redirect to categories.php
            $_SESSION['ADMIN_LOGIN'] = 'yes';
            $_SESSION['ADMIN_USERNAME'] = $username;
            header('location: index.php');
            exit(); // Terminate script after redirection
        } else {
            // If no match, display error message
            $msg = "Please Enter Correct Login Details";
        }
    } else {
        // If query execution failed, display error message
        $msg = "Query failed: " . mysqli_error($con);
    }
}
?>

<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <!-- Add other CSS files -->
</head>
<body class="bg-dark">
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-form mt-150">
                    <form method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                    </form>
                    <!-- Display error message -->
                    <div class="field_error"><?php echo $msg ?></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add script includes -->
</body>
</html>

