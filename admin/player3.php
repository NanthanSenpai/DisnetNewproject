<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Player</title>
    <style>
        body {
            background-color: silver;
        }

        .movie-poster {
            width: 100px; /* Adjust width as needed */
            margin-bottom: 10px;
            transition: transform 0.3s ease-in-out;
        }

        .movie-poster:hover {
            transform: scale(1.1);
        }

        .movie-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }
    </style>
</head>
<body>

<h2>Enjoy The Show</h2>

<div style="float: left; margin-right: 20px;">
    <?php
    if(isset($_GET['video'])) {
        $videoLink = $_GET['video'];
        echo "<iframe width='640' height='360' src='" . $videoLink . "' frameborder='0' scrolling='0' allowfullscreen></iframe>";
    } else {
        echo "No video specified.";
    }
    ?>
</div>

<div>
    <h3>Movie Posters</h3>
    <div class="movie-container">
        <?php
        // Include database connection
        include_once('database_connection.php');
        
        // Fetch movie details from the database
        $sql = "SELECT * FROM movies LIMIT 20"; // Limit to 20 posters
        $result = $conn->query($sql);
        
        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                // Get movie details from OMDB API using IMDB ID
                $imdbID = $row['imdb_id'];
                $apiKey = '43f37d67';
                $apiURL = "http://www.omdbapi.com/?apikey=$apiKey&i=$imdbID";
                $jsonData = file_get_contents($apiURL);
                $movieData = json_decode($jsonData, true);
                
                if ($movieData && isset($movieData['Poster'])) {
                    $posterURL = $movieData['Poster'];
                    $embedLink = $row['embed_link'];
                    echo "<a href='?video=$embedLink'><img src='$posterURL' class='movie-poster' alt='Movie Poster'></a>";
                }
            }
        } else {
            echo "No movies available.";
        }
        ?>
    </div>
</div>

</body>
</html>
