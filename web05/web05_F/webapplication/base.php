<?
//base64
	$id='download/'.uniqid().'.png';
	$data=base64_decode($_POST['base']);
	file_put_contents($id,$data);
	echo $_POST['base'];
?>