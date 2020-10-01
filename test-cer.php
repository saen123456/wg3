<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    header('Content-Type:image/jpeg');
    $font = 'arial.ttf';
    $image = imagecreatefromjpeg('certificate2.jpg');
    $color = imagecolorallocate($image, 19, 21, 22);
    $name = "Pipat";
    imagettftext($image, 50, 0, 360, 420, $color, $font, $name);

    imagejpeg($image, "certificate3.jpg");
    imagedestroy($image);
    ?>

</body>

</html>