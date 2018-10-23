<!DOCTYPE html>
<html>
    <head>
        <title>Finalized Ad's</title>
        <style>.header {margin-bottom:;} body {background-image: url('http://www.digitalplatforms.co.za/wp-content/uploads/2015/11/Website-Design-Background.png');background-size:;margin:0px;text-align:center;} .header {width:100%;background-color:#08c;color:white;padding:3px;}</style>
    </head>
<body>

<?php
###### Variables ########
$count=$_POST['count'];
$brand=$_POST['brand'];
$color=$_POST['color'];
$condition=$_POST['condition'];
$model=$_POST['model'];
$size=$_POST['size'];
$carrier=$_POST['carrier'];
$price=$_POST['price'];
$quantity=$_POST['quantity'];
$type=$_POST['type'];
$model=$_POST['model'];

?>


    <div class='header'>

        <h1> Below are your <?php echo $quantity; ?> Ads</h1> 
    </div>
<h3  style='color:white;margin:0px 0px 0px 0px;'>
    Copy the information below and paste it in to your ad.
    </h3>



    <div style='background-color:;text-align:center;margin:auto;'>


<?php

           #for($counts =1;$count <= $quantity;$count++) {
    $counts = 1;

foreach ($_POST['type'] as $type)  {
    echo "<div style='padding-top:3px;background-color:white; width:100%;margin:auto;text-align:center;'>";
    echo "<table style='border-style:solid;border-width:.5px;margin:26px;'>";
    echo "
                     <tr>
                    <th>
                    <br>Craigslist Ad #$counts<br><br>
                    </th>
                 </tr>";


                    echo  "<td>". current($brand) ." ". current($model)." " . current($size). " " . current($color)." (" . current($carrier) .") 90-Day Warranty!!!<br><br>" .  current($price). " <br><br>Cell Phone Repair of Gainesville <br><br>
                   <tr><td> <br><img src='./images/store.jpg'></a> <br><br></td></tr>
                   <tr> <td style='text-align:left'> Hey everyone, we currently have an " . current($brand). " " . current($model) . " " . current($size) . " up for sale! This " . $type . " is in " . current($condition) . " condition, it's clean for activation and is ready to be activated on " . current($carrier) .". All $type purchases from us come with a 90-day warranty so you can rest assured you'll have no problems with your new $type.<br><br> We also carry a wide range of accessories such as colored tempered glass, cases, chargers, portable battery packs etc. Please stop by and check out our growing inventory. We repair all electronic devices from phones and tablets to computers, laptops, game consoles and more!<br><br>

All phones and tablets include charger block and cable<br><br>

Financing through PayPal credit is available for all purchases over $99, no payments and no interest for the first 6 months!<br><br>

Cell Phone Repair of Gainesville<br>
4203 NW 16th BLVD. Gainesville, FL. 32605<br>
Hours of operation: Monday-Saturday 10:00am-7:00pm<br>
Please Call: 352-575-0438 Text: 352-448-8408
 <br><br></td> </tr>

              </table><br><br>";


     next($model);
     next($brand);
     next($size);
     next($color);
     next($carrier);
     next($price);



    $counts++;
}
#echo "</table>";


/**foreach($_POST['model'] as $model) {
        echo "<td>$model</td>";}
    echo "<tr>";
#}*/
/**
    $counts = 1;
   while($counts <= $quantity) {

###### Variables ########
$count=$_POST['count1'];
$brand=$_POST['brand1'];
$color=$_POST['color1'];
$condition=$_POST['condition1'];
$model=$_POST['model'];
$size=$_POST['size'];
$carrier=$_POST['carrier1'];
$price=$_POST['price1'];
$quantity=$_POST['quantity1'];
$type=$_POST['type'];


        echo "<div style='padding-top:3px;background-color:white; width:85%;margin:auto;text-align:center;'>";
        echo "<table style='border-style:solid;border-width:.5px;margin:26px;'>
                 <tr>
                    <th>
                    <br>Craigslist Ad#$counts<br><br>
                    </th>
                 </tr>
                   <tr>  <td> $brand $model $size - $color - $carrier - 90-Day Warranty!!! <br><br> $price <br><br>Mobile Repair Techs <br><br></td>  </tr>
                   <tr><td> <img src='https://images.craigslist.org/00G0G_34RDV4dKEpS_600x450.jpg'></a> <br><br></td></tr>
                   <tr> <td style='text-align:left'> Hey everyone, we currently have an $brand $model $size up for sale! This " . current($type) . " is in $condition condition, it's clean for activation and is ready to be activated on $carrier. All $type purchased from us come with a 90-day warranty so you can rest assured you'll have no problems with your new $type.<br><br> We also carry a wide range of accessories such as colored tempered glass, cases, chargers, portable battery packs etc. Please stop by and check out our growing inventory. We repair all electronic devices from phones and tablets to computers, laptops, GAME CONSOLES and more!<br><br>

All phones and tablets include charger block and cable<br><br>

Financing through PayPal credit is available for all purchases over $99, no payments and no interest for the first 6 months!<br><br>

Mobile Repair Techs<br>
4203 NW 16th BLVD. Gainesville, FL. 32605<br>
Hours of operation: Monday-Saturday 10:00am-7:00pm, Sunday 12:00pm-5:00pm<br>
Please Call: 352-575-0438 Text: 352-448-8408
 <br><br></td> </tr>

              </table><br><br>";

        $counts++;
        next($type);
        echo " </div>";
    }
*/
    ?>













    </body>
    <div class='footer' style='position:relative;'>

<?php
    include('footer.php');

?>
    </div>
</html>