<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="craigslist.css"> 
    <form action='craigslist.php' method='post'> 

    <title>
            Craigslist Automater
    </title>
        <style>
.header {
	background-color: #08c;
	text-align: center;
	width: 100%;
	margin: 0px;
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

body {
	margin: 0px
}

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

    </div>

<div class='footer'>
<?php
include('footer.php');
?>

    </div>
</body>