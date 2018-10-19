<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="craigslist.css"> 
    <form action='craigslistresults.php' method='post'> 
        <style> td {border-style:solid;border-width:.5px;} input {text-align:center;margin:auto;} 

 .header {
	background-color: #08c;
	text-align: center;
	width: 100%;
	margin: 0px;
     color:white
}

.title {
	color: white;
}

.inputs {
	text-align: center;
}

.userinput {
	text-align: center;
}

.table {
	width: 100%
}

td {text-align:center;}

body {
	margin: 0px
}


	width: 100%
    width:100%
}

        </style>

</head>
    <div class='header' style='text-align:center'>
        <h1 style='text-align:center'>
            Fill in information below and click generate button
        </h1>
    </div>
    <div class='inputs'>
        <input type="submit" value='Generate Ads'><br><br>
    </div>

<table class='table' style='width:100%; border-width:1px;border-style:solid;'>
            <tr>
                <th>#</th>
                <th>Type</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Storage Size</th>
                <th>Carrier</th>
                <th>Price</th>
            </tr>
            
            <tr>
                <?php 
                    $quantity=$_POST['quantity'];
                    $count = 1;
                    while ($count <=$quantity ) {


                        echo "<tr class='row' style ='border-width:.5px;border-style:'solid';>
                            <td>$count</td>
                            <td>
                                <input type='text' name='type$count' placeholder='Type'>
                            </td>

                            <td>
                                <input type='text' name='brand' placeholder='Brand'>
                            </td>
                            
                            <td>
                                <input type='text' name='model' placeholder='Model'>
                            </td>
                            
                            <td>
                                <input type='text' name='size' placeholder='GB'>
                            </td>
                            
                            <td>
                                <input type='text' name='carrier' placeholder='Carrier'>
                            </td>

                            <td>
                                <input type='text' name='price' placeholder='Price'>
                            </td>

                        </tr>
                        <input  type='hidden' name='count1' value='$count'>
                        ";
                        $count++;
                                            }
                echo "<input  type='hidden' name='quantity1' value='$quantity'>";

                ?>
            </tr>

        </table>

<?php
    include('footer.php');

?>
