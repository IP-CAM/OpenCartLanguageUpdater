<?php
class WHtml{
	public static function getSubFoldersSelect( $name,$options,$selected){
		$html = "<select name=\"".$name."\">";
		for( $i=0; $i< count($options); $i++ ){
			$item = $options[$i];
			$html .= "<option value=\"" . $item . "\"";
			$html .=" >" . $item . "</option>";
		}
		$html .= "</select>";
		return $html;
	}
	
	public static function error($msg){
		echo  $msg  ;
		echo " <a href=\"javascript:history.back()\">back</a>";
		exit();
	}
}