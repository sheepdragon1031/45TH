<?
//base64轉檔 + 上傳
$id='download/'.uniqid().'.png';
$base=base64_decode($_POST['base']);
file_put_contents($id,$base);
echo $id;
?>