



<?php

$mime_type = 'image/png' ;
$extension = '.png' ;
$send_buffer_size = 4096 ;


$font_file  = 'arial.ttf' ;
$font_size  = 50 ;
$font_color = '#000000' ;
$background_color = '#ffffff' ;
$transparent_background  = true ;
$cache_images = true ;
$cache_folder = 'cache' ;

//     header('Content-type: image/png');
//     header('Content-type: image/png');
    $myImage = imagecreate(2400, 100);
    $myGray = imagecolorallocate($myImage, 204, 204, 204);
    $myBlack = imagecolorallocate($myImage, 0, 0, 0);
    imageline($myImage, 15, 35, 120, 60, $myBlack);

    imagepng($myImage);
    imagedestroy($myImage);



ImagePNG($image,100) ;
ImagePNG($image) ;


$background_rgb = hex_to_rgb($background_color) ;
$font_rgb = hex_to_rgb($font_color) ;
$dip = get_dip($font_file,$font_size) ;
$box = @ImageTTFBBox($font_size,0,$font_file,$text) ;
$image = @ImageCreate(abs($box[2]-$box[0]),abs($box[5]-$dip)) ;







// header("Content-Type: image/jpeg,");

$image = imagecreate(400,200);
echo "test";


// imagejpeg($image);
// imagedestroy($image);




?>