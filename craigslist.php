<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="craigslist.css"> 
    <form action='craigslistresults.php' method='post'> 
        <style> td {border-style:solid;border-width:.5px;} input {text-align:center;margin:auto;width:100px;}.tables {margin-bottom:30px;} 

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
    <body>

    <div class='header' style='text-align:center'>
        <h1 style='text-align:center'>
            Fill in information below and click generate button
        </h1>
    </div>
    <div class='inputs'>
        <input type="submit" value='Generate Ads'><br><br>
    </div>
<div class='tables'>

<table class='table' style='width:100%; border-width:1px;border-style:solid;margin:8px;'>
            <tr>
                <th>#</th>
                <th>Type</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Storage Size</th>
                <th>Color</th>
                <th>Condition</th>
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
                                <select name='type[]' >
                                    <option value='Phone'>Phone</option>
                                    <option value='Computer'>Computer</option>
                                    <option value='Console'>Game Console</option>
                                    <option value='Laptop'>Laptop</option>
                                    <option value='Tablet'>Tablet</option>
                                    <option value='TV'>TV</option>
                                    <option value='Accessory'>Accessory</option>


                            </td>

                            <td>
                                <input type='text' name='brand[]' placeholder='Brand'>
                            </td>

                            <td>
                                <input type='text' name='model[]' placeholder='Model'>
                            </td>

                            <td>
                                <input type='text' name='size[]' value=' GB'>
                            </td>

                            <td>
                                <input type='text' name='color[]' placeholder='Color'>
                            </td>

                            <td>
                                <select name='condition[]' >
                                    <option value='Great'>Great</option>
                                    <option value='Mint'>Mint</option>
                                    <option value='Excellent'>Excellent</option>
                                    <option value='Good'>Good</option>
                                    <option value='Fair'>Fair</option>
                                    <option value='Poor'>Poor</option>
                                    <option value='Broken'>Broken</option>
                                    <option value='As-Is'>As-Is</option>


                            </td>


                            <td>
                                <select name='carrier[]'>
                                    <option value='AT&T'>AT&T</option>
                                    <option value='Cricket'>Cricket</option>
                                    <option value='T-Mobile'>T-Mobile</option>
                                    <option value='Verizon'>Verizon</option>
                                    <option value='Boost'>Boost</option>
                                    <option value='Straight Talk'>Straight Talk</option>
                                    <option value='Sprint'>Sprint</option>
                                    <option value='Unlocked'>Unlocked</option>



                            </td>

                            <td>
                                <input type='text' name='price[]' placeholder='$'>
                            </td>

                        </tr>
                        <input  type='hidden' name='count' value='[]'>
                        ";
                        $count++;
                                            }
                echo "<input  type='hidden' name='quantity' value='$quantity'>";

                ?>
            </tr>

        </table>
        </div>

<div class='footer' style='position:sticky;bottom:0;with:100%;'>

    <?php
    include('../Frontend/footer.php');
?>
        </div>

    </body>
</html>
