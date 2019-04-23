<?
error_reporting(0);
session_start();
mysql_connect('127.0.0.1','admin','1234');
mysql_select_db('web05_c');
mysql_query('set names "utf8"');
$mq=mysql_query;
$mfa=mysql_fetch_array;
if($_COOKIE['from']!=$_GET['difficulty'] || $_COOKIE['to']!=$_GET['toStackId'] || $_COOKIE['id']!=$_GET['brickId']){
	setcookie('from',$_GET['difficulty'],time()+3600);
	setcookie('to',$_GET['toStackId'],time()+3600);
	setcookie('id',$_GET['brickId'],time()+3600);
	$id=$_GET['brickId'];
	$from=$_GET['fromStackId'];
	$to=$_GET['toStackId'];
	if($_SESSION['L'.$from][0]==$id){
		if($_SESSION['L'.$to][0]=='' || $_SESSION['L'.$to][0]>=$id){
			if($_SESSION['L'.$to][0]>$id || $_SESSION['L'.$to][0]==''){
				unset($_SESSION['L'.$from][0]);
				array_push($_SESSION['L'.$to],$id);
				sort($_SESSION['L'.$from]);
				sort($_SESSION['L'.$to]);
				$_SESSION['num']++;
				$_SESSION['LL'];
				$mq("UPDATE `web05_c`.`data` SET `num` = '$_SESSION[num]' WHERE `data`.`mini` = '$_SESSION[LL]'");
				?>
                	<script>
						$.get('ajax.php',{move:<?=$_SESSION['num']?>});
					</script>
                <?
			}
		}
		else{
			?>
            	<script>
					setTimeout(err2,200);
					function err2(){
							alert('請誤大塊盤子放到小塊盤子的上方(同樣的錯誤只提示一次)');	
					}
				</script>
            <?
		}
	}
	else{
		?>
        	<script>
				setTimeout(err1,200);
				function err1(){
						alert('請誤並非在最上層的盤子(同樣的錯誤只提示一次)');	
				}
			</script>
        <?	
	}
}
if(!$_SESSION['user']){
	setcookie('user','start',time()+3600);
	$_SESSION['L0']=array('0','1','2');
	$_SESSION['L1']=array();
	$_SESSION['L2']=array();
	$_SESSION['name']=$_GET['nickname'];
	$_SESSION['level']=$_GET['difficulty'];
	$_SESSION['num']=0;
	$_SESSION['user']='start';
	
	$mini=session_id().uniqid();
	$_SESSION['LL']=$mini;
	$mq("INSERT INTO `web05_c`.`data` (`id`, `name`, `num`, `LL`, `mini`) VALUES (NULL, '$_SESSION[name]', '0', '失敗', '$mini')");
}
if($_SESSION['name']!=$_GET['nickname'] || $_SESSION['level']!=$_GET['difficulty']){
	?>
    <script>
				setTimeout(err3,200);
				function err3(){
						alert('參數錯誤');
						document.location.href='index.php?';	
				}
			</script>
    <?
}
if(count($_SESSION['L2'])==$_SESSION['level']){
	$mq("UPDATE `web05_c`.`data` SET `LL` = '成功' WHERE `data`.`mini` = '$_SESSION[LL]'");
	?>
    	<script>
			setTimeout(over,200);
			function over(){
				alert('「成功」');
				document.location.href='index.php?';	
			}
		</script>
    <?
}

?>