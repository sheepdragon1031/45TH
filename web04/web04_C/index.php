<!DOCTYPE html>
<!-- saved from url=(0057)http://127.0.0.1/module_part1/index.php -->
<html>
<?
error_reporting(2);
session_start();
session_destroy();
mysql_connect('127.0.0.1','admin','1234');
mysql_query("set names 'utf8'");
mysql_select_db('web04');
$mq=mysql_query;
$mr=mysql_result;
$mnr=mysql_num_rows;
$mfa=mysql_fetch_array;
?>
<head>
	<meta charset="UTF-8"/>
	<link href="assets/css/style.css" rel="stylesheet"/>
	<link href="assets/css/widgets.css" rel="stylesheet"/>
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/jquery-ui.js"></script>
	<script src="assets/js/scripts.js"></script>

	<title>河內塔</title>
</head>
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
				<form action="game.php" method="GET">
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
        <div class="layout" style="margin:auto">
        <DIV class="op">	
            <span>名稱</span><span>數量</span><span>成功失敗</span>
		</DIV>
		<?
            $sql=$mq("SELECT * FROM `data` ORDER BY `data`.`id` DESC");
            while($echo=$mfa($sql)){
        ?>
            <div class="op">
                <span><?=$echo['name']?></span><span><?=$echo['num']?></span><span><?=$echo['over']?></span>
                <hr>
            </div>
        <?
            }
        ?>
    </div>
</div>

</body>
</html>