<!DOCTYPE html>
<html>
    <head>
        <style>
            .phone {
                top:20px;
                min-width:500px;
                max-width:500px;
                z-index:-1;;
                position:absolute;

            }

            .repair {
                min-width:150px;
                max-width:150px;
                background-color:rgba(0,8,8,.6);
                border-radius:15px;
                z-index:1;
                border-spacing:50px;
                position:absolute;
                left:175px;
                top:155px;

            }
        </style>

    </head>

   <?php

$text=$_POST["test"];
$repair=$_POST["repair"];
$device=$_POST["device"];
echo "<div style='position:relative;'>";
echo "<img style=' max-width:400px;'";

    ###########Test text field#######

if ($text === 'value1') {
    echo $text;
    };

    ############ Device Type#########

if ($device === 'i4') {
        echo "<img class='phone' style='max-width:500' src='http://viberstore.co.uk/image/cache/data/Mobile%20Phone/Apple/iphone4-500x500.jpg'";
    };

if ($device === 'i5') {
        echo "<img class='phone' style='max-width:500' src='https://cdn.shopify.com/s/files/1/1936/3979/products/iphone5-white-ios8_20_d8269e9e-85f0-4456-860e-a8e507cffa62_2000x.jpg?v=1502921695'";
    };

if ($device === 'i5c') {
        echo "<img class='phone' style='max-width:500' src='https://images-na.ssl-images-amazon.com/images/I/51u%2BGLoyOJL.jpg'";
    };

if ($device === 'i5s') {
        echo "<img class='phone' style='max-width:500' src='https://staticshop.o2.co.uk/product/images/iphone-5s-silver-sku-header.png?cb=9176bf3c0b3787734388b25bce27a258'";
    };

if ($device === 'i5se') {
        echo "<img class='phone' style='max-width:500' src='https://www.91-img.com/pictures/apple-iphone-5se-mobile-phone-large-1.jpg'";
    };

if ($device === 'i6') {
        echo "<img class='phone' style='max-width:500' src='https://images-na.ssl-images-amazon.com/images/I/61Y%2BaVyaafL._SL1000_.jpg'";
    };

if ($device === 'i6+') {
        echo "<img class='phone' style='max-width:500' src='https://support.t-mobile.com/___sbsstatic___/sftp-sync/images/devices/apple/iphone-6-plus/apple-iphone-6-plus-00-silver-380x380-hero.png'";
    };

if ($device === 'i6s') {
        echo "<img class='phone' style='max-width:500;max-height=550;maxWidth=642' src='https://www.skymartbw.com/wp-content/uploads/2015/10/Apple-Iphone-6S-rose-gold-cover.png'";
    };


if ($device === 'i6s+') {
        echo "<img class='phone' style='max-width:500' src='https://staticshop.o2.co.uk/product/images/iphone6s-plus-gld-sku-header.png?cb=8b5827b5ecc36434eac7d83a0e82d80b'";
    };

if ($device === 'i7') {
        echo "<img class='phone' style='max-width:500' src='https://static.dam.com.bd/resources/uploads/prod_men_img/5046_menu_img.png'";
    };

if ($device === 'i7+') {
        echo "<img class='phone' style='max-width:500' src='https://ng.jumia.is/xfOhutDHSuuOHDSbCghsSjEUzgY=/fit-in/500x500/filters:fill(white)/product/22/28206/1.jpg?9535'";
    };
if ($device === 'i8') {
        echo "<img class='phone' style='max-width:500' src='https://www.sreakerrepair.com/wp-content/uploads/2015/07/iphone-5.png'";
    };

if ($device === 'i8+') {
        echo "<img class='phone' style='max-width:500' src='https://www.sreakerrepair.com/wp-content/uploads/2015/07/iphone-5.png'";
    };


if ($device === 'ix') {
        echo "<img class='phone' style='max-width:500' src='https://www.sreakerrepair.com/wp-content/uploads/2015/07/iphone-5.png'";
    };

if($device ==='TV') {
    echo "<div style='z-index:10;position:absolute;top:-50px;float:left;width:100%;color:white;text-align:center'>";
        echo "<h1 style='top:55px;position:relative;z-index:6;height:;'><img style='width:3in;' src='http://mobilerepairtechs.com/games.png' ></h1>". "";
    echo "</div>";
        echo "tv print";
    };

     ############ Repair Type ###########


