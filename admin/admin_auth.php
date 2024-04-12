<?php
session_start();
if(isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_dashboard.html");
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate admin credentials (you should implement this securely with hashing)
    if($username === 'nanthan' && $password === 'pugalenthi') {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin_dashboard.html");
        exit();
    } else {
        echo "Invalid username or password";
    }
}
?>
