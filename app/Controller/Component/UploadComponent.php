<?php
class UploadComponent extends Component {
	public function start_upload($file_Details) {
		//echo "<pre>@@@";
		print_r($file_Details);
		$filestyle = ($file_Details['style']);
		$filename = ($file_Details['name']);
		$filename = time().$filename;
		$file_path = WWW_ROOT . 'files/'.$filename;
		move_uploaded_file($file_Details['tmp_name'],$file_path);
		return $filename;
	}
}
?>