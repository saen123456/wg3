<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แหล่งข้อมูล</title>
    <link rel="stylesheet" href="<?php echo base_url('dist2/css/adminlte.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('plugins/fontawesome-free/css/all.min.css'); ?>">
</head>

<body>

    <?php
    foreach ($document as $row) :
        $document_name =  $row['document_name'];
        $document_link =  $row['document_link'];
    endforeach;
    ?>

    <?php
    $document_type = pathinfo($document_name, PATHINFO_EXTENSION);
    //echo $document_link;
    if ($document_type != "pdf") { ?>
        <a href="<?php echo $document_link ?>" download>
            <button type="button" class="btn btn-light float-right" style="border: 1px solid black;"><i class="fa fa-download" aria-hidden="true"></i> ดาวน์โหลดไฟล์ได้ที่นี่</button>
        </a>
    <?php
    } else { ?>
        <a href="<?php echo $document_link ?>" target="_blank">
            <button type="button" class="btn btn-light float-right" style="border: 1px solid black;"><i class="fa fa-download" aria-hidden="true"></i> ดาวน์โหลดไฟล์ได้ที่นี่</button>
        </a>
    <?php
    }

    if ($document_type == "doc" || $document_type == "docx") {
        echo "<iframe src='https://view.officeapps.live.com/op/embed.aspx?src=" . $document_link . "' width='100%' height='900px' frameborder='0'> </iframe>";
    } else if ($document_type == "pdf") {
        $Add_Space = str_replace(' ', '%20', $document_link);
        //$Add_Space = str_replace('&', '%26', $document_link);
        $document_link_pdf = $Add_Space . "#toolbar=0";
        //echo $document_link_pdf;
        echo "<iframe src='" . $document_link_pdf . "' width='100%' height='900px' frameborder='0'>";
        //echo "<iframe src='https://docs.google.com/gview?url=" . $document_link . "&embedded=true' width='100%' height='900px' ></iframe>";
    } else if ($document_type == "pptx" || $document_type == "ppt") {
        /*$Add_Space = str_replace(' ', '%20', $document_link);
        $Add_Space = str_replace('&', '%26', $document_link);
        echo $Add_Space;*/
        echo "<iframe src='https://view.officeapps.live.com/op/embed.aspx?src=" . $document_link . "' width='100%' height='900px' frameborder='0'> </iframe>";
    }
    ?>



</body>

</html>