<?php

######## body css ####################
echo"<body><style> body {
                        margin:0;width:100%;background-color:#f7f7f7;color:white; background-size:cover;background-image:url('http://www.digitalplatforms.co.za/wp-content/uploads/2015/11/Website-Design-Background.png')}
                        </style>";

##################### Header #############################
echo "<h1 style='width:100%;text-align:center;color:white;border-color:black;border-width:.5px;padding:10px;border-style:solid;background-color:#08c;margin:0;'>
        Marketing Card Generator
      </h1>";
echo "<form action='marketingcardresult.php' method='post'>";
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

        echo " Name: <input type='text' name='name' value='Apple iPhone'><br><br>";

        echo " Price : <input type='text' name='price' value='9.99'><br><br>";

        echo " Type: 
            <input type='radio' name='type' value='Phone'> Phone 
            <input type='radio' name='type' value='Tablet'> Tablet
            <input type='radio' name='type' value='Game'>Game Console
            <input type='radio' name='type' value='Computer'>Computer<br><br>";

        echo " Carrier: 
            <input type='radio' name='carrier' value='T-Mobile'> T-Mobile 
            <input type='radio' name='carrier' value='AT&T'> AT&T
            <input type='radio' name='carrier' value='Cricket'>Cricket
            <input type='radio' name='carrier' value='Sprint'>Sprint
            <input type='radio' name='carrier' value='Verizon'>Verizon
            <input type='radio' name='carrier' value='MetroPCS'>MetroPCS
            <input type='radio' name='carrier' value='Boost'>Boost
            <input type='radio' name='carrier' value='StraightTalk'>StraightTalk
            <input type='radio' name='carrier' value='Wifi'>Wifi


            <input type='radio' name='carrier' value='Unlocked'>Unlocked<br><br>

            <br>";


        echo "<input type='submit' value='Generate'><br><br>";
    echo "</div>";
echo "</div>";

    echo "</body>";

###### FOoter############
include('footer.php' );


?>