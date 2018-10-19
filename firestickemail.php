<!DOCTYPE html> 
<html>
    <head>
    <title>Firestick Emails</title>
        <style> 
            body { text-align:center;}
            h1 { text-align:center; }
            th {border-style:solid;border-width:.5px;}
            td {border-style:solid;border-width:.5px;}
            table { text-align:center;width:100%;}
        </style>
    </head>

<body>

<h1>
    Firestick Emails
    </h1>

<form action="firestickemail.php" method="post">
    # of emails needed
<input type="text"name="emails"/>
<input type="submit" value="Generate">
    </form><br>
<table>

<?php
$n=$_POST["emails"];

echo "<th> #</th>";
echo "<th> Amazon E-mail</th>";
echo "<th> Password</th>";

for($i=1;$i<=$n;$i===$i++) {

    echo "<tr><td> $i.</td>";
    echo  "<td>firestick" . $i ."@mobilerepairtechs.com</td>";
    echo  "  <td>a2294294</td></tr>";

                            }?>

</table>
</body>
</html>