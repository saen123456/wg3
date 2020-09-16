<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แหล่งข้อมูล</title>
</head>

<body>
    <?php
    foreach ($document as $row) :
        $document_name =  $row['document_name'];
        $document_link =  $row['document_link'];
    endforeach;

    $document_type = pathinfo($document_name, PATHINFO_EXTENSION);
    echo $document_link;
    if ($document_type == "doc" || $document_type == "docx") {
        echo "<iframe src='https://view.officeapps.live.com/op/embed.aspx?src=" . $document_link . "' width='100%' height='900px' frameborder='0'> </iframe>";
    } else if ($document_type == "pdf") {
        /*$Add_Space = str_replace(' ', '%20', $document_link);
        $Add_Space = str_replace('&', '%26', $document_link);
        echo $Add_Space;*/
        echo "<iframe src='https://view.officeapps.live.com/op/embed.aspx?src=" . $document_link . "' width='100%' height='900px' frameborder='0'> </iframe>";
        //echo "<iframe src='https://docs.google.com/gview?url=" . $document_link . "&embedded=true' width='100%' height='565px' ></iframe>";
    } else {
        /*$Add_Space = str_replace(' ', '%20', $document_link);
        $Add_Space = str_replace('&', '%26', $document_link);
        echo $Add_Space;*/
        echo "<iframe src='https://view.officeapps.live.com/op/embed.aspx?src=" . $document_link . "' width='100%' height='900px' frameborder='0'> </iframe>";
    }
    ?>

    
</body>

</html>