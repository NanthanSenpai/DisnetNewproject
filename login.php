<?php
include('db.php');

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform a query to check if username and password match
    // This is a basic example and not secure, use hashing for passwords in real scenarios
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Successful login, set session flag and redirect to projfi.html
        $_SESSION['login_success'] = true;
        header("Location: projfi.html");
        exit();
    } else {
        // Failed login
        $_SESSION['login_success'] = false;
        echo "Invalid username or password!";
    }
}
?>
