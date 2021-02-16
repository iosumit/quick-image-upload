<?php
	
	$file = $_FILES['inputFile']['name'];
	$file = preg_replace("/\s+/", " ", $file);
	$file_temp = $_FILES['inputFile']['tmp_name'];

	$file_ext = pathinfo($file, PATHINFO_EXTENSION);
	$file_name = pathinfo($file, PATHINFO_FILENAME);

	if (!empty($file)) {
		$newFile = $file_name."_".date('mjYHis').".".$file_ext;
		$fileLocation = "file/".$newFile;

		if (move_uploaded_file($file_temp, $fileLocation)) {
			$res = array('status'=>'1', 'msg'=>'File uploaded successfully', 'url'=>$fileLocation);
			print_r(json_encode($res));
		} else {
			$res = array('status'=>'0', 'msg'=>'Something went wrong');
			print_r(json_encode($res));
		}
	} else {
		$res = array('status'=>'0', 'msg'=>'Empty File');
		print_r(json_encode($res));
	}

?>