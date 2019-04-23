<?
error_reporting(1);
date_default_timezone_set('Asia/Taipei');
mysql_connect('127.0.0.1','admin','1234');
mysql_select_db("web05_D");
mysql_query("set names 'utf8'");
$mq=mysql_query;
$mr=mysql_result;
$mfa=mysql_fetch_array;
$mnr=mysql_num_rows;
session_start();
$now=mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'));
$time1=mktime(0,0,1,date('m'),date('d')+14,date('Y'));
$nbook=$mr($mq("SELECT AUTO_INCREMENT from information_schema.tables WHERE TABLE_schema='web05_d' and TABLE_NAME='book'"),0,'AUTO_INCREMENT');
	if($_SESSION['pe']=='true'){
		$a_1=array('首頁','分類','上傳','借閱清單','登出');
		$a_2=array('index.php','?classd','?book','?me','?logout');
	}
	else if($_SESSION['id']){
		$a_1=array('首頁','借閱清單','登出');
		$a_2=array('index.php','?me','?logout');
	}
	else{
		$a_1=array('首頁','登入','註冊');
		$a_2=array('index.php','?login','?new');
	}
	$z_1=array('編號','書名','作者','描述');
	$z_2=array('id','name','work','text');
?>
<script src="js.js"></script>