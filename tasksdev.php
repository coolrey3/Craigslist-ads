<?php
######Head########
echo "<head> <title>Closing Assignments</title>
        <style> body {color:white;margin:0;background-color:#FAF0FF;
        background-image: url('http://www.digitalplatforms.co.za/wp-content/uploads/2015/11/Website-Design-Background.png');
        background-size:cover;}
        </style>
    </head>";

####Variables#######
$employees  = array("John","Ray","West","Garrett","Michael");
$task = array("Trash","Floors","Vacuum","WorkBenches","Display Cases","Windows");

##########Header#############
echo "<div style='width:100%;text-align:center;'>
<h1 style='box-shadow:inset 1px 1px rgba(255,255,255,0.1), 1px 1px rgba(0,0,0,0.1);
border-style: solid;border-color: black;border-width:.5px;
padding:5px;WIDTH:100%;background-color:#08c;color:white;text-align:center;'> Daily Assignments</h1></div>
<form action='tasks.php' method='post'>";

########Instructions##########
echo "<h3 style='text-align:center'>Select the employees to assign tasks to.</h3>";

#######checkmarks##############
echo "<div style='text-align:center;margin-top:-5px;'>";
foreach($employees as $present) {
    echo "<input type='checkbox' name='$present' value='$present' style='width:4%;text-align:center;margin:auto;'>$present" ;
    };
echo "</div>";
###########Button###########
echo "<div style='margin:auto;text-align:center;'><br><input type='submit' value='Generate' style='margin:auto'><br><br></div>";

###############Table##########
echo 
 "<table style='height:43%;border-style:solid;width:90%;text-align:center;background-color:gray;margin:auto;'>
    <tr style='border-style:solid;'>
        <th style='color:red;background-color:white;border-style:solid;border-color:black;'>
            Task
        </th>
        <th style='color:green;background-color:white;border-style:solid;border-color:black;'>
            Employee
        </th>
   </tr>";

######employees#############
$employees  = array("John","Ray","West","Garrett","Michael","Eric");
$count =  0;

#############tasks#################
foreach($task as $task) {

              echo  "<tr>
                         <td style='background-color:white;border-style:solid;color:black'>
                              $task
                         </td>" .
                         "<td style='background-color:white;border-style:solid;color:black'>" . 
                             $current= $employees[array_rand($employees)] . 
                          "</td> 
                     </tr> " ;
                   
    if($current ='John') { unset($employees[0]); echo $current; echo $count;}
                    $count ++;
                        }
echo "</table>";

#############footer info##########

include('footer.php');



?>