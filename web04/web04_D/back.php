<script src="js.js"></script>
<?
session_start();
include_once('sql.php');
if($_GET['up']=='user'){
	$o=$mnr($mq("SELECT * FROM `user` where `user`='$_POST[upuser]'"));
	if($o==0){
		$_POST['uppass']=md5($_POST['uppass']);
		if($_POST['upuser']=='admin'){
			$mq("INSERT INTO `web04`.`user` (`id`, `user`, `pass`, `name`, `noid`, `mail`, `phone`, `power`, `time`) VALUES (NULL, '$_POST[upuser]', '$_POST[uppass]', '$_POST[upname]', '$_POST[upnoid]', '$_POST[upmail]', '$_POST[uphone]', 'true', '0')");
		}
		else{
			$mq("INSERT INTO `web04`.`user` (`id`, `user`, `pass`, `name`, `noid`, `mail`, `phone`, `power`, `time`) VALUES (NULL, '$_POST[upuser]', '$_POST[uppass]', '$_POST[upname]', '$_POST[upnoid]', '$_POST[upmail]', '$_POST[uphone]', 'false', '0')");
		}
		?>
     		<script>
					url('index.php?log','註冊成功');
			</script>   
        <?
	}
	else{
		?>
        	<script>
				err('用戶名重複');
			</script>
        <?
	}
}
if($_GET['log']=='user'){
	$o=$mnr($mq("SELECT * FROM `user` where `user`='$_POST[louser]'"));
	$_POST['lopass']=md5($_POST['lopass']);
	$x=$mnr($mq("SELECT * FROM `user` where `user`='$_POST[louser]' and `pass`='$_POST[lopass]'"));
	if($o==1){
		if($x==1){
			$pr=$mr($mq("SELECT * FROM `user` where `user`='$_POST[louser]' and `pass`='$_POST[lopass]'"),0,'power');
			$_SESSION['user']=$_POST['louser'];
			$_SESSION['power']=$pr;
			?>
            	<script>
					url('index.php?log','登入成功');
				</script>
            <?
		}
		else{
			?>
            	<script>
					err('密碼錯誤')
				</script>
            <?		
		}
	}
	else{
		?>
        <script>
			err('帳號錯誤')
		</script>
        <?	
	}
}
if($_GET['ne']=='classd'){
	$mq("INSERT INTO `web04`.`sort` (`id`, `name`) VALUES (NULL, '$_POST[nesort]')");
	?>
    	<script>
			url('index.php?sort','新增完成')
		</script>	
    <?
}
if($_GET['ol']=='classd'){
	echo $mq("UPDATE `web04`.`sort` SET `name` = '$_POST[sort]' WHERE `sort`.`id` = '$_POST[id]'");
	?>
    	<script>
			url('index.php?sort','修改完成')
		</script>	
    <?
}
if($_GET['de']=='classd'){
	$mq("DELETE FROM `web04`.`sort` WHERE `sort`.`id` = '$_GET[id]'");
	?>
    	<script>
			url('index.php?sort','刪除完成');
		</script>
    <?
}
if($_GET['ne']=='book'){
	$tid='img/'.uniqid().'.png';
	for($i=0;$i<count($_FILES['bfile']['tmp_name']);$i++){
		$tfp=$_FILES['bfile']['tmp_name'];
		if(is_uploaded_file($tfp)){
				move_uploaded_file($tfp,$tid);
				$mq("INSERT INTO `web04`.`book` (`id`, `src`, `name`, `work`, `text`, `sort`, `year`) VALUES (NULL, '$tid', '$_POST[bname]', '$_POST[bwork]', '$_POST[btext]', '$_POST[bclass]', '$_POST[byear]')");
				
		}
		else{
				$mq("INSERT INTO `web04`.`book` (`id`, `src`, `name`, `work`, `text`, `sort`, `year`) VALUES (NULL, 'img/56288f32094e5.png'', '$_POST[bname]', '$_POST[bwork]', '$_POST[btext]', '$_POST[bclass]', '$_POST[byear]')");
			
		}
		
	}
	?>
    	<script>
			url('index.php?','新增完成');
		</script>
    	<?
}
if($_GET['ol']=='book'){
	$tid='img/'.uniqid().'.png';
	for($i=0;$i<count($_FILES['bfile']['tmp_name']);$i++){
		$tfp=$_FILES['bfile']['tmp_name'];
		if(is_uploaded_file($tfp)){
				move_uploaded_file($tfp,$tid);
			$mq("UPDATE `web04`.`book` SET `src`='$_POST[tid]' , `name` = '$_POST[bname]', `work` = '$_POST[bwork]', `text` = '$_POST[btext]', `sort` = '$_POST[bclass]', `year` = '$_POST[byear]' WHERE `book`.`id` = '$_GET[id]'");
				
		}
		else{
			$mq("UPDATE `web04`.`book` SET `name` = '$_POST[bname]', `work` = '$_POST[bwork]', `text` = '$_POST[btext]', `sort` = '$_POST[bclass]', `year` = '$_POST[byear]' WHERE `book`.`id` = '$_GET[id]'");
			
		}
		
	}
	?>
    	<script>
		url('index.php?','修改完成');
		</script>
   <?
}
if($_GET['del']=='book'){
	$mq("DELETE FROM `web04`.`book` WHERE `book`.`id` = '$_GET[id]'");	
	?>
    	<script>
			url('index.php?','刪除成功');
		</script>
   <?
}
?>