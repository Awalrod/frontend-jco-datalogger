<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$ftempname = $_FILES["fileToUpload"]["tmp_name"];
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$save_name = "Default";
if($fileType == "crt"){
        $save_name = "certificate.pem.crt";

}
if(($fileType == "key") && strpos($target_file, 'public')){
        $save_name = "public.pem.key";

}
if(($fileType == "key") && strpos($target_file, 'private')){
        $save_name = "private.pem.key";
}

if(strlen($ftempname) <= 0){
        echo " No file selected.";
        echo "</br> <a href=\"javascript:history.go(-1)\">Return</a> </br>";
	return;
} else {

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = filesize($ftempname);
    if($check != false) {
        echo "File Being Processed - " . $check["mime"];
        $uploadOk = 1;
    } else {
        echo "Incorrect File Type.";
        $uploadOk = 0;
    }

}

// Check if file already exists
if (file_exists($target_file)) {
    echo " File already exists.";
    $uploadOk = 0;

}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo " Your file is too large.";
    $uploadOk = 0;

}

// Allow certain file formats
if( ($fileType != "crt") && ($fileType != "pem") && ($fileType != "key")
     && ($fileType != "pem.crt") && ($fileType != "pem.key"))
{
    echo " Only .PEM, .KEY, & .CRT files are allowed. ";
    $uploadOk = 0;

}
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo " Your file was not uploaded.";
    echo "</br> <a href=\"javascript:history.go(-1)\">Return</a> </br>";

// if everything is ok, try to upload file
} else {
   if(move_uploaded_file($ftempname, $target_file)){
         symlink(basename($_FILES["fileToUpload"]["name"]) , $target_dir . $save_name);
         echo "</br>" . $save_name . "</br>";
         echo "The file " . basename( $_FILES["fileToUpload"]["name"]) . " has been uploaded.";
         echo "</br> <a href=\"javascript:history.go(-1)\">Return</a> </br>";
  }else {
        echo " There was an error uploading your file.";
    }
}
?>

