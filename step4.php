<?php

require_once __DIR__. '/includes/WDirectory.php';
require_once __DIR__. '/includes/WHtml.php';
require_once __DIR__. '/includes/WLang.php';

//print_r( $_POST );
$source = @$_POST['source'];
$destination = @$_POST['destination'];
$lang_path = @$_POST['lang_path'];


$langObj = new WLang( $lang_path , $source , $destination );
$langObj->update();

echo "ok <a href=\"index.php\">index</a>";