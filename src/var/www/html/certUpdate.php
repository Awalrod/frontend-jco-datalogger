<?php include ("./include/header.shtml"); ?>
<?php
$directory = "/var/www/html/uploads/";

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
<pre>
    <h1> Upload AWS Files </h1>
    <h1> 
    </pre>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select File to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload AWS FYile" name="submit">
</form>

<style type="text/css">
    .img-box{
        display: inline-block;
        text-align: center;
        margin: 0 15px;
    }
</style>
</head>
<body>
    <?php
    $files = array("AWS-Certificate.pem.crt");
    foreach($files as $file){
        echo '<div class="img-box">';
            echo '<img src="/var/www/html/uploads/AWS-Certificate.pem.crt' . $file . '" width="200" alt="' .  pathinfo($file, PATHINFO_FILENAME) .'">';
            echo '<p><a href="downloadA.php?file=' . urlencode($file) . '">Download</a></p>';
        echo '</div>';
    }
    ?>
    <?php
    $files = array("Public.pem.key");
    foreach($files as $file){
        echo '<div class="img-box">';
            echo '<img src="/var/www/html/uploads/' . $file . '" width="200" alt="' .  pathinfo($file, PATHINFO_FILENAME) .'">';
            echo '<p><a href="downloadB.php?file=' . urlencode($file) . '">Download</a></p>';
        echo '</div>';
    }
    ?>
    <?php
    $files = array("Private.pem.key");
    foreach($files as $file){
        echo '<div class="img-box">';
            echo '<img src="/var/www/html/uploads/' . $file . '" width="200" alt="' .  pathinfo($file, PATHINFO_FILENAME) .'">';
            echo '<p><a href="downloadC.php?file=' . urlencode($file) . '">Download</a></p>';
        echo '</div>';
    }
    ?>


</body>
</html>
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

