<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="craigslist.css">
    <title>Craigslist Ad Form</title>
    <style>
        td {
            border-style: solid;
            border-width: .5px;
            text-align: center;
        }
        input {
            text-align: center;
            margin: auto;
            width: 100px;
        }
        .tables {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<?php
// Validate quantity from POST
$quantity = 0;
if (isset($_POST['quantity'])) {
    $quantity = filter_var($_POST['quantity'], FILTER_VALIDATE_INT);
}

// Redirect back if quantity is invalid
if ($quantity === false || $quantity < 1 || $quantity > 100) {
    header('Location: index.php');
    exit('Invalid quantity. Please enter a number between 1 and 100.');
}
?>

    <form action='craigslistresults.php' method='post'>

    <div class='header'>
        <h1>Fill in information below and click generate button</h1>
    </div>

    <div class='inputs'>
        <input type="submit" value='Generate Ads'><br><br>
    </div>

    <div class='tables'>
        <table class='table' style='width:100%; border-width:1px; border-style:solid; margin:8px;'>
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

<?php
for ($count = 1; $count <= $quantity; $count++) {
    echo "<tr class='row'>
        <td>{$count}</td>
        <td>
            <select name='type[]'>
                <option value='Phone'>Phone</option>
                <option value='Computer'>Computer</option>
                <option value='Console'>Game Console</option>
                <option value='Laptop'>Laptop</option>
                <option value='Tablet'>Tablet</option>
                <option value='TV'>TV</option>
                <option value='Accessory'>Accessory</option>
            </select>
        </td>

        <td>
            <input type='text' name='brand[]' placeholder='Brand' required>
        </td>

        <td>
            <input type='text' name='model[]' placeholder='Model' required>
        </td>

        <td>
            <input type='text' name='size[]' value=' GB'>
        </td>

        <td>
            <input type='text' name='color[]' placeholder='Color'>
        </td>

        <td>
            <select name='condition[]'>
                <option value='Great'>Great</option>
                <option value='Mint'>Mint</option>
                <option value='Excellent'>Excellent</option>
                <option value='Good'>Good</option>
                <option value='Fair'>Fair</option>
                <option value='Poor'>Poor</option>
                <option value='Broken'>Broken</option>
                <option value='As-Is'>As-Is</option>
            </select>
        </td>

        <td>
            <select name='carrier[]'>
                <option value='AT&amp;T'>AT&amp;T</option>
                <option value='Cricket'>Cricket</option>
                <option value='T-Mobile'>T-Mobile</option>
                <option value='Verizon'>Verizon</option>
                <option value='Boost'>Boost</option>
                <option value='Straight Talk'>Straight Talk</option>
                <option value='Sprint'>Sprint</option>
                <option value='Unlocked'>Unlocked</option>
            </select>
        </td>

        <td>
            <input type='text' name='price[]' placeholder='$' required>
        </td>
    </tr>";
}
?>

            <input type='hidden' name='quantity' value='<?php echo (int)$quantity; ?>'>
        </table>
    </div>

    </form>

    <div class='footer'>
        <?php include_once('footer.php'); ?>
    </div>

</body>
</html>
