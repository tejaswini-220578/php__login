<?php
$conn = mysqli_connect("localhost","root","","userdb");
if(!$conn){
    die("connecton failed");
}
echo "database connected successfully";
?>
