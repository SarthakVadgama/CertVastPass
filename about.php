<!DOCTYPE html>
<html>
<head>
    <title>About us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/jquery-ui.css">    
 </head>
 <body bgcolor="black">
 <section class="header">
    <video autoplay loop muted class="vid">
        <source src="images/vid.mp4" type="video/mp4">
    </video>
<div class="container">
    <div class="navbar">
        <div class="logo">
            <h2>VAST PASS</h2>
            <h3>CERTIFICATION</h3>
        </div>
            <nav>
                <ul id="menuList">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php" class="active">About</a></li>
                    <!-- <li><a href="contact.php">Contact</a></li> -->
                </ul>
            </nav>
                <img src="images/menu.png" alt="" class="menu-icon" onclick="togglemenu()">
    </div>
    <center>
<!-- <div class="card"> -->
<div class="cardi">
    <h4>About Us</h4>
    <br>
    <br>
    <br>
    <p>Enough about us it's About You. Congratulations and we wish you much success on the road.
    </p>
    </div>
    <!-- </div> -->
</center>
<div class="social_links">
            <img src="images/facebook.png">
            <img src="images/instagram.png">
            <img src="images/twitter.png">
        </div>
</div>

</section>

<script>
        var menuList = document.getElementById("menuList");
        menuList.style.maxHeight = "0px";

        function togglemenu(){
            if(menuList.style.maxHeight == "0px")
            {
                menuList.style.maxHeight = "250px";
            }
            else
            {
                menuList.style.maxHeight = "0px";
            }
        }
        </script>
</body>

</html>