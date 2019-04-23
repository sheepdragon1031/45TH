<script>
	function src(x){
		document.location.href=x
	}
</script>
<?
mysql_connect('127.0.0.1','admin','1234');
mysql_query("set names 'utf8'");
mysql_select_db('web04');
$mq=mysql_query;
$mr=mysql_result;
$mnr=mysql_num_rows;
$mfa=mysql_fetch_array;
if(!$_SESSION['start']){
	$_SESSION['id']=session_id().uniqid();
	$_SESSION['name']=$_GET['nickname'];
	$_SESSION['level']=$_GET['difficulty'];
	$_SESSION['num']=0;
	$_SESSION['l0']=array('0','1','2');
	$_SESSION['l1']=array();
	$_SESSION['l2']=array();
	$_SESSION['start']='use';
	$mq("INSERT INTO `web04`.`data` (`id`, `name`, `num`, `over`, `my`) VALUES (NULL, '$_GET[nickname]', '0', '失敗', '$_SESSION[id]')");
}
if($_GET['fromStackId']!=$_COOKIE['from'] || $_GET['toStackId']!=$_COOKIE['to'] || $_COOKIE['id']!=$_GET['brickId']){
	setcookie('from',$_GET['fromStackId'],time()+3600);
	setcookie('to',$_GET['toStackId'],time()+3600);
	setcookie('id',$_GET['brickId'],time()+3600);
	$id=$_GET[brickId];
	$to='l'.$_GET[toStackId];
	$from='l'.$_GET[fromStackId];
	
		if($_SESSION[$from][0]==$id){
			if($_SESSION[$to][0]>=$id || $_SESSION[$to][0]==''){
				if(($_SESSION[$to][0]>$id) || $_SESSION[$to][0]==''){
					unset($_SESSION[$from][0]);
					array_push($_SESSION[$to],$id);
					sort($_SESSION[$to]);
					sort($_SESSION[$from]);
					$mq("UPDATE `web04`.`data` SET `num` = '$_SESSION[num]' WHERE `data`.`my` ='$_SESSION[id]'");
					$_SESSION['num']++;
					?>
                    	<script>
							var num=<?=$_SESSION['num']?>;
						</script>
                    <?
					
				}
			}
			else{
				?>
					<script>alert('放至錯誤')</script>
				<?		
			}
		}
		else{
			?>
				<script>alert('不是最上層')</script>
			<?
		}
	?>
	 
  <?
	
}
if(count($_SESSION['l2'])==$_SESSION['level']){
		$mq("UPDATE `web04`.`data` SET `num` = '$_SESSION[num]' ,`over`='成功' WHERE `data`.`my` ='$_SESSION[id]'");
		?>
        	<script>
				alert('遊戲結束');
				src('index.php');
			</script>
        <?
	}
if( $_GET['nickname']!=$_SESSION['name'] || $_GET['difficulty']!=$_SESSION['level']){
	?>
    	<script>
			alert('參數錯誤');
			src('index.php');
		</script>
    <?
}

?>

