<?php include ("./include/header.shtml"); ?>
<?php
// Get the private context
 session_name('Private');
 session_start();
 $private_id = session_id();
 $b = $_SESSION['pr_key'];
 session_write_close();

// Get the global context
 session_name('Global');
 session_start();
 $a = $_SESSION['key'];
 session_id('$a');
 session_write_close();
 $ssid = filter_input(INPUT_GET, 'ssid', FILTER_SANITIZE_URL);
// Work & modify the global & private context (be ware of changing the global context!)
?>
<title>Update AWS Certificates</title>
<?php include ("./include/links.shtml"); ?>
  <h1>Global Count is: <?=++$a?></h1>
  <pre>
  </pre>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select File to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload AWS File" name="submit">
</form>

<?php include ("./include/footer.shtml"); ?>
<?php
// Store it back
 session_name('Private');
 session_id('');
 session_start();
 $_SESSION['pr_key'] = $b;
 session_write_close();
 
 session_name('Global');
 session_id('$a');
 session_start();
 $_SESSION['key']=$a;
 session_write_close();
?>

