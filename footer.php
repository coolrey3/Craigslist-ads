<?php
#############footer info##########
echo "<style> a {color:white;}</style>";
$footer=array("'http://start.mobilerepairtechs.com'>POS",
              "'http://www.cellphonerepair.com/gainesville-fl'>Website Front End" ,
              "'https://www.cellphonerepair.com/gainesville-fl/login/' >Website Back End",
              "'http://facebook.com/mobilerepairtechs'>Facebook",
              "'http://localhost/randomize-duties/'>Tasks",
              "'http://localhost/marketing-cards/'>Marketing Cards",
              "'http://localhost/craigslist-ads/'>Craigslist Ad's"

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
                                echo "<td style='text-decoration-color:white;'> <a  href=$footer </a> | </td>";   
                            }
echo "</div>";

echo "</div>";
?>