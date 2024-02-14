<?php 
session_start();

$xml = simplexml_load_file("data.xml") or die("Error: Cannot create object");

$xml = simplexml_load_string(str_replace('&#13;', '', file_get_contents('data.xml')));
?>

<!DOCTYPE HTML>
<html>
    <head>
        <link rel="icon" href="../css/image/icon.png" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sta. Cruz</title>
        <link rel="stylesheet" href="../css/style2.css">
    </head>
    <body>
        <div class="front"></div>
        <div class="line"></div>
        <div class="container">
            <div class="navbar">
            <a href="../index.php"><img src="../css/image/logo3.2.png" class="logo"></a>
                <nav>
                    <ul>
                        <li class="contact"><a href="../accomodation/bookstacruz.php">Nearby Hotels & Resto</a></li>
                    </ul>
                </nav>
                <img src="../css/image/menu2.png" class="menu-icon">
            </div>
        </div>
        <?php foreach($xml->stacruz as $stacruz) { ?>
        <div class="row">
            <div class="col">
                <h1><?php echo $stacruz->title;?></h1>
                <p><?php echo $stacruz->welcome;?></p>
            </div>
            <div class="col">
                <a href="../spots/panuluyan.php"><div class="card card1-71">
                <h5><?php echo $stacruz->panuluyan->title;?></h5>
                </div></a>

                <a href="../spots/maniwaya.php"><div class="card card2-72">
                <h5><?php echo $stacruz->maniwaya->title;?></h5>
                </div></a>

                <a href="../spots/hakupan.php"><div class="card card3-73">
                <h5><?php echo $stacruz->hakupan->title;?></h5>
                </div></a>
            </div>
        </div>
        <?php } ?>
    </body>  
</html>


