<?php 
/*----------------------------------------------Start of CAPTCHA String---------------------------------------------- */
$permitted_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  
function secure_generate_string($input, $strength = 5, $secure = true) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        if($secure) {
            $random_character = $input[random_int(0, $input_length - 1)];
        } else {
            $random_character = $input[mt_rand(0, $input_length - 1)];
        }
        $random_string .= $random_character;
    }
  
    return $random_string;
}
 
/*----------------------------------------------End of CAPTCHA String---------------------------------------------- */

/*----------------------------------------------Start of CAPTCHA Bachground---------------------------------------------- */

$image = imagecreatetruecolor(200, 40);
 
imageantialias($image, true);
 
$colors = [];
 
$red = 175;//rand(125, 175);
$green = 175;//rand(125, 175);
$blue = 175;//rand(125, 175);
 
for($i = 0; $i < 5; $i++) {
  $colors[] = imagecolorallocate($image, $red - 20*$i, $green - 20*$i, $blue - 20*$i);
}
 
imagefill($image, 0, 0, $colors[0]);
 
for($i = 0; $i < 10; $i++) {
  imagesetthickness($image, rand(2, 10));
  $rect_color = $colors[rand(1, 4)];
  imagerectangle($image, rand(-10, 190), rand(-10, 10), rand(-10, 190), rand(40, 60), $rect_color);
}
/*----------------------------------------------End of CAPTCHA Bachground---------------------------------------------- */

/*----------------------------------------------Start of CAPTCHA Print string to img---------------------------------------------- */
$black = imagecolorallocate($image, 0, 0, 0);
$white = imagecolorallocate($image, 255, 255, 255);
$textcolors = [$black, $white];
 
$fonts = [dirname(__FILE__).'/fonts/Acme-Regular.ttf', dirname(__FILE__).'/fonts/Ubuntu-R.ttf', dirname(__FILE__).'/fonts/Merriweather-Regular.ttf', dirname(__FILE__).'/fonts/PlayfairDisplay-Regular.ttf'];
 

$string_length = 6;
$captcha_string = secure_generate_string($permitted_chars, $string_length);

$md5_captcha_string = md5(strtoupper($captcha_string));
setcookie("captcha", $md5_captcha_string, time()+7*24*60*60, "/");
header('Content-type: image/png');
 
for($i = 0; $i < $string_length; $i++) {
  $letter_space = 170/$string_length;
  $initial = 5;
  imagettftext($image, 20, rand(-9, 9), $initial + $i*$letter_space, rand(20, 40), $textcolors[rand(0, 1)], $fonts[array_rand($fonts)], substr($captcha_string,$i,1));
}

imagepng($image);
imagedestroy($image);
/*----------------------------------------------End of CAPTCHA Print string to img---------------------------------------------- */
?>
