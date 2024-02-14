<?php
// start session
session_start();

// load XML file
$xml=simplexml_load_file('accomodate.xml') or die("Error: Cannot create object");

// to handle carriage return character
$xml = simplexml_load_string(str_replace('&#13;', '', file_get_contents('accomodate.xml')));
$imagePath = $xml->place->image;



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EZ.com</title>
	<link rel="stylesheet" href="accomodate.css"> 
</head>
<body>
    <div class="whole">
        <div  class="navigation">
            
            <ul>
                <li><img src="images/logo.png" class="logo"></li>
                <li><img src="images/Custom-Icon-Design-Mono-General-3-Home.512.png"></li>
                <li><a href="">Home</a></li>
                <li><img src="images/Icons8-Windows-8-City-Hotel.512.png"></li>
                <li><a href="">Hotels</a></li>
                <li><img src="images/Icons8-Ios7-Food-Cutlery.512.png"></li>
                <li><a href="">Restaurants</a></li>
                
                <li>
                    <form class="signin">
                        <input type="submit" value="Sign-in">
                    </form>
                    <form class="search" method="POST">
                        <input type="text" placeholder="Search..." name="search">
                    </form>
                </li>
            </ul>
               
        </div>

        

        
        <div  class="main">
            <div  class="left-side">
                <?php   include 'map.html';?>
                <h3>Places</h3>
                <ul>
                <?php // Echo the elements?>
                 <?php foreach ($xml->municipality->restaurant as $resto) { ?>
                    <li><a href=""><img src="<?php echo $resto->image; ?>" alt="Place Image"><?php echo $resto->name; ?><?php echo "<br>" .$resto->location; ?></a></li>
                <?php } ?>
                </ul>
                
            </div>

            <div  class="content">
            <?php foreach ($xml->municipality->place as $place) { ?>
                <div class="place-item">
                    <h1><?php echo $resto->name; ?></h1>
                    <img src="<?php echo $resto->image; ?>" alt="Place Image">
                    <p><strong>Location:</strong> <?php echo $resto->location; ?></p>
                    <p><strong>Description:</strong> <?php echo $resto->description; ?></p>

                    <form class="check"action="">
                         <input type="submit" value="Check Availability & Prices">
                    </form>
                    
                </div>
        <?php } ?>

                
            </div>
        </div>

        <div  class="footer">
            
            
            <ul>
                <li><h3>Contact Us</h3></li>
                <li><img src="images/Icons8-Ios7-Logos-Facebook.512.png"></li>
                <li> <img src="images/Pictogrammers-Material-Gmail.512.png"></li>
                <li><img src="images/Icons8-Ios7-Logos-Instagram.512.png"> </li>
                
            </ul>
            <p>&copy; <?php echo date("Y"); ?> EZ.com. All rights reserved.</p>
           
        </div>


        
    </div>
    
</body>
</html>