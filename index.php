<?php
$name = '';
$date = date('Y-m-d');
if ($_POST) {
    // echo '<pre>';
    // var_dump($_POST); die;
    $name = $_POST['name'];
    $date = $_POST['date'];
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Here's Your Certificate</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css?ver=1" rel="stylesheet" />
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
                        <li><a href="index.php" class="active">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <!-- <li><a href="contact.php">Contact</a></li> -->
                    </ul>
                </nav>
                <img src="images/menu.png" alt="" class="menu-icon" onclick="togglemenu()">
            </div>
            <div class="row">
                <div class="col1">
                    <h1>Name Here</h1>
                    <form action="" method="post" autocomplete="off" id='myform' name="former">
                        <input type="text" value="<?= $name ?>" name="name" class="n_inpt" id="name" placeholder="eg: John Wick" maxlength="12" required>
                        <br>
                        <br>
                        <h1>Date Here</h1>
                        <input type="date" value="<?= $date ?>" name="date" class="date_inpt" id="date" required>
                        <br>
                        <button type="submit" id="btn">Submit Form<img src="images/fast-forward.png" class="arrow"></button>
                    </form>
                </div>
                <div class="col2">
                    <img src="images/graduate_cap.png" class="hat">
                    <div class="colorbox"></div>
                </div>
            </div>
            <div class="social_links">
                <img src="images/facebook.png">
                <img src="images/instagram.png">
                <img src="images/twitter.png">
            </div>
        </div>
        <div class="cont" id="cont" style="<?= $_POST ? 'display:block' : 'display:none' ?>">
            <center>
                <div class="certi" id="canvas-wrap">
                    <div class="close" id="modal-close" onclick="document.getElementById('cont').style.display='none'">+</div>
                    <canvas style="display:block" id="imageCanvas" width=900px height=650px>
                    </canvas>
                    <button onclick="print_pg()" class="btn3">PRINT CERTIFICATE</button>
                    <audio autoplay loop id="myAudio">
                        <source src="audio.mp3" type="audio/mpeg">
                    </audio>
                </div>
                <!-- <div class="certi">
            <img src="images/newtask.png">
        </div> -->
        </div>

        </center>
    </section>

    <script>
        var menuList = document.getElementById("menuList");
        menuList.style.maxHeight = "0px";

        function togglemenu() {
            if (menuList.style.maxHeight == "0px") {
                menuList.style.maxHeight = "250px";
            } else {
                menuList.style.maxHeight = "0px";
            }
        }

        var audio = document.getElementById('myAudio');
        document.querySelector('.close').addEventListener('click', function() {
            // document.querySelector('.cont').style.display = 'none';
            audio.pause();
            document.getElementById("myform").reset();

        });

        function PrintElem(elem) {
            var dataUrl = document.getElementById('imageCanvas').toDataURL();
            var mywindow = window.open('', 'PRINT', 'height=650,width=875');

            mywindow.document.write('<html><head><title>' + document.title + '</title>');
            mywindow.document.write('</head><body >');
            mywindow.document.write('<center><img src="' + dataUrl + '"></center>');
            mywindow.document.write('</body></html>');

            mywindow.document.close(); // necessary for IE >= 10
            mywindow.focus(); // necessary for IE >= 10*/

            mywindow.print();


            return true;
        }



        var text_title = "";
        var date = "";


        // 
        var canvas = document.getElementById('imageCanvas');
        var ctx = canvas.getContext('2d');
        console.log(ctx);
        var img = new Image();
        var audio = document.getElementById('myAudio');
        img.crossOrigin = "anonymous";

        window.addEventListener('load', DrawPlaceholder);

        function DrawPlaceholder() {
            img.onload = function() {
                // console.log('adshfgasdhfahsdf');
                DrawOverlay(img);
                DynamicText(img)
            }
            img.src = 'images/newtask.png';

        }

        function DrawOverlay(img) {
            ctx.drawImage(img, 0, 0);
            ctx.fillStyle = 'rgba(255, 255, 255, 0.01)';
            ctx.fillRect(0, 0, canvas.width, canvas.height);

        }

        function DrawText() {
            ctx.fillStyle = "#5c5440";
            ctx.textBaseline = 'middle';
            ctx.font = "35px 'Tangerine'";
            let text = document.getElementById('name').value;
            ctx.fillText(text, 356, 335);
            ctx.textAlign = "center";

        }

        function DrawText2() {
            ctx.fillStyle = "#b39250";
            ctx.textBaseline = 'middle';
            ctx.font = "16px 'cheltenhm_btroman'";
            let date = document.getElementById('date').value;
            ctx.fillText(date, 240, 490);
        }

        function DynamicText(img) {


            //  ctx.clearRect(0, 0, canvas.width, canvas.height);
            //  DrawOverlay(img);
            //  DrawText(); 
            //  DrawText2(); 
            //  text_title = "wd";

            //  ctx.clearRect(0, 0, canvas.width, canvas.height);
            //  DrawOverlay(img);
            DrawText();
            DrawText2();
            //  audio.play();
            //  date = "04-01-2021";

        }


        function convertToImage() {
            window.open(canvas.toDataURL('png'));

        }

        var css = '@page { size: landscape; }',
            head = document.head || document.getElementsByTagName('head')[0],
            style = document.createElement('style');

        style.type = 'text/css';
        style.media = 'print';

        if (style.styleSheet) {
            style.styleSheet.cssText = css;
        } else {
            style.appendChild(document.createTextNode(css));
        }

        head.appendChild(style)

        function print_pg() {
            var dataUrl = document.getElementById('imageCanvas').toDataURL();
            var mywindow = window.open('', 'PRINT', 'height=650,width=875');

            mywindow.document.write('<html><head><title>' + document.title + '</title>');
            mywindow.document.write('</head><body >');
            mywindow.document.write('<center><img src="' + dataUrl + '"></center>');
            mywindow.document.write('</body></html>');

            mywindow.document.close();
            mywindow.focus();

            window.print();

            return true;

        }

        let ac = setInterval(function() {
            let bl = document.getElementById('cont').style.display == 'none';
            if (bl) {
                audio.pause();
            } else {
                audio.play();
            }
        }, 1000);
    </script>

</body>
</html>