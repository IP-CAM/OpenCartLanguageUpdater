<?php
class WLang{
	public $lang_path;
	public $source;
	public $destination;
	
	public function __construct($lang_path, $source, $destination){
		$this->lang_path = $lang_path;
		$this->source = $source;
		$this->destination = $destination;
	}
	
	public function update( $dir = null ){
		if( $dir == null ){
			$dir  = $this->lang_path . "/" . $this->source;
		}
		 
		$dp=dir($dir);
		while($file=$dp->read()){
			if($file!='.'&& $file!='..'){
				$subPath = $dir . "/" . $file;
				if( is_dir( $subPath )){
					$this->update( $subPath );
				}
				else{
					//echo $subPath . "<br />";
					$this->updateFile( $subPath );
				}
			}
		}
		$dp->close();
	}
	public function updateFile( $file ){
		$destFile = str_replace( $this->source, $this->destination, $file );
		
		if( !file_exists( $destFile )){
			
			$dir = dirname( $destFile );
			if( !is_dir( $dir )){
				mkdir( $dir ,0777,true );
			}
			copy($file, $destFile);
			echo "copy to ". $destFile; echo "<br />";
		}
		else{
			if( strpos( $file, ".php") !== false ){
				
				include $file;
				$sourceLang = $_;
				unset( $_);
				
				include $destFile;
				$destLang =  $_;
				unset($_);
				
				//print_r( $sourceLang );
				//print_r( $destLang );
				$newCode = "";
				foreach ( $sourceLang as $k=> $v){
					// echo  $destLang[$k]; echo "<br />";
					if( trim( @$destLang[$k]) == ""){
						echo $destFile . " " .$k; echo "<br />";
						$v2 = addslashes( $v  );
						$newCode .= "\r\n\$_['".$k."'] = '" . $v2 ."';";
					}
				}
				if( trim( $newCode) != "" ){
					$fp = fopen( $destFile, "a+");
					fwrite( $fp , $newCode);
					fclose( $fp );
				}
				//echo $newCode;
				//echo $file , " " , $destFile; exit();
			}
		}
	}
	 
}