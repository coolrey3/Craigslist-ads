<!--test-images//-->
<?php


// Save the image to file and free memory
// $im = imagecreatefrompng('lcd.png');
// imagepng($im, 'phone_repair.png');
// imagedestroy($im);

//     $myImage = imagecreate(2400, 100);
//     $myGray = imagecolorallocate($im, 204, 204, 204);
//     $myBlack = imagecolorallocate($im, 0, 0, 0);
//     imageline($im, 15, 35, 120, 60, $myBlack);


// $img1 = new Image("lcd.png");
// $img2 = new Image("wifi.png");
// $img2->imagecopymerge($img1,9,9);
// $img2->save("./merged.png",IMAGETYPE_PNG);
// include("images.php");

$im1 = imagecreatefrompng('lcd.png');
$im2 = imagecreatefrompng('wifi.png');

imagepng($im1, 'phonetype.png');
imagedestroy($im1);

imagepng($im2, 'repairtype.png');
imagedestroy($im2);

imagealphablending($im1, false);
imagesavealpha($im1, true);

imagecopy($im1, $im2, 10, 9, 0, 0, 181, 180, 100); //have to play with these numbers for it to work for you, etc.

imagepng($im1, 'mergedimage.png');
imagedestroy($im1);
imagedestroy($im2);

// header('Content-Type: image/png');

// imagepng($im1, 'mergedimage.png');
// imagedestroy($im1);

?>

<img src="phonetype.png" alt="Your phone image" />
<img src="repairtype.png" alt="Your repair image" />
<img src="mergedimage.png" alt="Your merged image" />