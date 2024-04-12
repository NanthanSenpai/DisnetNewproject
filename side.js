
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
 function toggleMode() {
    document.body.classList.toggle('dark-mode');
  }