<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Anime Streaming Website</title>

  <!-- Swiper.js -->
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

  <!-- Fork Awesome CDN Link -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fork-awesome@1.2.0/css/fork-awesome.min.css"
    integrity="sha256-XoaMnoYC5TH6/+ihMEnospgm0J1PM/nioxbOUdnM8HY=" crossorigin="anonymous">

  <!-- CSS Stylesheet -->
<link rel="stylesheet" href="veedu.css">
</head>
<body>
    <!-- Navigation -->
<header id="main-header">
  <div class="icons">
    <i class="fa fa-bars" id="menu-bars"></i>
  </div>
  <div class="logo">
    <img src="projectmain/image/disentlogo.png" alt="Logo">
  </div>
</div>
<form id="search-form" action="result.html" method="GET">
  <div class="search-container">
    <input id="search-input" type="search" name="movie" placeholder="Search for a movie...">
    <span class="search-addon">
      <i class="fa fa-search" aria-hidden="true"></i>
      <button type="submit" class="filter-btn">Search</button>
    </span>
  </div>
</form>
  <div class="overlay" id="menu-overlay"></div>
  <div class="side-menu" id="side-menu">
    <button class="btn" id="menu-close-button"><i class="fa fa-angle-left" aria-hidden="true"></i>Close menu</button>
<button class="btn" id="community-button"><i class="fa fa-comments" aria-hidden="true"></i>Community</button>
    <div class="links">
      <a href="userprofile.html"><p>user-profile</p></a>
      <a href="projfi.html"><p>Home</p></a>
      <a href="tamildub.html"><p>TAMIL MOVIE</p></a>
      <a href="ENGLISHMOVIES.html"><p>ENGLISH MOVIE</p></a>
      <p>______________</p>
      <a href="anime.html"><p>ANIME</p></a>
      <a href="CARTOON.html"><p>CARTOON</p></a>
      <a href="horror.html"><p>HORROR</p></a>
      <a href="thriller.html"><p>THRILLER</p></a>
      <a href="comedy.html"><p>COMEDY</p></a>
      <a href="romance.html"><p>ROMMANCE</p></a>
      <a href="action.html"><p>ACTION</p></a>
      <a href="fantacy.html"><p>FANTACY</p></a>
      <a href="drama.html"><p>DRAMA</p></a>
      <a href="scifi.html"><p>SCI-FI</p></a>
    </div>
  </div>
</header>
<br><br><br>
<h2>NEW UPDATED MOVIES</h2>

<div class="movie-container">
    <?php
    include_once('database_connection.php');
    
    // Fetch movie details from the database
    $sql = "SELECT * FROM movies";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $count = 0;
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
                // Start a new row after every 5 images
                if ($count % 5 == 0) {
                    echo "<div class='row'>";
                }
                echo "<div class='movie'>";
                // Link poster image to player3.php with embedded video link
                echo "<a href='player3.php?video=" . $embedLink . "'><img src='" . $posterURL . "' alt='" . $row["imdb_id"] . "'></a>";
                echo "</div>";
                $count++;
                // Close the row after every 5 images
                if ($count % 5 == 0) {
                    echo "</div>";
                }
            }
        }
    } else {
        echo "No movies available.";
    }
    ?>
</div>
</body>
<script>// HEADER::START
const menuOverlay = document.getElementById("menu-overlay");
const menuBars = document.getElementById("menu-bars");
const sideMenu = document.getElementById("side-menu");
const menuCloseButton = document.getElementById("menu-close-button");
const htmlElement = document.querySelector('html');

menuBars.addEventListener("click", function() {
  // Disable scrolling outside the side menu 
  htmlElement.style.overflowY = "hidden";

  sideMenu.classList.add("show");
  menuOverlay.style.display = "block";
});

menuOverlay.addEventListener("click", function() {
  sideMenu.classList.remove("show");
  sideMenu.classList.toggle("menu-active");
  htmlElement.style.overflowY = "auto";
  menuOverlay.style.display = "none";
});

menuCloseButton.addEventListener("click", function() {
  sideMenu.classList.remove("show");
  sideMenu.classList.toggle("menu-active");
  menuOverlay.style.display = "none";
  htmlElement.style.overflowY = "auto";
});

// Makes the header blur the background if the page is scrolled down.
// Only in screens with witdh greater than 1300px.
const header = document.getElementById("main-header");

window.addEventListener("scroll", () => {
  if (window.scrollY > 0 && window.innerWidth > 1300) {
    header.style.backgroundColor = "rgba(0, 0, 0, 0.5)";
    header.style.backdropFilter = "blur(10px)";
  } else {
    header.style.backgroundColor = "";
    header.style.backdropFilter = "";
  }
});
// HEADER::END
</script>
</html>
