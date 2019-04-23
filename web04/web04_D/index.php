<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>圖書館</title>
</head>
<?
	include_once('sql.php');
?>
<body>
	<div class="top">
    	<?
        	for($i=0;$i<count($a_1);$i++){
				?>
                	<a href="<?=$a_2[$i]?>"><?=$a_1[$i]?></a>
                <?
			}
		?>
    </div>
    <Div class="page">
    	<?
			if(isset($_GET['log'])){
				?>
                	<form action="back.php?log=user" method="post">
                    	<div class="uplog">
                        	<div>
                            	<input type="text" name="louser"  placeholder="用戶名"  required="required"/>
                            </div>
                            <div>
                            	<input type="password" name="lopass"  placeholder="密碼"  required="required"/>
                            </div>
                            <div>
                            	<input type="submit" name="log" value="登入" />
                            </div>
                        <div>
                    </form>
                <?
			}
			if(isset($_GET['up'])){
				?>
                	<form action="back.php?up=user" method="post">
                      <div class="uplog">
                        	<div>
                            	<input type="text" name="upuser"  placeholder="用戶名"  required="required"/>
                            </div>
                            <div>
                            	<input type="password" name="uppass"  placeholder="密碼"  required="required"/>
                            </div>
                             <div>
                            	<input type="text" name="upname"  placeholder="姓名"  required="required"/>
                            </div>
                             <div>
                            	<input type="text" name="upnoid"  placeholder="身分證"  pattern="[A-Z]+[0-9]{4}"  title="範例:A0000" required="required"/>
                            </div>
                             <div>
                            	<input type="email" name="upmail"  placeholder="mail"  title="範例:A@A" required="required"/>
                            </div>
                            <div>
                            	<input type="text" name="uphone"  placeholder="phone" pattern="[0-9]{8}" title="範例:12345678"  required="required"/>
                            </div>
                            <div>
                            	<input type="submit" value="註冊" name="log" />
                            </div>
                        <div>
                    </form>
                <?
			}
			if(isset($_GET['sort'])){
				?>
                	<form action="back.php?ne=classd" method="post">
                    	<input type="text" name="nesort"  />
                        <input type="submit" value="新增" />
                    </form>
                    <div class="uplog">
                    	<?
						$sql=$mq("SELECT * FROM `sort`");
						while($echo=$mfa($sql)){
						?>
                        <form action="back.php?ol=classd" method="post">
                        	<div>
                            	<span><input type="text" value="<?=$echo['name']?>"  name="sort"/></span><span><input type="submit" value="修改" /></span><span><input type="button" value="刪除" onclick="confirm('確定刪除?')?url('back.php?de=classd&id=<?=$echo['id']?>'):''" /></span>							<input type="hidden" value="<?=$echo['id']?>"  name="id"/>
                            </div>
                        </form>    
                        <?
							}	
						?>
                    </div>
                <?
			}
			if(isset($_GET['new'])){
				
				?>
                	<form action="back.php?ne=book" method="post" enctype="multipart/form-data">
                      <div class="uplog">
                        	 <div>
                            	<input type="text" name="upname"  placeholder="編號:<?=sprintf("%04d",$nbos)?>" readonly="readonly"  required="required"/>
                            </div>
                            <div>
                            	<input type="text" name="bname"  placeholder="書名"  required="required"/>
                            </div>
                            <div>
                            	<input type="file" name="bfile" />
                            </div>
                            <div>
                            <select name="bclass" >
									<?
                                    $sql=$mq("SELECT * FROM `sort`");
                                    while($echo=$mfa($sql)){
                                        ?>
                                        	<option value="<?=$echo['id']?>">
                                            	<?=$echo['name']?>
                                            </option>
                                        <?
                                        }
                                    ?>
                                </select>
                            </div>
                             <div>
                            	<input type="text" name="bname"  placeholder="書名" required="required" />
                            </div>
                             <div>
                            	<input type="text" name="bwork"  placeholder="作者" required="required"/>
                            </div>
                            <div>
                           		<textarea placeholder="內容" name="btext"></textarea>
                            </div>
                            <div>
                            	<input  placeholder="年份"  pattern="[0-9]{4}" name="byear" />
                            </div>
                            <Div>
                            	<input type="submit" >
                            </Div>
                        <div>
                    </form>
                <?
			}
			if(!$_GET){
				$sql=$mq("SELECT * FROM `book`");
				while($echo=$mfa($sql)){
				?>
                	<div class="boo">
                    	<span><img src="<?=$echo['src']?>" style="height:3rem; width:3rem" /></span><span onclick="url('?url=jump')">書名:<?=$echo['name']?></span><span>作者:<?=$echo['work']?></span>
                        <span>分類:
						 <select name="bclass" disabled="disabled">
									<?
                                    $sqll=$mq("SELECT * FROM `sort`");
                                    while($print=$mfa($sqll)){
                                        ?>
                                        	<option value="<?=$print['id']?>" <?=$echo['sort']==$print['id']?'selected="selected"':''?>  >
                                            	<?=$print['name']?>
                                            </option>
                                        <?
                                        }
                                    ?>
                                </select>
                        </span>
                        <span>內容:<?=$echo['text']?></span>
                        <span>年份:<?=$echo['year']?></span>
                        <span>
                        	<input type="button" value="修改" onclick="url('index.php?re=bo&id=<?=$echo['id']?>')">
                            <input type="button" value="刪除" onclick="url('back.php?del=book&id=<?=$echo['id']?>')" />
                        </span>
                    </div>
                <?
				}
			}
			if($_GET['re']=='bo'){
				$sql=$mq("SELECT * FROM `book` where `id`='$_GET[id]'");
				while($echo=$mfa($sql)){
					?>
					<form action="back.php?ol=book&id=<?=$_GET['id']?>" method="post" enctype="multipart/form-data">
                      <div class="uplog">
                        	 <div>
                            	<input type="text" name="upname"  placeholder="編號:<?=sprintf("%04d",$_GET['id'])?>" readonly="readonly"  required="required"/>
                            </div>
                            <div>
                            	<input type="text" name="bname"  placeholder="書名"  required="required" value="<?=$echo['name']?>"/>
                            </div>
                            <div>
                            	<input type="file" name="bfile" />
                                
                            </div>
                            <div>
                            <select name="bclass" >
									<?
                                    $sqll=$mq("SELECT * FROM `sort`");
                                    while($print=$mfa($sqll)){
                                        ?>
                                        	<option value="<?=$print['id']?>" <?=$echo['sort']==$print['id']?'selected="selected"':''?>  >
                                            	<?=$print['name']?>
                                            </option>
                                        <?
                                        }
                                    ?>
                                </select>
                            </div>
                             <div>
                            	<input type="text" name="bname"  placeholder="書名" value="<?=$echo['name']?>" required="required" />
                            </div>
                             <div>
                            	<input type="text" name="bwork"  placeholder="作者" required="required" value="<?=$echo['work']?>"/>
                            </div>
                            <div>
                           		<textarea placeholder="內容" name="btext"><?=$echo['text']?></textarea>
                            </div>
                            <div>
                            	<input  placeholder="年份"  pattern="[0-9]{4}" name="byear"  value="<?=$echo['year']?>"/>
                            </div>
                            <Div>
                            	<input type="submit" >
                            </Div>
                        <div>
                    </form>
                    <?
				}
			}
			if(isset($_GET['sreach'])){
				?>
                	<form action="" method="get">
                    	<?
							if($_SESSION['user']){
						?>
                        <select name="class" >
								<?
									for($i=0;$i<count($z_1);$i++){
									?>	
                                        	<option value="<?=$z_2[$i]?>"  <?=$z_2[$i]==$_GET['class']?'selected="selected"':''?>  >
                                            	<?=$z_1[$i]?>
                                            </option>
                                        <?
                                        }
                                    ?>
                                </select>
                    	<?
							}
							else{
								$_GET['class']='name';	
							}
						?>
                        <input type="search" name="sreach" value="<?=$_GET['sreach']?>" />
                        <input type="submit" value="搜尋" />
                    </form>	
                <?
				$sql=$mq("SELECT * FROM `book` WHERE $_GET[class] LIKE '%$_GET[sreach]%'");
				while($echo=$mfa($sql)){
				?>
                	<div class="boo">
                    	<span><img src="<?=$echo['src']?>" style="height:3rem; width:3rem" /></span>
                        <span>編號<?=str_replace($_GET['sreach'],'<em>'.$_GET['sreach'].'<em>',sprintf("%04d",$echo['id']))?></span>
                        <span>書名<?=str_replace($_GET['sreach'],'<em>'.$_GET['sreach'].'<em>',$echo['name'])?></span>
                        <span>作者:<?=$echo['work']?></span>
                        <span>分類:
						 <select name="bclass" disabled="disabled">
									<?
                                    $sqll=$mq("SELECT * FROM `sort`");
                                    while($print=$mfa($sqll)){
                                        ?>
                                        	<option value="<?=$print['id']?>" <?=$echo['sort']==$print['id']?'selected="selected"':''?>  >
                                            	<?=$print['name']?>
                                            </option>
                                        <?
                                        }
                                    ?>
                                </select>
                        </span>
                        <span>內容:<?=$echo['text']?></span>
                        <span>年份:<?=$echo['year']?></span>
                        <span>
                        	<input type="button" value="修改" onclick="url('index.php?re=bo&id=<?=$echo['id']?>')">
                            <input type="button" value="刪除" onclick="url('back.php?del=book&id=<?=$echo['id']?>')" />
                        </span>
                    </div>
                <?
				}	
			}
			if($_GET['url']='jump'){
				$mq("UPDATE `web04`.`book` SET `view` = '1' WHERE `book`.`id` = 7");
				
			}
		?>
    </Div>
</body>
</html>