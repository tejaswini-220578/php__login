<?php
echo "read &write <br> ";
$file=fopen("demo.txt","w");
fwrite($file,"hello php");
fclose($file);
$file=fopen("demo.txt","r");
echo fread($file,filesize("demo.txt"));
fclose($file);
echo " <br><br> <h2>file functions</h2> <br> ";
echo "file_exists: ".file_exists("demo.txt"). "<br>";
echo "file_size: ".filesize("demo.txt")."<br>";
echo "file_type: ".filetype("demo.txt")."<br>";
echo "file  access time is: ".fileatime("demo.txt"). "<br>";
echo "file modification time is : ".date("y-m-d H:i:s",filemtime("demo.txt")). "<br>" ;
echo "file  CHANGE time is: ".filectime("demo.txt"). "<br>";
echo "file  permissions are : ".fileperms("demo.txt"). "<br>";
echo "file  owner  is: ".fileowner("demo.txt"). "<br>";
echo "file  group is: ".filegroup("demo.txt"). "<br>";
echo "file  inode is: ".fileinode("demo.txt"). "<br>";

echo "<h1> file &folder management</h1>";
@mkdir("testfolder");
copy("demo.txt","copy.txt");
rename("copy.txt","new.txt");
unlink("new.txt");
rmdir("testfolder");

echo "<br> <h3> 4.Directory Handling <br></h3> ";
echo "files using scandir():<br>";
print_r(scandir("."));
echo "<br><br>";
//readdir() +opendir()
$dir=opendir(".");
while($file=readdir($dir)){
    echo $file."<br>";
}
closedir($dir);
echo "<br>current working directory: ".getcwd()."<br>";
chdir(".");
echo "Directory changed Successfully";

echo "<br> <h3> file locking</h3>";
$log=fopen("log.txt" ,"a");
flock($log,LOCK_EX);
fwrite($log,"user accesssed at ".date("y-m-d H:i:s"). "\n");
flock($log,LOCK_UN);
fclose($log);
echo "Data Written to log.txt using file locking";

echo "<br> <h3> file operation modes </h3> ";
echo "<br><h4> read only  <br> </h4>";
$file=fopen("lab.txt","w");
fwrite($file,"this is the read only operation");
fclose($file);
$file=fopen("lab.txt","r");
 echo fread($file,filesize("lab.txt"));
 fclose($file);
//write only
echo "<br><h3> write operation </h3> <br>";
$file=fopen("lab_w.txt","w");
fwrite($file,"hey this is teju");
fclose($file);
echo "Data written successfully!!";
//append
echo "<br> <h3> Append operation </h3> </br>";
$file=fopen("lab_a.txt","a");
fwrite($file,"\n sawadhe krub ");
fclose($file);
echo "Data Appended successfully !!";

// x->create new file 
echo "<br> <h3>  create new file </h3> <br>";
if(file_exists("lab_x.txt")){
    $file=fopen("lab_x.txt","x");
    fwrite($file,"hey this created file by using x operation");
    fclose($file);
    echo "file created successfully!";
}
else{
    echo "failed !!";
}
//r+
/*
echo "<BR> (READ &WRITE)";
$file=fopen("lab_rp.txt","w");
fwrite($file,"read and write operation"," r+");
fclose($file);
$file=fopen("lab_rp.txt","r+");
fwrite($file,"updated");
rewind($files);
$file=fread($file,filesize("lab_rp.txt"));
fclose($file);*/
//$file=fopen("lab.txt","r+");
?>