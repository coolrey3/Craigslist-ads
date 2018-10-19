<html>
    <head>

        <style>

        </style>
    </head>

    <body>

                <?php
        echo "<h1 style='width:100%;text-align:center;color:white;border-color:black;border-width:.5px;padding:10px;border-style:solid;background-color:#08c;margin:0;'>
        BuyBack Prices   </h1>"; ?>

        <form action="">

        <input type='text' name='product'>
        <button type='submit' >Submit</button>
        </form>




        <?php
      if(!empty($_GET['product'])){


       $repairshopr_url='http://start.repairshopr.com/api/v1/products/?query=phones&api_key=bcf60e7a-2e2b-42b9-b568-436669b04b91';
       $products_json= file_get_contents($repairshopr_url);
       $products_array=json_decode($products_json,true);

        #echo "hello world";

        echo $products_json;
          };
        ?>

    </body>

<?php include('footer.php');
?>
    </html>