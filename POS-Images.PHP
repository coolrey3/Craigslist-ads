<?php

######## body css ####################
echo"<body><style> body {
                        margin:0;width:100%;background-color:#f7f7f7;color:white; background-size:cover;background-image:url('http://www.digitalplatforms.co.za/wp-content/uploads/2015/11/Website-Design-Background.png')}
                        </style>";

##################### Header #############################
echo "<h1 style='width:100%;text-align:center;color:white;border-color:black;border-width:.5px;padding:10px;border-style:solid;background-color:#08c;margin:0;'>
        Repair Service Image Generator
      </h1>";
echo "<form action='imageresults.php' method='post'>";
############# Left Navigation ################
echo "<div style='display:flex;'>";
    echo "<div style='width:20%;float:left;text-align:center;border-style:;border-width:.3px;margin:5px;border-radius: 15px 15px 15px 15px;'> ";
      echo "<div style='left:0px;position:absolute;width:100px;border-radius:10px;background-color:rgba(0, 0, 0, 0.2);margin:1px;'>";
        echo "<h3 style='text-decoration:underline;margin-bottom:0px;'>Templates</h3>";
        echo "Iphone 7+<br>";
        echo "Iphone 7<br>";
        echo "Iphone 6s+<br>";
        echo "Iphone 6s<br>";
        echo "Iphone 6+<br>";
        echo "Iphone 6s<br>";
        echo "Iphone 6<br>";
        echo "Iphone 55<br>";
        echo "Iphone 5c<br>";
        echo "Iphone 5<br>";
      echo"</div>";
    echo "</div>";

###################### User Input ####################
    echo "<div style='text-align:center;width:80%;vertical-align:center;margin:auto;float:right;'><br>";


        echo " Device:";

        echo "                   <select name='device'>
                                    <option value= 'i4' >iPhone 4 Series</option>
                                    <option value= 'i5' >iPhone 5</option>
                                    <option value= 'i5c' >iPhone 5C</option>
                                    <option value= 'i5s' >iPhone 5S</option>
                                    <option value= 'i5se' >iPhone 5 SE</option>
                                    <option value= 'i6' >iPhone 6</option>
                                    <option value= 'i6+' >iPhone 6+</option>
                                    <option value= 'i6s' >iPhone 6s</option>
                                    <option value= 'i6s+' >iPhone 6s+</option>
                                    <option value= 'i7' >iPhone 7</option>
                                    <option value= 'i7+' >iPhone 7+</option>
                                    <option value= 'i8' >iPhone 8</option>
                                    <option value= 'i8+' >iPhone 8+</option>
                                    <option value= 'ix' >iPhone X</option>
                                    <option value='Computer'>Computer</option>
                                    <option value='Console'>Game Console</option>
                                    <option value='Laptop'>Laptop</option>
                                    <option value='Tablet'>Tablet</option>
                                    <option value='TV'>TV</option>
                                    <option value='Accessory'>Accessory</option></select><br><br>";

        echo "<br><br>";

        echo " Type of Repair:<br><br> ";

        echo "
            <input type='radio' name='repair' value='water'> Water Damage 
            <input type='radio' name='repair' value='glass'> Cracked Glass Only
            <input type='radio' name='repair' value='battery'>Battery
            <input type='radio' name='repair' value='charger'>Charger Port
            <input type='radio' name='repair' value='speaker'>Speaker
            <input type='radio' name='repair' value='camera'>Camera
            <input type='radio' name='repair' value='lcd'>Cracked Glass and LCD
            <input type='radio' name='repair' value='diagnostic'>Free Diagnostic
            <input type='radio' name='repair' value='software'>Restore/Data Transfer
            <input type='radio' name='repair' value='Unlocked'>Jailbreak/Unlock<br><br>

            <br>";


        echo "<input type='submit' value='Generate'><br><br>";
    echo "</div>";
echo "</div>";

    echo "</body>";

###### FOoter############
include('footer.php' );


?>

<p>Open a new window, and resize the width and height to 500px:</p>

<button onclick="openWin() value=Generate">Create window</button>
<button onclick="resizeWin()">Resize window</button>

<script>
var myWindow;

function openWin() {
    myWindow = window.open("", "", "width=100, height=100");
}

function resizeWin() {
    myWindow.resizeTo(500, 500);
    myWindow.focus();
}
</script>