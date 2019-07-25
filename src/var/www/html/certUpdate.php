<?php include ("./include/header.shtml"); ?>
<title>Update AWS Certificates</title>
<?php include ("./include/links.shtml"); ?>
<pre>
    <h1> Upload AWS Files </h1>
    <h1> 
    </pre>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select File to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Confirm File Upload" name="submit">
</form>

</style>
<?php include ("./include/footer.shtml"); ?>
