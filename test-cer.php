<?php
$font = realpath("th2.ttf");
$image = imagecreatefromjpeg('certificate_logo.jpg');
$color = imagecolorallocate($image, 19, 21, 22);
$certify = "ใบรับรองการสำเร็จการศึกษา";
$description = "นี้คือการรับรองว่า คุณ pipat ได้สำเร็จหลักสูตร selenium ของ workgress ";
$date = "เมื่อวันที่ " . date("d/m/Y");

$image_width = imagesx($image);
$image_height = imagesy($image);

$text_box = imagettfbbox(30, 45, $font, $certify);
$text_width = $text_box[2] - $text_box[0];

$text_box2 = imagettfbbox(30, 45, $font, $description);
$text_width2 = $text_box2[2] - $text_box2[0];

$text_box3 = imagettfbbox(30, 45, $font, $date);
$text_width3 = $text_box3[2] - $text_box3[0];

// Calculate coordinates of the text
$x = ($image_width / 2) - ($text_width / 1.5);

$x2 = ($image_width / 2) - ($text_width2 / 1.5);

$x3 = ($image_width / 2) - ($text_width3 / 1.5);

imagettftext($image, 30, 0, $x, 410, $color, $font, $certify);
imagettftext($image, 30, 0, $x2, 550, $color, $font, $description);
imagettftext($image, 30, 0, $x3, 650, $color, $font, $date);
header("Content-type: image/jpeg;");
//header('Content-Disposition: attachment; filename=certificate.jpg'); // This will tell the browser to download it
imagejpeg($image);
imagedestroy($image);
