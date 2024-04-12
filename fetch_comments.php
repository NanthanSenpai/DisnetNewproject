<?php
// Fetch comments from the database and return them as JSON
// Assuming you have a database connection established

// Example query to fetch comments from a hypothetical "comments" table
// $comments = $pdo->query("SELECT * FROM comments")->fetchAll(PDO::FETCH_ASSOC);

// Example output
$comments = [
    ['content' => 'This is a comment'],
    ['content' => 'Another comment'],
    // Add more comments as needed
];

echo json_encode($comments);
?>
