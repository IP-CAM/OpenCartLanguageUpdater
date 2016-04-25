<?php

require_once __DIR__. '/includes/WDirectory.php';
require_once __DIR__. '/includes/WHtml.php';
//print_r( $_POST );
$source = @$_POST['source'];
$destination = @$_POST['destination'];
$lang_path = @$_POST['lang_path'];


if( $source == $destination ){
	WHtml::error("source and destination can not be the same!" );
}

?>
<form action="step4.php" method="post">
language path:<?php echo $lang_path;?><br />
source language: <?php echo $source; ?> <br />
destination language: <?php echo $destination; ?> <br />
<input  type="submit" value="confirm" >
<input type="hidden" name="lang_path" value="<?php echo $lang_path;?>" />
<input type="hidden" name="source" value="<?php echo $source;?>" />
<input type="hidden" name="destination" value="<?php echo $destination;?>" />
</form>