if($repair ==='water') {
  #  echo "<div style='z-index:10;float:left;width:100%;color:white;text-align:center'>";
        echo "<h1 style='position:relative;'><img class='repair'style='width:1in; top:205px;' src='https://cdn1.iconfinder.com/data/icons/renewable-energy/128/icon_renewable_energy1_for_icon-04-256.png' ></h1>". "";
    echo "</div>";
    };

if($repair ==='glass') {
    echo "<div style='z-index:10;position:absolute;top:350px;float:left;width:100%;color:white;text-align:center'>";
        echo "<h1 style='left:-10px;top:55px;position:relative;z-index:6;height:;'><img class='repair'style='width:2in;' src='https://dl.myket.ir/imageresizing/icon/small/com.mmapps.mobile.cracked.screen.png' ></h1>". "";
    echo "</div>";
    };

if($repair ==='lcd') {
    echo "<div style='z-index:10;position:absolute;top:350px;float:left;width:100%;color:white;text-align:center'>";
        echo "<h1 style='left:10px;top:55px;position:relative;z-index:6;height:;'><img class='repair' style='width:3in;' src='/lcd.png' ></h1>". "";
    echo "</div>";
    };

if($repair ==='charger') {
    echo "<div style='z-index:10;position:absolute;top:335px;float:left;width:100%;color:white;text-align:center'>";
        echo "<h1 style='left:10px;top:55px;position:relative;z-index:6;height:;'><img class='repair' style='width:1.2in;' src='https://image.flaticon.com/icons/png/128/196/196513.png' ></h1>". "";
    echo "</div>";
    };

if($repair ==='camera') {
    echo "<div style='z-index:10;position:absolute;top:320px;float:left;width:100%;color:white;text-align:center'>";
        echo "<h1 style='top:55px;position:relative;z-index:6;height:;'><img class='repair' style='width:2.0in;' src='https://biologicwine.co.za/wp-content/uploads/2012/03/Camera-Image.png' ></h1>". "";
    echo "</div>";
    };

if($repair ==='speaker') {
    echo "<div style='z-index:10;position:absolute;top:360px;float:left;width:100%;color:white;text-align:center'>";
        echo "<h1 style='left:10px;top:55px;position:relative;z-index:6;height:;'><img class='repair' style='width:3in;' src='http://www.free-icons-download.net/images/green-speaker-button-icon-17909.png' ></h1>". "";
    echo "</div>";
    };

if($repair ==='hdd') {
    echo "<div style='z-index:10;position:absolute;top:360px;float:left;width:100%;color:white;text-align:center'>";
        echo "<h1 style='top:55px;position:relative;z-index:6;height:;'><img class='repair' style='width:3in;' src='http://mobilerepairtechs.com/boost.png' ></h1>". "";
    echo "</div>";
    };

if($repair ==='battery') {
    echo "<div style='z-index:10;position:absolute;top:325px;float:left;width:100%;color:white;text-align:center'>";
        echo "<h1 style='left:0px;top:55px;position:relative;z-index:6;height:;'><img class='repair' style='width:1.7in;' src='https://cnet3.cbsistatic.com/img/4M1qa990ihJ7NnV5Uw10_9lF8Zo=/fit-in/270x0/2011/10/11/b06f36bc-fdc2-11e2-8c7c-d4ae52e62bcc/EmptyBatteryIconX.png' ></h1>". "";
    echo "</div>";
    };

if($repair ==='Wifi') {
    echo "<div style='z-index:10;position:absolute;top:340px;float:left;width:100%;color:white;text-align:center'>";
        echo "<h1 style='top:55px;position:relative;z-index:6;height:;'><img class='repair' style='width:1.2in;' src='http://mobilerepairtechs.com/wifi1.png' ></h1>". "";
    echo "</div>";
    };


if($carrier ==='Sprint') {
    echo "<div style='z-index:10;position:absolute;top:360px;float:left;width:100%;color:white;text-align:center'>";
        echo "<h1 style='top:25px;position:relative;z-index:6;height:;'><img class='repair' style='width:3in;' src='http://mobilerepairtechs.com/sprint2.png' ></h1>". "";
    echo "</div>";
    };
echo "</div>";

?>
<body>

    </body>
</html>