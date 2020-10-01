<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <title>ใบรับรองจบ</title>
    <link rel=" stylesheet" href="<?php echo base_url('dist2/css/adminlte.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('plugins/fontawesome-free/css/all.min.css'); ?>">
</head>

<body>
    <?php

    //$output = base_url('/certificate.jpg');
    header("Content-type: image/jpeg");
    $font = '/arial.ttf';
    $x = 720;
    $y = 480;
    $image = imagecreate($x, $y);
    $image = imagecreatefromjpeg(base_url('/certificate2.jpg'));
    $color = imagecolorallocate($image, 19, 21, 22);
    $name = "Pipat";
    //imagettftext($image, 50, 0, 350, 400, $color, $font, $name);

    imagejpeg($image);
    imagedestroy($image);
    // if (!$image) {
    //     printf("Failed to load jpeg image \"%s\".\n");
    //     die();
    // } else {
    //     $color = imagecolorallocate($image, 19, 21, 22);
    //     $name = "Pipat";
    //     imagettftext($image, 50, 0, 350, 400, $color, $font, $name);
    //     imagejpeg($image);
    //     imagedestroy($image);
    //     printf("yeah");
    // }

    ?>





</body>

</html>