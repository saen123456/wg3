<?php
$font = realpath("th2.ttf");
$image = imagecreatefromjpeg('certificate_logo.jpg');
$color = imagecolorallocate($image, 19, 21, 22);

foreach ($user_detail as $row) :
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
endforeach;
foreach ($course_detail as $row2) :
    $course_name = $row2['course_name'];
endforeach;
if (isset($last_name)) {
    $name = $first_name;
} else {
    $name = $first_name . " " . $last_name;
}
$certify = "ใบรับรองการสำเร็จการศึกษา";
$description = "ใบรับรองการสำเร็จการศึกษานี้คือการรับรองว่า คุณ " . $name;
$description2 = "ได้สำเร็จหลักสูตร " . $course_name . " ของ workgress ";
$date = "เมื่อวันที่ " . date("d/m/Y");

$image_width = imagesx($image);
$image_height = imagesy($image);

$text_box = imagettfbbox(30, 45, $font, $certify);
$text_width = $text_box[2] - $text_box[0];

$text_box2 = imagettfbbox(30, 45, $font, $description);
$text_width2 = $text_box2[2] - $text_box2[0];

$text_box3 = imagettfbbox(30, 45, $font, $description2);
$text_width3 = $text_box3[2] - $text_box3[0];

$text_box4 = imagettfbbox(30, 45, $font, $date);
$text_width4 = $text_box4[2] - $text_box4[0];

// Calculate coordinates of the text
$x = ($image_width / 2) - ($text_width / 1.5);

$x2 = ($image_width / 2) - ($text_width2 / 1.5);

$x3 = ($image_width / 2) - ($text_width3 / 1.5);

$x4 = ($image_width / 2) - ($text_width4 / 1.5);

imagettftext($image, 30, 0, $x, 410, $color, $font, $certify);
imagettftext($image, 30, 0, $x2, 500, $color, $font, $description);
imagettftext($image, 30, 0, $x3, 560, $color, $font, $description2);
imagettftext($image, 30, 0, $x4, 620, $color, $font, $date);
//header('Content-Disposition: attachment; filename=certificate.jpg'); // This will tell the browser to download it
header("content-type: image/jpeg;");
imagejpeg($image);
imagedestroy($image);
$data = ob_get_contents();
ob_end_clean();
$image = "<img src='data:image/jpeg;base64," . base64_encode($data) . "'>";
$url = "data:image/jpeg;base64," . base64_encode($data) . "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ใบรับรองจบ</title>
    <link rel="stylesheet" href="<?php echo base_url('dist2/css/adminlte.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('plugins/fontawesome-free/css/all.min.css'); ?>">
</head>

<body>
    <a href="<?php echo $url ?>" download>
        <button type="button" class="btn btn-light float-right" style="border: 1px solid black;"><i class="fa fa-download" aria-hidden="true"></i> ดาวน์โหลดไฟล์ได้ที่นี่</button>
    </a>

    <div class="container">
        <div class="row justify-content-center">
            <?php
            echo $image;
            ?>
        </div>
    </div>

</body>

</html>