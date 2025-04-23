<?php 
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="Contact.css">
</head>
<body>
<?php include '../views/header.php'; ?>
    <div class="container">
        <h1>
            <span style="
            background: linear-gradient(#0c4c08,#197b12,#49a443);
            background-clip: text;
            color: transparent;">
            Contact Us
            </span>
            
        </h1>
        <div class="cards">
            <div class="vaccine-details">
                <div class="box">
                    <img src="Image-Contact/post-office-svgrepo-com.svg" alt="" class="svg">
                    <p class="txt">Post</p>
                    <p class="txt1">Epidemiology Unit, Minister of Health , 231,De saram place, Colombo 10
                    </p>
                </div>
    
            <div class="box">
                <img src="Image-Contact/device-mobile-svgrepo-com.svg" alt="" class="svg">
                <p class="txt">Telephone</p>
                <p class="txt">011-2695112</p>
            </div>
    
                <div class="box">
                    <img src="Image-Contact/brand-google-gmail-svgrepo-com.svg" alt="" class="svg">
                    <p class="txt">E-Mail</p>
                    <p class="txt">safe19@gmail.com"</p>
                </div>
    
                <div class="box">
                    <img src="Image-Contact/location-svgrepo-com.svg" alt="" class="svg">
                    <p class="txt">Vaccine Centers</p>

                    <form action="#">
                        <label for="dropdown"></label>
                        <select id="dropdown" name="dropdown" onchange="goToSite(this)">
                        <option value="https://www.bing.com/maps?q=asiri+hospital+location&FORM=HDRSC6&cp=6.893899%7E79.876721&lvl=16.0">Asiri Hospital</option>
                        <option value="https://www.bing.com/maps?q=hemas+hospital&FORM=HDRSC6&cp=6.878625%7E79.935365&lvl=16.0">Hemas Hospital</option>
                        <option value="https://www.bing.com/maps?q=lanka+hospitals&FORM=HDRSC6&cp=6.938936%7E79.854128&lvl=12.6">Lanka Hospital</option>
                        <option value="https://www.bing.com/search?pglt=43&q=nawaloka+hospital+colombo&cvid=bd1b98a110a843f89af2882f1702b38e&gs_lcrp=EgZjaHJvbWUqBggBEAAYQDIGCAAQRRg5MgYIARAAGEAyBggCEAAYQDIGCAMQABhAMgYIBBAAGEAyBggFEAAYQDIGCAYQABhAMgYIBxAAGEAyBggIEAAYQNIBCDMzMjJqMGoxqAIIsAIB&FORM=ANNTA1&PC=U531">Nawaloka Hospital</option>
                        <option value="https://www.bing.com/maps?q=ninewells+hospital+sri+lanka&FORM=HDRSC6&cp=6.894985%7E79.882901&lvl=16.0">Ninewells</option>

                        </select>
                    </form>

                                <script>
                                    function goToSite(select) {
                                        var selectedOption = select.options[select.selectedIndex].value;
                                        if (selectedOption !== "#") {
                                            window.location.href = selectedOption;
                                        }
                                    }
                                </script>
                         </select>
                </div>
                </div>
    
            </div>
        </div>
	</div>
	<br>
    <br>
     
    
    <div class="container5">
        <div class="contact-form">
            <centre><h3>Send us a message</h3></centre>
            <form method="post" action="insert.php">
                <div class="from-group">
                    <input type="text" name="pname" placeholder="*Enter Your Name" required>
                </div>

                <div class="from-group">
                    <input type="email" name="pemail" placeholder="*Enter Your Email" required>
                </div>

                <div class="from-group">
                    <textarea name="pmessage" placeholder="*Enter Your Message"></textarea required>
                </div>
                <button type="submit">Send Message</button>
            </form>
        </div>
    </div>
    <?php include '../views/footer.php'; ?>
</body>
</html>
