<link href="css.css" rel="stylesheet" type="text/css">
<div class="login" style="display:inline-block">
	<div style="background:url(<?=$echo['file']?>) no-repeat center/cover"  class="img">
    
    </div>
    <Div>
    	<div class="text"> 
        	編號:<br>
			<?=(isset($_GET['search']))?(str_replace($_GET['search'],'<em>'.$_GET['search'].'</em>',$echo['id'])):$echo['id']?>
        </div>
    	<div class="text"> 
        	書名:<br>
			<?=(isset($_GET['search']))?(str_replace($_GET['search'],'<em>'.$_GET['search'].'</em>',$echo['name'])):$echo['name']?>
        </div>
        <div class="text"> 
        	作者:<br>
			<?=$echo['work']?>
        </div>
        <div>
        	分類<br>
            <select name="sort" class="text"  disabled>
			  <?
              $my=$mq("SELECT * FROM `sort`");
              while($print=$mfa($my)){
                  ?>
                  <option value="<?=$print['id']?>" <?=$echo['sort']==$print['id']?'selected="selected"':''?> >
                      <?=$print['name']?>
                  </option>   
                  <?
              }
                  ?>	
          </select>
        
        </div>
        <div class="text"> 
        	書本描述資訊:<br>
			<?=$echo['text']?>
        </div>
        <div  class="text"> 
        	出版年份:<br>
			<?=$echo['year']?>
        </div>
      	<Div class="text">
        	<?
				if($_SESSION['pe']){
					?>
                    	<input type="button" value="修改" onClick="url('?old=book&id=<?=$echo['id']?>')">
                        <input type="button" value="刪除" onClick="confirm('確定刪除')?url('back.php?dele=book&id=<?=$echo['id']?>'):''">
                    <?
				}
				if($_SESSION['id']){
					
					//echo $gg=$mnr($mq("SELECT * FROM `list` where `id`='$_SESSION[id']' and >$now"));
					$utime=$mr($mq("SELECT * FROM `user` where `id`='$_SESSION[id]'"),0,'time');
					if($utime<$now){
						$uid=$mnr($mq("SELECT * FROM `list` where `user`='$_SESSION[id]' and see='true'"));
						$thib=$mnr($mq("SELECT * FROM `list` where `book`='$echo[id]' and `see`='true' "));
						if($thib==0){
							if($uid<=2){
							?>
								<input type="button" value="借閱"  onClick="url('back.php?see=book&id=<?=$echo['id']?>')">
								
							<?
							}
							else{
								echo '大於三本';	
							}	
						}
						else{
							echo '已經借出';	
						}
						}
					else{
						echo '帳號被鎖定'.date('Y-m-d',$utime);	
					}
				}
			?>
        </Div>
    </Div>
</div>