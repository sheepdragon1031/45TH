<!DOCTYPE html>
<!-- saved from url=(0057)http://127.0.0.1/module_part1/game.html?nickname=%E7%8E%8B%E5%B0%8F%E6%98%8E&difficulty=3 -->
<html>
<head>
	<meta charset="UTF-8"/>
	<link href="assets/css/style.css" rel="stylesheet"/>
	<link href="assets/css/widgets.css" rel="stylesheet"/>
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/jquery-ui.js"></script>
	<script src="assets/js/scripts.js"></script>

	<title>河內塔</title>
    <?
    include('php.php')
	?>
</head>
<body>
<div id="container-game">
	<div class="row">
		<div class="layout">
			<h2>河內塔</h2>
			
			<div class="game">
				
					<div class='batang' data-id="0">
                    	<?
							for($i=0;$i<count($_SESSION['L0']);$i++){
								$j=$_SESSION['L0'][$i]+1;
								echo '<div class="brick b'.$j.'" data-id="'.$_SESSION['L0'][$i].'"></div>';
							}
						?>						
					</div>
					<div class='batang' data-id="1">
						<?
							for($i=0;$i<count($_SESSION['L1']);$i++){
								$j=$_SESSION['L1'][$i]+1;
								echo '<div class="brick b'.$j.'" data-id="'.$_SESSION['L1'][$i].'"></div>';
							}
						?>	
					</div>
					<div class='batang' data-id="2">
						<?
							for($i=0;$i<count($_SESSION['L2']);$i++){
								$j=$_SESSION['L2'][$i]+1;
								echo '<div class="brick b'.$j.'" data-id="'.$_SESSION['L2'][$i].'"></div>';
							}
						?>	
					</div>
			
			</div>
			<div class="desc left">
				<a href="./" class="btn btn-secondary">回到設定頁面</a>
			</div>
		</div>
		<div class="module">
			<div class="mod">
				<h4>暱稱</h4>
				<h2><?=$_SESSION['name']?></h2>
			</div>
			<div class="mod" id="move">
				<h4>移動次數</h4>
				<h2><?=$_SESSION['num']?></h2>
			</div>
		</div>
	</div>
</div>

</body>
</html>