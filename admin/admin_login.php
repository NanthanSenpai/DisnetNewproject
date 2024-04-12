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
    if($username === 'admin' && $password === 'adminpassword') {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin_dashboard.html");
        exit();
    } else {
        echo "Invalid username or password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="container mx-auto mt-20 max-w-md">
    <h2 class="text-2xl font-bold mb-5">Admin Login</h2>

    <form action="admin_auth.php" method="post">
        <div class="mb-4">
            <label for="username" class="block text-sm font-semibold mb-1">Username:</label>
            <input type="text" id="username" name="username" required class="px-3 py-2 w-full border rounded-lg focus:outline-none focus:border-blue-500">
        </div>
        
        <div class="mb-6">
            <label for="password" class="block text-sm font-semibold mb-1">Password:</label>
            <input type="password" id="password" name="password" required class="px-3 py-2 w-full border rounded-lg focus:outline-none focus:border-blue-500">
        </div>
        
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Login</button>
    </form>
</div>

</body>
</html>
