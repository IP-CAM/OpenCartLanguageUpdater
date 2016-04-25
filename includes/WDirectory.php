<?php
class WDirectory{
	function getSubFolders($path ){
		$data = array();
		if(is_dir($path)){
			$dp=dir($path);
			while($file=$dp->read()){
				if($file!='.'&& $file!='..'){
					if( is_dir( $path . "/" . $file )){
						$data[] = $file;
					}
				}
			}
			$dp->close();
		}
		return $data;
	}
	
	
}