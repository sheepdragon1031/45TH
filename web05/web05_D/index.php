<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>圖書館</title>
<link href="css.css" rel="stylesheet" type="text/css" />
</head>
<?
	include_once('sql.php');
?>
<body>
    <div class="top">
            <ul>
                <?
                    for($i=0;$i<count($a_1);$i++){
                        ?>
                            <li>
                                <a href="<?=$a_2[$i]?>"><?=$a_1[$i]?></a>
                            </li>
                        <?
                    }
                ?>
                <li>
                	<form action="" method="get">
                    	<?
							if($_SESSION['id']){
								?>
                                	<select name="sort">
                                    	<?
											for($i=0;$i<count($z_1);$i++){
										?>
                                        	<option value="<?=$z_2[$i]?>" <?=$_GET['sort']==$z_2[$i]?'selected="selected"':''?> >
                                            	<?=$z_1[$i]?>
                                            </option>
                                        <?
											}
										?>
                                    </select>
                                <?
							}
							else{
								?>
                                <input type="hidden" name="sort" value="name"  />
                                <?	
							}
						?>	
                    	<input type="search" name="search" value="<?=$_GET[search]?>" />
                        <input type="submit" />
                    </form>
                </li>
            </ul>
        </div>
	        
    <Div class="mid">
    		<?
				if(isset($_GET['login'])){
					?>
                    <div class="login mag">
                    	<h3>註冊</h3>
                    	<form action="back.php?login=user" method="post" >
                        	<input type="text" placeholder="用戶名" name="user" class="text"  required="required" > 
                             <input type="password" placeholder="密碼" name="pass" class="text" required="required" >
                              	<input type="submit" value="登入" class="text" />
                        </form>
                    </div>
                    <?
				}
				
				if(isset($_GET['new'])){
					?>
                    <div class="login mag">
                    	<h3>註冊</h3>
                    	<form action="back.php?new=user" method="post" >
                        	<input type="text" placeholder="用戶名" name="user" class="text"  required="required" > 
                            <input type="password" placeholder="密碼" name="pass" class="text" required="required" >
                            <input type="text" placeholder="姓名" name="name" class="text"  required="required" >
                            <input type="text" placeholder="身分證" name="noid" pattern="[A-Z]+[0-9]{4}" class="text" title="1 位元大寫字母
開頭+4 位元數位"  required="required">
                              <input type="text" placeholder="mail" name="mail" pattern="\w+@+[\w]+\.[a-z]{2,5}" class="text" title="mail:b@b"  required="required" >
                                <input type="text" placeholder="電話" name="phone" pattern="[0-9]{9}" class="text"  title="電話: 9 位元數位"  required="required">
                       	<input type="submit" value="送出" class="text" />
                        </form>
                    </div>
                    <?
				}
				if(isset($_GET['classd'])){
					?>
                    	<div class="login mag">
                        	<h3>分類</h3>
                        	<form action="back.php?new=classd" method="post" class="tb">
                            	<input type="text"  placeholder="分類" name="class"  required="required">
                                <input type="submit" value="新增">
                            </form>
                            <?
								$my=$mq("SELECT * FROM `sort`");
								while($print=$mfa($my)){
									?>
                                    <form action="back.php?old=classd" method="post" class="tb">
                                        <input type="text"  placeholder="分類" name="class" value="<?=$print['name']?>"  required="required">
                                        <input type="hidden" value="<?=$print['id']?>" name="id" />
                                        <input type="submit" value="修改">
                                    </form>
                                    <?	
								}
							?>
                        </div>
                    <?
				}
				if(isset($_GET['book'])){
					?>
                    <div class="login mag">
                    	<h3>新書</h3>
                    	<form action="back.php?new=book" method="post" enctype="multipart/form-data" >
                        	<input type="text" placeholder="<?=sprintf("%04d",$nbook)?>"  class="text"  readonly="readonly" > 
                            <input type="text" placeholder="書名" name="name" class="text"  required="required" > 
                            <input  type="file" name="file"  required="required"  />
                            <select name="sort" class="text">
                            	<?
								$my=$mq("SELECT * FROM `sort`");
								while($print=$mfa($my)){
									?>
                                 	<option value="<?=$print['id']?>">
                                    	<?=$print['name']?>
                                    </option>   
                                    <?
								}
									?>	
                            </select>
                            <input type="text" placeholder="作者" name="work" class="text"  required="required" >
                          	<textarea class="text" name="text" placeholder="書本描述資訊" required="required"></textarea>
                                <input type="text" placeholder="出版年份" name="year" pattern="[0-9]{4}" class="text"    required="required">
                       	<input type="submit" value="送出" class="text" />
                        </form>
                    </div>
                    <?
				}
			if(!$_GET){
				$sql=$mq("SELECT * FROM `book`");
				while($echo=$mfa($sql)){
					include('box.php');
				}
			}
			if(isset($_GET['old'])){
					$sql=$mq("SELECT * FROM `book` where id='$_GET[id]'");
					while($echo=$mfa($sql)){
					?>
                    <div class="login mag">
                    <div style="background:url('<?=$echo['file']?>') no-repeat center/cover"  class="img">
    
    				</div>
                    	<h3>修改</h3>
                    	<form action="back.php?old=book&id=<?=$echo['id']?>" method="post" enctype="multipart/form-data" >
                        	<input type="text" placeholder="<?=$echo['id']?>"  class="text"  readonly="readonly" > 
                            <div class="text">書名</div>
                            <input type="text" placeholder="書名"  value="<?=$echo['name']?>"name="name" class="text"  required="required" > 
                             <div class="text">圖片</div>
                            <input  type="file" name="file"  />
                             <select name="sort" class="text">
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
                             <div class="text">作者</div>
                            <input type="text" placeholder="作者" name="work" value="<?=$echo['work']?>" class="text"  required="required" >
                          	 <div class="text">書本描述資</div>
                            <textarea class="text" name="text" placeholder="書本描述資訊" required="required"><?=$echo['text']?></textarea>
                             <div class="text">出版年份</div>
                            <input type="text" placeholder="出版年份" name="year" pattern="[0-9]{4}" class="text"  value="<?=$echo['year']?>"  required="required">
                       	<input type="submit" value="送出" class="text" />
                        </form>
                    </div>
                    <?
					}
				}
				if(isset($_GET['me'])){
					?>
                    <div class="login mag" style="width:40rem;">
                    	<h3>借閱中</h3>
                        <div class="text me">
                            	<span>書名</span>
                                <span>借出日</span>
                                <span>到期日</span>
                       </div>
						<?
                        $sql=$mq("SELECT * FROM `list` where `user`='$_SESSION[id]' and `see`='true'");
                        while($echo=$mfa($sql)){
							$bokn=$mr($mq("SELECT * FROM `book` where `id`='$echo[book]'"),0,'name')
                        ?>
                        	<div class="text me">
                            	<span><?=$bokn?></span>
                                <span><?=date("Y-m-d",$echo['time1'])?></span>
                                <span><?=date("Y-m-d",$echo['time2'])?>(不含)</span>
                                <span>
                                	<input type="button" value="歸還" onclick="url('back.php?no=see&id=<?=$echo['id']?>')">
                                    <?
										if($echo['time2']-(86400*3)<$now &&  $echo['time2']>$now && $echo['one']=='false'){
											?>
                                            	<input type="button" value="續借" onclick="url('back.php?more=see&id=<?=$echo['id']?>')">
                                            <?
										}
									?>
                                </span>
                            </div>
                        <?
                        }
                        ?>
                        <h3>歷始清單</h3>
                        <div class="text me">
                            	<span>書名</span>
                                <span>借出日</span>
                                <span>規還日</span>
                       </div>
						<?
                        $sql=$mq("SELECT * FROM `list` where `user`='$_SESSION[id]' and `see`='false'");
                        while($echo=$mfa($sql)){
							$bokn=$mr($mq("SELECT * FROM `book` where `id`='$echo[book]'"),0,'name')
                        ?>
                        	<div class="text me">
                            	<span><?=$bokn?></span>
                                <span><?=date("Y-m-d",$echo['time1'])?></span>
                                <span><?=date("Y-m-d",$echo['time2'])?></span>
                                <span>
                                	
                                </span>
                            </div>
                        <?
                        }
                        ?>
                    </div>
                    <?
				}
				if(isset($_GET['logout'])){
					session_destroy();
					?>
                    	<script>
							url('?','登出成功');
						</script>
                    <?					
				}
				if(isset($_GET['search'])){
				$sql=$mq("SELECT * FROM `book` WHERE $_GET[sort] LIKE '%$_GET[search]%'");
				while($echo=$mfa($sql)){
					include('box.php');
				}
			}
			?>
    </Div>
</body>
</html>