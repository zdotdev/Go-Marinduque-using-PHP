<?php
// start session
session_start();

// load XML file
$xml=simplexml_load_file('accomodate.xml') or die("Error: Cannot create object");

// to handle carriage return character
$xml = simplexml_load_string(str_replace('&#13;', '', file_get_contents('accomodate.xml')));
$imagePath = $xml->place->image;
$gasanMunicipality = $xml->xpath("//municipality[@id='Gasan']")[0];



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoMarinduque</title>
	<link rel="stylesheet" href="accomodate.css"> 
</head>
<body>
    <div class="whole">
        <div  class="navigation">
            
            <ul>
                <li><img src="images/logo.png" class="logo"></li>
                <li><img src="images/Custom-Icon-Design-Mono-General-3-Home.512.png"></li>
                <li><a href="../towns/gasan.php">Home</a></li>
                <li><img src="images/Icons8-Windows-8-City-Hotel.512.png"></li>
                <li><a href="">Hotels</a></li>
                <li><img src="images/Icons8-Ios7-Food-Cutlery.512.png"></li>
                <li><a href="restogasan.php">Restaurants</a></li>
                
                <li>
                    
                    <form class="search" method="POST">
                        <input type="text" placeholder="Hotel/Resto" name="search">
                        <input type="submit" value="Search" name="submit">
                    </form>
                </li>
            </ul>
               
        </div>
        <?php
                        // Check if the form is submitted
            if(isset($_POST['submit'])) {
            $search = $_POST['search'];?>
            <div  class="main">
                <div  class="left-side">
                    <?php   include 'map.html';?>
                    <h3>Places</h3>
                    <ul>
                    <?php // Echo the elements?>
                    <?php foreach ($gasanMunicipality->place as $place) { ?>
                        <li><a href=""><img src="<?php echo $place->image; ?>" alt="Place Image"><?php echo $place->name; ?><?php echo "<br>" .$place->location; ?></a></li>
                    <?php } ?>
                    </ul>
                </div>
                <?php  // Filter the places based on the search query
                $filteredPlaces = $xml->xpath("//municipality[@id='Gasan']/place[contains(name, '$search') or contains(location, '$search') or contains(description, '$search')]");

                if (count($filteredPlaces) > 0) {
                    // Display the filtered places?>
                    <div  class="content">
                <?php foreach ($filteredPlaces as $place) { ?> 
                    <div class="place-item">
                        <h1><?php echo $place->name; ?></h1>
                        <img src="<?php echo $place->image; ?>" alt="Place Image">
                        <p><strong>Location:</strong> <?php echo $place->location; ?></p>
                        <p><strong>Description:</strong> <?php echo $place->description; ?></p>

                        <form class="check" >
                            <input type="submit" value="Check Availability & Prices">
                        </form>
                        
                        <h3>Reviews:</h3>
                        <?php foreach ($place->reviews->review as $review) {?>
                            <p> <?php echo  "<strong>" ."Name:"."</strong>".$review->alias;?></p>
                            <p> <?php echo "<strong>" ."Rating:"."</strong>".$review->rate;?></p>
                        
                            <p> <?php echo "<strong>" ."Comment:"."</strong>".$review->comment;?></p>
                        
                            <p> <?php  echo "<br>";?></p>
                            <?php   }?>
                
                    
                    </div>
                <?php 
            
               }?>
            <?php } 
            else{
                echo "No results found.Please capitalize the firs letter and enter the correct spelling! ";
            }
            

            
   
        }
        else{?>
            <img src="images/Restaurants.png"width="100%" height="700px">
          
        <?php }?>
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