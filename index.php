<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="craigslist.css">
    <title>Craigslist Automater</title>
    <style>
        body {
            margin: 0px;
        }
    </style>
</head>
<body>
    <form action='craigslist.php' method='post'>
    <div class="fullpage">

        <div class="header">
            <h1 class='title'>
                Craigslist Quick Lister
            </h1>
        </div>

        <div class='inputs'>
            <div class='instructions'>
                <p>
                    Please enter how many listings you want to make:
                </p>
            </div>

            <div class='userinput'>
                <input type='number' name='quantity' min='1' max='100' placeholder='# of ads' required>
                <input type='submit' name='submit' value='Submit'>
            </div>
        </div>
    </div>

    <div class='output'>
        <table class='table'>
            <tr>
                <th>Type</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Storage Size</th>
                <th>Carrier</th>
                <th>Price</th>
            </tr>
        </table>
    </div>
    </form>

    <div class='footer'>
        <?php include_once('footer.php'); ?>
    </div>
</body>
</html>
