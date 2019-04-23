
<?

include_once('sql.php');
$pass=md5($_POST['pass']);
if($_GET['new']=='user'){
	echo $unn=$mnr($mq("SELECT * FROM `user` where `user`='$_POST[user]'"));
	if($unn==0){
		
		if($_POST['user']=='admin'){
				$mq("INSERT INTO `web05_d`.`user` (`id`, `user`, `pass`, `name`, `power`, `noid`, `mail`, `phone`, `time`) VALUES (NULL, '$_POST[user]', '$pass', '$_POST[name]', 'true', '$_POST[noid]', '$_POST[mail]', '$_POST[phone]', '0')");
		}
		else{
			$mq("INSERT INTO `web05_d`.`user` (`id`, `user`, `pass`, `name`, `power`, `noid`, `mail`, `phone`, `time`) VALUES (NULL, '$_POST[user]', '$pass', '$_POST[name]', 'false', '$_POST[noid]', '$_POST[mail]', '$_POST[phone]', '0')");
			
		}
		?>
        	<script>
				url('index.php?login','註冊成功');
			</script>
        <?
	}
	else{
		?>
        	<script>
				reurl('帳號重複');
			</script>
        <?	
	}

}
if($_GET['login']=='user'){
	$unn=$mnr($mq("SELECT * FROM `user` where `user`='$_POST[user]'"));
	$pnn=$mnr($mq("SELECT * FROM `user` where `user`='$_POST[user]' and `pass`='$pass'"));
	if($unn=='1'){
		if($pnn=='1'){
			$id=$mr($mq("SELECT * FROM `user` where `user`='$_POST[user]' and `pass`='$pass'"),0,'id');	
			$pr=$mr($mq("SELECT * FROM `user` where `user`='$_POST[user]' and `pass`='$pass'"),0,'power');	
			$_SESSION['id']=$id;
			$_SESSION['pe']=$pr;
			?>
            	<script>
					url('index.php','登入成功');
				</script>
            <?
		}
		else{
			?>
        	<script>
				reurl('密碼錯誤');
			</script>
        <?		
		}
	}
	else{
		?>
        	<script>
				reurl('帳號錯誤');
			</script>
        <?	
	}
}
if($_GET['new']=='classd'){
	$mq("INSERT INTO `web05_d`.`sort` (`name`) VALUES ( '$_POST[class]')");
	?>
    	<script>
			url('index.php?classd','新增完成');
		</script>
    <?
}
if($_GET['old']=='classd'){
	 $mq("UPDATE `web05_d`.`sort` SET `name` = '$_POST[class]' WHERE `sort`.`id` = '$_POST[id]'");
	?>
    	<script>
			url('index.php?classd','修改完成');
		</script>
    <?
}
if($_GET['new']=='book'){
	if(is_uploaded_file($_FILES['file']['tmp_name'])){
		$id='img/'.uniqid().'.png';
		move_uploaded_file($_FILES['file']['tmp_name'],$id);
		$mq("INSERT INTO `web05_d`.`book` (`id`, `name`, `file`, `work`, `text`, `year`,`sort`) VALUES (NULL, '$_POST[name]', '$id', '$_POST[work]', '$_POST[text]', '$_POST[year]' , '$_POST[sort]')");
		?>
    	<script>
			url('index.php?','新增完成');
		</script>
    	<?
	}
	else{
		?>
    	<script>
			reurl('上傳錯誤');
		</script>
    <?
	}
	
	
}
if($_GET['old']=='book'){
	if(is_uploaded_file($_FILES['file']['tmp_name'])){
		$id='img/'.uniqid().'.png';
		move_uploaded_file($_FILES['file']['tmp_name'],$id);
		$mq("UPDATE `web05_d`.`book` SET `file` =  '$id', `name` =  '$_POST[name]', `work` =  '$_POST[work]', `sort` = '$_POST[sort]', `text` = '$_POST[text]', `year` = '$_POST[year]'  WHERE `book`.`id` = '$_GET[id]'");
		?>
    	<script>
			url('index.php?','修改完成(圖)');
		</script>
    	<?
	}
	else{
		echo $mq("UPDATE `web05_d`.`book` SET `name` =  '$_POST[name]' , `work` =  '$_POST[work]', `sort` = '$_POST[sort]', `text` = '$_POST[text]', `year` = '$_POST[year]'  WHERE `book`.`id` = '$_GET[id]'");
		
		?>
    	<script>
		url('index.php?','修改完成');
		</script>
    	<?
	}
	
	
}
if($_GET['dele']=='book'){
	$mq("DELETE FROM `web05_d`.`book` WHERE `book`.`id` = '$_GET[id]'");
	$mq("DELETE FROM `web05_d`.`list` WHERE `list`.`book`='$_GET[id]'");
	?>
    	<script>
		url('index.php?','刪除成功');
		</script>
    	<?
}
if($_GET['see']=='book'){
	
	
	$mq("INSERT INTO `web05_d`.`list` (`id`, `user`, `book`, `time1`, `time2`, `see`, `one`) VALUES (NULL, '$_SESSION[id]', '$_GET[id]', '$now', '$time1', 'true', 'false')");
	?>
    	<script>
		url('index.php?me','成功借出');
		</script>
    	<?
}
if($_GET{'no'}=='see'){
	 $mtime=$mr($mq("SELECT * FROM `list` where `id`='$_GET[id]'"),0,'time2');
	if($mtime<$now){
		$utime=$mr($mq("SELECT * FROM `user` where `id`='$_SESSION[id]'"),0,'time');
		$look=ceil(($now-$mtime)/86400);
		if($utime<$now){
			$sop=$now+$look*86400;
			$mq("UPDATE `web05_d`.`user` SET `time` = '$sop' WHERE `user`.`id` = '$_SESSION[id]'");
		}
		else{
			$sop=$utime+$look*86400;
			$mq("UPDATE `web05_d`.`user` SET `time` = '$sop' WHERE `user`.`id` = '$_SESSION[id]'");	
		}
		
		
	}
	$mq("UPDATE `web05_d`.`list` SET `time2` = '$now', `see` = 'false' WHERE `list`.`id` ='$_GET[id]'");
	?>
    	<script>
		url('index.php?me','成功歸還');
		</script>
    	<?
}
if($_GET{'more'}=='see'){
	$mtime=$mr($mq("SELECT * FROM `list` where `id`='$_GET[id]'"),0,'time2');
	$mtime=$mtime+86400*14;
	$mq("UPDATE `web05_d`.`list` SET `time2` = '$mtime', `one` = 'true' WHERE `list`.`id` ='$_GET[id]'");
	?>
    	<script>
		url('index.php?me','成功續借');
		</script>
    	<?
}
?>