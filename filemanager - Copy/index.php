<?php
 if(!is_dir("uploads")){
    mkdir("uploads");
 }
 if(isset($_POST["upload"])){
      $filename=$_FILES['myfile']['name'];
      $tempname=$_FILES['myfile']['tmp_name'];
      $folder="uploads/".$filename;
if(move_uploaded_file($tempname,$folder)){
    echo "<p style='color:green;'>file uploaded successfully!!</p>";
}
else{
    echo "<p style='color:red;'>uploaded  failed!!</p>";
}
}
?>
<h2>mini file manager</h2>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="myfile" required>
    <button type="submit" name="upload">upload</button>
</form>
<hr>
<h3>uploaded files</h3>
<?php
$files=scandir("uploads");
foreach($files as $file){
    if($file!="."&&$file!=".."){
        echo $file ."|";
        echo "Size: ".filesize("uploads/$file")."bytes|";
        echo "last modified: ".date("y-m-d H:i:s",filemtime("uploads/$file"))."|";
        echo "<a href ='download.php?file=$file'>download</a>|";
        echo "<a href='delete.php?file=$file'>Delete</a>";
        echo "<br><br>";

    }

}
?>
