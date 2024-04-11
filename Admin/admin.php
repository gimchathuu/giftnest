<?php
session_start();

if(isset($_POST['btn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Establish database connection
    $conn = mysqli_connect('localhost', 'root', '', 'giftnest');

    // Check if connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    // Prepare and execute SQL query
    $sql = "SELECT * FROM admin WHERE username=? AND password=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Check if there are any rows returned
    if(mysqli_num_rows($result) > 0) {
        // Redirect to order.php if login successful
        header("Location: order.php");
        exit;
    } else {
        // Display error message if login failed
        echo "<script>alert('Woops! Username or Password is Wrong.')</script>";
    }

    // Close statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="Welcome">
        <h3>Welcome to the Admin Panel</h3>
    </div>

    <div class="container">
        <div class="admin-container">
            <form action="" method="post">
                <h3>Admin Login</h3>
                <input type="text" placeholder="Username" name="username" class="box" required>
                <input type="password" placeholder="Password" name="password" class="box" required>
                <input class="btn" type="submit" name="btn" value="Sign In">
            </form>
        </div>
    </div>
</body>
</html>
