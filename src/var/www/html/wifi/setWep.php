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
 session_id('TEST');
 session_start();
 $a = $_SESSION['key'];
 session_write_close();
 $ssid = filter_input(INPUT_GET, 'ssid', FILTER_SANITIZE_URL);
// Work & modify the global & private context (be ware of changing the global context!)
?>
<title>JCO-Dataloger set web</title>
<?php include ("./include/links.shtml"); ?>
  <h1>Test 2: Global Count is: <?=++$a?></h1>
  <h1>Test 2: Your Count is: <?=++$b?></h1>
  <h1>Private ID is <?=$private_id?></h1>
  <h1>Gloabl ID is <?=session_id()?></h1>
  <h2>WIFI: <?=ssid?></h2>
  <pre>
   <?php print_r($_SESSION); ?>
  </pre>
<?php include ("./include/footer.shtml"); ?>

<?php
// Store it back
 session_name('Private');
 session_id('$private_id');
 session_start();
 $_SESSION['pr_key'] = $b;
 session_write_close();
 
 session_name('Global');
 session_id('TEST');
 session_start();
 $_SESSION['key']=$a;
 session_write_close();
?>
