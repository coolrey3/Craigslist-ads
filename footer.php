<?php
#############footer info##########
echo "<style> a {color:white;}</style>";
$footer=array("<a href='http://start.mobilerepairtechs.com'>POS</a>",
              "<a href='http://www.mobilerepairtechs.com/'>Website Front End</a>" ,
              "<a href='http://www.mobilerepairtechs.com/MRTbovada2018' >Website Back End</a>",
              "<a href='http://facebook.com/mobilerepairtechs'>Facebook</a>",
              "<a href='http://task.mobilerepairtechs.com'>Tasks</a>",
              "<a href='http://mc.mobilerepairtechs.com'>Marketing Cards</a>",
              "<a href='http://code.raymercedes.com/clist.php'>Craigslist Ad's</a>"

             );

sort($footer);


echo "<div style='height:20px;color:white;
      background-color:#222;bottom:0;text-align:center;
      width:100%;position:absolute;>";

echo "
        <table style='width:100%';color:white;>
           <tr style='align-text:center;width:100%;color:white;'>";


echo "<div style='color:white';>";


echo "| ";
foreach($footer as $footer) {
                                echo "<td style='text-decoration-color:white;'> $footer  | </td>";   
                            }
echo "</div>";

echo "</div>";
?>