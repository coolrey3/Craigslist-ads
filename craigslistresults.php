<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalized Ads</title>
    <link rel="stylesheet" type="text/css" href="craigslist.css">
    <style>
        body {
            background-color: #f0f0f0;
            margin: 0px;
            text-align: center;
        }
        .header {
            width: 100%;
            background-color: #08c;
            color: white;
            padding: 3px;
        }
        .ad-container {
            padding-top: 3px;
            background-color: white;
            width: 100%;
            margin: auto;
            text-align: center;
        }
        .ad-table {
            border-style: solid;
            border-width: .5px;
            margin: 26px;
        }
        .ad-body {
            text-align: left;
        }
        .subtitle {
            color: #555;
            margin: 0px 0px 0px 0px;
        }
    </style>
</head>
<body>

<?php
require_once __DIR__ . '/src/Utilities.php';

// Validate that we have POST data
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['quantity'])) {
    header('Location: index.php');
    exit('No form data received. Redirecting to start.');
}

// Validate quantity
$quantity = filter_var($_POST['quantity'], FILTER_VALIDATE_INT);
if ($quantity === false || $quantity < 1 || $quantity > 100) {
    header('Location: index.php');
    exit('Invalid quantity.');
}

// Validate required arrays exist
$requiredFields = ['type', 'brand', 'model', 'size', 'color', 'condition', 'carrier', 'price'];
foreach ($requiredFields as $field) {
    if (!isset($_POST[$field]) || !is_array($_POST[$field])) {
        header('Location: index.php');
        exit("Missing form field: {$field}");
    }
}

// Extract and sanitize all arrays
$brands     = array_map('sanitize', $_POST['brand']);
$colors     = array_map('sanitize', $_POST['color']);
$conditions = array_map('sanitize', $_POST['condition']);
$models     = array_map('sanitize', $_POST['model']);
$sizes      = array_map('sanitize', $_POST['size']);
$carriers   = array_map('sanitize', $_POST['carrier']);
$prices     = array_map('sanitize', $_POST['price']);
$types      = array_map('sanitize', $_POST['type']);
?>

    <div class='header'>
        <h1>Below are your <?php echo (int)$quantity; ?> Ads</h1>
    </div>

    <h3 class='subtitle'>
        Copy the information below and paste it in to your ad.
    </h3>

    <div>

<?php
for ($i = 0; $i < $quantity; $i++) {
    $adNum    = $i + 1;
    $brand    = $brands[$i]     ?? '';
    $model    = $models[$i]     ?? '';
    $size     = $sizes[$i]      ?? '';
    $color    = $colors[$i]     ?? '';
    $carrier  = $carriers[$i]   ?? '';
    $price    = $prices[$i]     ?? '';
    $condition = $conditions[$i] ?? '';
    $type     = $types[$i]      ?? '';
    $typeLower = strtolower($type);

    echo "<div class='ad-container'>";
    echo "<table class='ad-table'>";
    echo "<tr><th><br>Craigslist Ad #{$adNum}<br><br></th></tr>";

    echo "<tr><td>{$brand} {$model} {$size} {$color} ({$carrier}) 90-Day Warranty!!!<br><br>"
        . "{$price}<br><br>"
        . "Cell Phone Repair of Gainesville<br><br></td></tr>";

    echo "<tr><td><br><img src='./Images/store.jpg' alt='Store photo'><br><br></td></tr>";

    echo "<tr><td class='ad-body'>"
        . "Hey everyone, we currently have an {$brand} {$model} {$size} up for sale! "
        . "This {$typeLower} is in {$condition} condition, it's clean for activation "
        . "and is ready to be activated on {$carrier}. "
        . "All {$typeLower} purchases from us come with a 90-day warranty so you can "
        . "rest assured you'll have no problems with your new {$typeLower}.<br><br>"
        . "We also carry a wide range of accessories such as colored tempered glass, "
        . "cases, chargers, portable battery packs etc. Please stop by and check out "
        . "our growing inventory. We repair all electronic devices from phones and "
        . "tablets to computers, laptops, game consoles and more!<br><br>"
        . "All phones and tablets include charger block and cable<br><br>"
        . "Financing through PayPal credit is available for all purchases over \$99, "
        . "no payments and no interest for the first 6 months!<br><br>"
        . "Cell Phone Repair of Gainesville<br>"
        . "4203 NW 16th BLVD. Gainesville, FL. 32605<br>"
        . "Hours of operation: Monday-Saturday 10:00am-7:00pm<br>"
        . "Please Call: 352-575-0438 Text: 352-448-8408<br><br>"
        . "</td></tr>";

    echo "</table><br><br>";
    echo "</div>";
}
?>

    </div>

    <div class='footer'>
        <?php include_once('footer.php'); ?>
    </div>

</body>
</html>
