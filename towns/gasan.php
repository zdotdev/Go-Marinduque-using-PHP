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
        <title>Gasan</title>
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
                        <li class="contact"><a href="../accomodation/bookgasan.php">Nearby Hotels & Resto</a></li>
                    </ul>
                </nav>
                <img src="../css/image/menu2.png" class="menu-icon">
            </div>
        </div>
        <?php foreach($xml->gasan as $gasan) { ?>
        <div class="row">
            <div class="col">
                <h1><?php echo $gasan->title;?></h1>
                <p><?php echo $gasan->welcome;?></p>
            </div>
            <div class="col">
                <a href="../spots/gaspar.php"><div class="card card1-51">
                <h5><?php echo $gasan->gaspar->title;?></h5>
                </div></a>

                <a href="../spots/saintjoseph.php"><div class="card card2-52">
                <h5><?php echo $gasan->saintjoseph->title;?></h5>
                </div></a>

                <a href="../spots/reyespark.php"><div class="card card3-53">
                <h5><?php echo $gasan->reyespark->title;?></h5>
                </div></a>
            </div>
        </div>
        <?php } ?>
    </body>  
</html>


