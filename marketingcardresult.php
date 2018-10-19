<?php

$product=$_POST["name"];
$price=$_POST["price"];
$carrier=$_POST["carrier"];
$type=$_POST["type"];


echo "<div style='position:relative;'>";
    ######## Background picture ############
    echo "<div style=';text-align:center;margin:auto;position:absolute;float:left;'>";
        echo " <img style='z-index:-8;width:4in;height:6in;' src='http://mobilerepairtechs.com/mcbackground1.png'";
    echo "</div>";

     ############ Product Price ###########
    echo "<div style='text-shadow:black 0.1em 0.1em 0.2em;z-index:10;position:absolute;width:120px;top:35px;float:left;left:260px;color:rgb(255,255,255 );'>";
        echo "<h1 style='top:55px;position:relative;z-index:6;height:;text-align:center;'>$$price</h1>". "";
    echo "</div>";

     ############ Product Name ###########

    echo "<div style='text-shadow:black 0.1em 0.1em 0.2em;z-index:10;position:absolute;top:230px;float:left;width:100%;color:rgb(255,255,255 );text-align:center'>";
        echo "<h1 style='font-size:43px;text-transform:uppercase;top:55px;position:relative;z-index:6;height:;'>$product</h1>". "";
    echo "</div>";


    ############ Type##########
if($type ==='Game') {
    echo "<div style='z-index:10;position:absolute;top:-50px;float:left;width:100%;color:white;text-align:center'>";
        echo "<h1 style='top:55px;position:relative;z-index:6;height:;'><img style='width:3in;' src='http://mobilerepairtechs.com/games.png' ></h1>". "";
    echo "</div>";
    };


     ############ Carrier Name ###########


if($carrier ==='T-Mobile') {
    echo "<div style='z-index:10;position:absolute;top:350px;float:left;width:100%;color:white;text-align:center'>";
        echo "<h1 style='top:55px;position:relative;z-index:6;height:;'><img style='width:3in;' src='http://mobilerepairtechs.com/tmobile.png' ></h1>". "";
    echo "</div>";
    };

if($carrier ==='AT&T') {
    echo "<div style='z-index:10;position:absolute;top:350px;float:left;width:100%;color:white;text-align:center'>";
        echo "<h1 style='top:55px;position:relative;z-index:6;height:;'><img style='width:2in;' src='http://mobilerepairtechs.com/attt.png' ></h1>". "";
    echo "</div>";
    };

if($carrier ==='Cricket') {
    echo "<div style='z-index:10;position:absolute;top:350px;float:left;width:100%;color:white;text-align:center'>";
        echo "<h1 style='top:55px;position:relative;z-index:6;height:;'><img style='width:3in;' src='http://mobilerepairtechs.com/cricket.png' ></h1>". "";
    echo "</div>";
    };

if($carrier ==='Unlocked') {
    echo "<div style='z-index:10;position:absolute;top:335px;float:left;width:100%;color:white;text-align:center'>";
        echo "<h1 style='top:55px;position:relative;z-index:6;height:;'><img style='width:1.2in;' src='http://mobilerepairtechs.com/Unlocked2.png' ></h1>". "";
    echo "</div>";
    };

if($carrier ==='Verizon') {
    echo "<div style='z-index:10;position:absolute;top:320px;float:left;width:100%;color:white;text-align:center'>";
        echo "<h1 style='top:55px;position:relative;z-index:6;height:;'><img style='width:2.0in;' src='http://mobilerepairtechs.com/verizon.png' ></h1>". "";
    echo "</div>";
    };

if($carrier ==='MetroPCS') {
    echo "<div style='z-index:10;position:absolute;top:360px;float:left;width:100%;color:white;text-align:center'>";
        echo "<h1 style='top:55px;position:relative;z-index:6;height:;'><img style='width:3in;' src='http://mobilerepairtechs.com/metro.png' ></h1>". "";
    echo "</div>";
    };

if($carrier ==='Boost') {
    echo "<div style='z-index:10;position:absolute;top:360px;float:left;width:100%;color:white;text-align:center'>";
        echo "<h1 style='top:55px;position:relative;z-index:6;height:;'><img style='width:3in;' src='http://mobilerepairtechs.com/boost.png' ></h1>". "";
    echo "</div>";
    };

if($carrier ==='StraightTalk') {
    echo "<div style='z-index:10;position:absolute;top:345px;float:left;width:100%;color:white;text-align:center'>";
        echo "<h1 style='top:55px;position:relative;z-index:6;height:;'><img style='width:1.7in;' src='http://mobilerepairtechs.com/straighttalk.png' ></h1>". "";
    echo "</div>";
    };

if($carrier ==='Wifi') {
    echo "<div style='z-index:10;position:absolute;top:340px;float:left;width:100%;color:white;text-align:center'>";
        echo "<h1 style='top:55px;position:relative;z-index:6;height:;'><img style='width:1.2in;' src='http://mobilerepairtechs.com/wifi1.png' ></h1>". "";
    echo "</div>";
    };


if($carrier ==='Sprint') {
    echo "<div style='z-index:10;position:absolute;top:360px;float:left;width:100%;color:white;text-align:center'>";
        echo "<h1 style='top:25px;position:relative;z-index:6;height:;'><img style='width:3in;' src='http://mobilerepairtechs.com/sprint2.png' ></h1>". "";
    echo "</div>";
    };




echo "</div>";

#include ('footer.php');
?>