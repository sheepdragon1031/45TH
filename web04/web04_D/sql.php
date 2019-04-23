<link href="css.css" rel="stylesheet" type="text/css">
<?
error_reporting(2);
mysql_connect('127.0.0.1','admin','1234');
mysql_select_db("web04");
mysql_query("set names 'utf8'");
$mq=mysql_query;
$mr=mysql_result;
$mfa=mysql_fetch_array;
$mnr=mysql_num_rows;

$a_1=array('首頁','註冊','登入','搜尋');
$a_2=array('index.php?','?up','?log','?sreach');

$a_1=array('首頁','新增','分類','登出','搜尋');
$a_2=array('index.php?','?new','?sort','?out','?sreach');
$nbos=$mr($mq("SELECT AUTO_INCREMENT FROM information_schema.tables WHERE TABLE_schema='web04' and TABLE_NAME='book'"),0,'AUTO_INCREMENT');
$z_1=array('編號','書名');
$z_2=array('id','name');
?>
<script src="JQuery/jquery-2.1.1.js"></script>
<script src="js.js"></script>
