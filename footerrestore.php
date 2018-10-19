<?php
#############footer info##########
$footer=array("<a href='http://start.mobilerepairtechs.com'>POS</a>",
              "<a href='http://www.mobilerepairtechs.com'>Website Front End</a>" ,
              "Website Back End",
              "Facebook",
              "Tasks",
              "Marketing Cards"
             );

print_r($footer);


echo "<div style='height:20px;
      background-color:#222;bottom:0;text-align:center;
      width:100%;position:absolute;>";

echo "
        <table style='width:100%';color:white;>
           <tr style='align-text:center;width:100%;color:white;'>";


echo "<div style='color:white';>";

echo "| ";
foreach($footer as $footer) {
                                echo "<td style='text-decoration-color:white;'>$footer | </td>";   
                            }
echo "</div>";

echo "</div>";
?>