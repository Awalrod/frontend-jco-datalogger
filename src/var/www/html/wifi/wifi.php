<?php include ("./include/header.shtml"); ?>
<title>JCO-Dataloger set web</title>
<?php include ("./include/links.shtml"); ?>
<?php
	echo exec('whoami');
       ?>
      <br/>
      <?php
        system('/usr/local/bin/wifiConfig.sh'); 
 ?>
 <?php include ("./include/footer.shtml"); ?>
