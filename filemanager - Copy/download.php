<?php
if(isset($_GET['file'])){
    $file="uploads/".$_GET['file'];
    if(file_exists($file)){
        header("content-Dispositiom:attachment;filename=".basename($file));
        header("content-type:application/octet-stream");
        header("content-length: ".filesize($file));
        readfile($file);
        exit;
    }
    else{
        echo "file not found";
    }
}
?>