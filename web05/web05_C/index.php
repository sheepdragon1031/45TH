<!DOCTYPE html>
<!-- saved from url=(0057)http://127.0.0.1/module_part1/index.php -->
<html>
<head>
	<meta charset="UTF-8"/>
	<link href="assets/css/style.css" rel="stylesheet"/>
	<link href="assets/css/widgets.css" rel="stylesheet"/>
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/jquery-ui.js"></script>
	<script src="assets/js/scripts.js"></script>

	<title>河內塔</title>
</head>
<?
error_reporting(0);
session_start();
session_destroy();
mysql_connect('127.0.0.1','admin','1234');
mysql_select_db('web05_c');
mysql_query('set names "utf8"');
$mq=mysql_query;
$mfa=mysql_fetch_array;
?>
<body>
<div id="container-game" style="width:620px !important">
	<div class="row">
		<div class="layout">
			<h2>河內塔</h2>
			<fieldset id="rule">
				<legend>遊戲規則</legend>
				<div>有三根竿子，例如編號為A、B和C，竿子上面可串中空圓盤。
於A竿子放入N個盤子開始，盤子由下至上變小。
一次只能移動一個盤子。
大盤子不能再小盤子上面。
目標將全部盤子移動到C竿子。
				</div>
			</fieldset>
			<div class="game" style="margin-top:10px">
				<form action="game.php?" method="GET">
					<div class="row">
						<label for="nickname">暱稱</label>
						<input type="text" id="nickname" name="nickname" required/>
					</div>
					<div class="row">
						<label for="difficulty">難易度</label>
						<select id="difficulty" name="difficulty">
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
						</select>
					</div>
					<button type="submit" style="margin-left:113px">開始遊戲</button>
				</form>
					
			
			</div>
		</div>
	</div>
    <div class="muki">
    	<h3>紀錄表</h3>
        <div class="LL">
            <span>名稱</span>
            <span>步數</span>
            <span>成功失敗</span>
        </div>
        <hr>
    	<?
			$sql=$mq("SELECT * FROM `data`");
			while($echo=$mfa($sql)){
				?>
                	<div class="LL">
                    	<span><?=$echo['name']?></span>
                        <span><?=$echo['num']?></span>
                        <span><?=$echo['LL']=='失敗'?str_replace($echo['LL'],'<em class="r">'.$echo['LL'].'</em>',$echo['LL']):str_replace($echo['LL'],'<em class="g">'.$echo['LL'].'</em>',$echo['LL'])?></span>
                    </div>
                    <hr>
                <?	
			}
		?>
    </div>
</div>
</body>
</html>