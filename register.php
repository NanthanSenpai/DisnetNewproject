<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    // Check if the mobile number contains only numeric characters
    if (!is_numeric($mobile)) {
        echo "Mobile number should contain only numeric characters.";
        exit();
    }

    // Check if the username already exists
    $check_query = "SELECT * FROM users WHERE username='$username'";
    $check_result = mysqli_query($conn, $check_query);
    
    if(mysqli_num_rows($check_result) > 0) {
        echo "Username already exists. Please choose a different one.";
    } else {
        // Perform a query to insert new user data into the database
        $insert_query = "INSERT INTO users (username, email, mobile, password) VALUES ('$username', '$email', '$mobile', '$password')";
        
        if (mysqli_query($conn, $insert_query)) {
            // Registration successful, redirect to login.html
            header("Location: login.html");
            exit();
        } else {
            // Registration failed
            echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
        }
    }
}
?>
