// HEADER::START
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
document.addEventListener('DOMContentLoaded', () => {
  const searchForm = document.getElementById('search-form');

  searchForm.addEventListener('submit', async (event) => {
      event.preventDefault();

      const searchInput = document.getElementById('search-input').value;
      const apiKey = '43f37d67';
      const apiUrl = `http://www.omdbapi.com/?apikey=${apiKey}&s=${searchInput}`;

      try {
          const response = await fetch(apiUrl);
          const data = await response.json();

          if (data.Response === 'True') {
              // If there are results, redirect to result.html with search query
              window.location.href = `result.html?search=${searchInput}`;
          } else {
              // If no results, alert the user
              alert('No results found.');
          }
      } catch (error) {
          console.error('Error fetching data:', error);
      }
  });
});

// SCROW-TO-TOP-ARROW::START
document.addEventListener("DOMContentLoaded", function() {
  var scrollToTopButton = document.getElementById("scrollToTop");

  // Show the button when the user scrolls down 20px
  window.onscroll = function() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      scrollToTopButton.style.display = "block";
    } else {
      scrollToTopButton.style.display = "none";
    }
  };

  // Scroll to top when the button is clicked
  scrollToTopButton.addEventListener("click", function() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  });
});
// SCROW-TO-TOP-ARROW::END
//slider start::start
// Get the scroll container element
const scrollContainer = document.querySelector('.slideimage');

// Set the initial position for scrolling
let scrollPosition = 0;

// Define the scroll speed (adjust as needed)
const scrollSpeed = 2; // Higher values make it faster

// Function to scroll the images
function scrollImages() {
  scrollPosition += scrollSpeed;
  const containerWidth = scrollContainer.scrollWidth;

  if (scrollPosition >= containerWidth) {
    scrollPosition = 0; // Reset to the beginning
  }

  scrollContainer.style.transform = `translateX(-${scrollPosition}px)`;
  requestAnimationFrame(scrollImages);
}


// Start the animation
scrollImages();
//slider end::end

function showPopup() {
    // Your logic to show the popup
  }

  function openSidebar() {
    document.getElementById("sidebar").style.width = "250px";
  }

  function closeSidebar() {
    document.getElementById("sidebar").style.width = "0";
  }

  function search() {
    // Your search logic
  }
  $(".custom-carousel").owlCarousel({
    autoWidth: true,
    loop: true
  });
  $(document).ready(function () {
    $(".custom-carousel .item").click(function () {
      $(".custom-carousel .item").not($(this)).removeClass("active");
      $(this).toggleClass("active");
    });
  });
  

  function playMovie(videoUrl) {
    window.location.href = 'movie.html?src=' + encodeURIComponent(videoUrl);
  }

  function toggleMode() {
    const body = document.body;
    body.classList.toggle('dark-mode');
  }
  document.addEventListener('DOMContentLoaded', function() {
    // Retrieve search query from local storage
    const searchQuery = localStorage.getItem('searchQuery');

    // If search query exists, update the value of the search input field
    if (searchQuery) {
      document.getElementById('search-input').value = searchQuery;
    }

    // Store search query in local storage when form is submitted
    document.getElementById('search-form').addEventListener('submit', function(event) {
      const searchInput = document.getElementById('search-input');
      const query = searchInput.value.trim();

      // Store search query in local storage
      localStorage.setItem('searchQuery', query);
    });
  });

// Smooth scrolling for anchor links
$('a[href^="#"]').on('click', function(event) {
  var target = $(this.getAttribute('href'));
  if( target.length ) {
    event.preventDefault();
    $('html, body').stop().animate({
      scrollTop: target.offset().top
    }, 1000);
  }
});

// Add animations on scroll
$(window).scroll(function() {
  $('.fadeIn').each(function() {
    var position = $(this).offset().top;
    var scrollPosition = $(window).scrollTop();
    if (position < scrollPosition + $(window).height()) {
      $(this).addClass('animated fadeIn');
    }
  });
});
// Parallax scrolling effect
$(window).scroll(function() {
  var scrollTop = $(this).scrollTop();
  $('.parallax').css('top', -(scrollTop * 0.3) + 'px');
});



