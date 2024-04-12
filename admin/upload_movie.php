<?php
session_start();
if(!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $imdbID = $_POST['imdb_id'];
    $embedLink = $_POST['embed_link'];

    include_once('database_connection.php');

    if ($conn) {
        $sql = "INSERT INTO movies (imdb_id, embed_link) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $imdbID, $embedLink);

        if ($stmt->execute()) {
            echo "Movie uploaded successfully!";
        } else {
            echo "Error uploading movie: " . $stmt->error;
        }
        $stmt->close();
        $conn->close();
    } else {
        echo "Database connection failed.";
    }
}
?>
