<?
//updata
	$id='upload/'.uniqid().'.png';
	move_uploaded_file($_FILES['file']['tmp_name'],$id);
	echo $id;
?>