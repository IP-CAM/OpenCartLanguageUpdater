<?php
require_once __DIR__. '/includes/WDirectory.php';
require_once __DIR__. '/includes/WHtml.php';

$lang_path = @$_POST["lang_path"];


if( is_dir( $lang_path ) == false ){
	echo "path " . $lang_path . " does not exists!";
	echo "<a href=\"javascript:history.back()\">back</a>";
	exit();
}
//echo $lang_path;
$wdir = new WDirectory();
$subFolders = $wdir->getSubFolders( $lang_path );

//print_r( $subFolders );

$sourceSelect = WHtml::getSubFoldersSelect("source", $subFolders, null );
$destinationSelect = WHtml::getSubFoldersSelect("destination", $subFolders, null );

?>


<form action="step3.php" method="post">
source language: <?php echo $sourceSelect; ?> <br />
destination language: <?php echo $destinationSelect; ?> <br />
<input  type="submit" value="next" >
<input type="hidden" name="lang_path" value="<?php echo $lang_path;?>" />
</form>