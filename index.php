<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="craigslist.css"> 
    <form action='craigslist.php' method='post'> 

    <title>
            Craigslist Automater
    </title>
        <style>

        </style>
</head>
<body>
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
                <input type='text' name='quantity' placeholder='# of ads'>
                <input type='submit' name='submit'>
            </div>
        </div>
    </div>

    <div class='output'>
    /<?php // include('craigslist.php'); ?>

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
<div class='footer'>
<?php
include('../Frontend/footer.php');
?>

    </div>
</body>