<?php
    include 'header.php';
?>

    <!--Adapted from https://www.w3schools.com/howto/howto_js_slideshow.asp-->

    <div class="Slideshow">
        <!--<img src="Images\index_pics\Slideshow_pic1.jpg" alt="First picture of carousel depicting food.">-->
        <div class="Slides fade">
            <img src="Images\index_pics\Slideshow_pic2.jpg" alt="Second picture of carousel depicting food.">
            <div class="caption"><h1>Welcome to the Chumm Buket!</h1></div>
        </div>

        <div class="Slides fade">
            <img src="Images\index_pics\Slideshow_pic3.jpg" alt="Third picture of carousel depicting food.">
            <div class="caption"><h2>We pride ourselves with a family friendly environment!</h2></div>
        </div>

        <div class="Slides fade">
            <img src="Images\index_pics\Slideshow_pic4.jpg" alt="Fourth picture of carousel depicting food.">
            <div class="caption"><h3>And love with all our dishes!</h3></div>
        </div>
        <!--<img src="Images\index_pics\Slideshow_pic5.jpg" alt="Fifth picture of carousel depicting food.">-->
    
        <div class="buttons">
            <a class="prev" onclick="plusSlide(-1)">&#10094;</a>
            <a class="next" onclick="plusSlide(1)">&#10095;</a>
        </div>

        <div class="navDot">    
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>
    </div>

    <br>

   

    <div class = "mainMenu">
        <a class = "mainMenuItem" href="about.php">About</a>
        <a class = "mainMenuItem" href="#menu.php">Menu</a>
        <a class = "mainMenuItem" href="contact.php">Contact</a>
        <a class = "mainMenuItem" href="#favourites.php">Favourites</a>
        <a class = "mainMenuItem" href="#login.php">Login</a>
    </div>

<?php
    include 'footer.php'
?>