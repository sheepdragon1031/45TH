// JavaScript Document
//UI
var thi,the,py=0,px=0;
$(document).ready(function(e) {
    img();
	emove();
	var dropzone=document.getElementById('drop');
	dropzone.addEventListener('dragover',dragover,false);
	dropzone.addEventListener('drop',drop,false);
	dropzone.addEventListener('dragleave',dragleave,false);
	dropzone.addEventListener('dragenter',dragenter,false);
	$('img').mousedown(function(e) {
		if($(this).attr('in')=='now'){
			$('.live').css('border','#CCC 0rem dashed');
			thi=this;
			$(this).parent('div').css('border','#CCC 0.2rem dashed');			
		}
    });
});
$(document).click(function(e) {
    if(e.target.id=='picture'){
		console.log(e.target.id);
		$('.live').css('border','#CCC 0rem dashed');
		thi=null;
	}
});
function drop(e){
	e.preventDefault();
	e.stopPropagation();
	var file=e.dataTransfer.files;
	console.log(file[0]);
	if(file[0].type=='image/jpeg'){
		if(file[0].size<1024*300){
			var nfd=new FormData();
			nfd.append('file',file[0]);
			var xhr=new XMLHttpRequest();
			xhr.open('POST','file.php');
			xhr.addEventListener('load',iload,false);
			xhr.send(nfd);
		}
		else{
			alert('檔案過大');	
		}
	}
	else{
		alert('not jpeg');	
	}
}
function iload(e){

	sout=setInterval(start,30);
	var run=0;
	shw();
	$('#drop').css({'background':'rgba(255,255,255,0.9)','transition':'1s'});
	function start(){
		if(run==0 || run==25 || run==50|| run==75){
			$('#indrop').css({'background':'rgba('+Math.floor(Math.random()*255)+','+Math.floor(Math.random()*255)+','+Math.floor(Math.random()*255)+',0.9)','transition':'.5s'});
		}
		else if(run==100){
			clearInterval(sout);
			setTimeout(ihi,3000);
			$('#imageFace').attr('src',e.currentTarget.responseText)
		}
			$('#indrop').css({'width':run+'%','text-align':'center','color':'#FFF'});
			$('#indrop').html(run+'%')
			run++;	
		
	
	}
}
function ihi(){
	$('#indrop').css({'width':'0px'});
	$('#odrop').css({'display':'none'});
}
function shw(){
	$('#odrop').css({'display':'block'});
}
function dragover(e){
	e.preventDefault();
	e.stopPropagation();
}
function dragleave(e){
	e.preventDefault();
	e.stopPropagation();
	$('#drop').css({'background':'rgba(255,255,255,0.9)','transition':'1s'});
}
function dragenter(e){
	e.preventDefault();
	e.stopPropagation();
	$('#drop').css({'background':'rgba('+Math.floor(Math.random()*255)+','+Math.floor(Math.random()*255)+','+Math.floor(Math.random()*255)+',0.9)','transition':'1s'});
}
//canvas
function canvas(){
	var can=document.getElementById('canvas');
	var cgt=can.getContext('2d');
	cgt.clearRect(0,0,600,600);
	var img=[];
	for($i=0;$i<$('#picture').children('.ui-dialog').length;$i++){
		var h=document.getElementById('picture').children[$i].offsetHeight;
		var w=document.getElementById('picture').children[$i].offsetWidth;
		var t=document.getElementById('picture').children[$i].offsetTop;
		var l=document.getElementById('picture').children[$i].offsetLeft;
		var lr=0;
		console.log(h,w,l,t);
		if($('#picture').children('.ui-dialog').eq($i).attr('lr')){
			lr=$('#picture').children('.ui-dialog').eq($i).attr('lr')	
		}
		img[$i]=new Image();
		img[$i].src=$('#picture').children('.ui-dialog').children('img').eq($i).attr('src');
		cgt.save();
		cgt.rotate(lr*Math.PI/180);
		cgt.translate(l+w*0.5,t+h*0.5);
		cgt.drawImage(img[$i],-w*0.5,-h*0.5,w,h);
		cgt.restore();
	}
	down();
	
}
function down(){
	var can=document.getElementById('canvas');
	var src=can.toDataURL('image/png');
	a=$('<a>').attr('href',src).attr('download','download.png');
	a.appendTo('body');
	a[0].click();
	a.remove();
	var url=src;
	url=src.split(',');
	url=url[1];
	$.post('base.php',{base:url});	
}
$(document).mousemove(function(e) {
    py=e.pageY-$('#picture').offset().top-$(the).height()*0.8;
	px=e.pageX-$('#picture').offset().left-$(the).width()*0.8;
});
//move
function emove(){
	$('.accessories').mouseenter(function(e) {
        the=this;
    });
	$('.accessories').mouseleave(function(e) {
        the=null;
    });
		
	$('.accessories').draggable({
		revert:'invalid',cursor:'move',cancel:'.ui-dialog-titlebar'
		})
	$('#picture').droppable({
		drop:function(event,ui){
			if($(the).attr('in')!='now'){
				for($i=1;$i<$('#picture').children('.ui-dialog').length;$i++){
					var alt=$('#picture').children('.ui-dialog').children('img').eq($i).attr('alt');
					var blt=$('#picture').children('.ui-dialog').children('img').eq($i);
					var clt=$('#picture').children('div').eq($i);
					console.log(alt,$(the).attr('alt'))
					if($(the).attr('alt')==alt){
						$('.'+alt).append('<img src='+blt.attr('src')+' class="accessories" style="position: relative;" alt='+alt+'>')
						$(clt).html('');
						$(blt).remove();
					}
				}
				$('.ui-dialog').css('pointer-events','none');
				$(the).dialog({
					'minWidth':20,'minHeight':20
					})
				$(the).parent('.ui-dialog').attr({'class':'ui-dialog ui-widget ui-corner-all ui-front ui-draggable ui-resizable live'});
				$(the).parent('.ui-dialog').css({'top':py,'left':px,'width':110*1.6+'px','height':'auto','z-index':'inherit'});
				$(the).attr({'class':'ui-dialog-titlebar ui-corner-all ui-helper-clearfix ui-draggable-handle love','style':'top:0px;left:0px;position: relative;width:100%;height:100%;z-index:inherit','in':'now'});
				$('.ui-widget-header').remove();	
				$(the).parent('.ui-dialog').appendTo($('#picture'));
				$('.ui-dialog').css('pointer-events','auto')
				emove();
			}
		}
	})	
}
function img(){ 
	$('#imageFace').dialog({
		'minWidth':20,'minHeight':20
		})
	$('.ui-dialog').attr({'class':'ui-dialog ui-widget ui-corner-all ui-front ui-draggable ui-resizable live'});
	$('.ui-dialog').css({'top':'0px','left':'0px','width':'456px','height':'auto','z-index':'inherit'})
	$('#imageFace').attr({'class':'ui-dialog-titlebar ui-corner-all ui-helper-clearfix ui-draggable-handle love','style':''});
	$('.ui-widget-header').remove();	
	$('#imageFace').parent('.ui-dialog').appendTo($('#picture'));
}
function shit(sh,alt){
	$('.submenu').hide()
	$('.menuitem').css('opacity','0.5');
	$(sh).css('opacity','1');
	$('.'+alt).show();
}
function left(){
	var lr=0;
	if($(thi).parent('.ui-dialog').attr('lr')){
		lr=$(thi).parent('.ui-dialog').attr('lr');
	}
	lr=lr*1-10;
	$(thi).parent('.ui-dialog').attr('lr',lr);
	$(thi).parent('.ui-dialog').css('transform','rotate('+lr+'deg)');
}
function right(){
	var lr=0;
	if($(thi).parent('.ui-dialog').attr('lr')){
		lr=$(thi).parent('.ui-dialog').attr('lr');
	}
	lr=lr*1+10;
	$(thi).parent('.ui-dialog').attr('lr',lr);
	$(thi).parent('.ui-dialog').css('transform','rotate('+lr+'deg)');
}
function zoomx(){
	var h=$(thi).parent('.ui-dialog').height();
	var w=$(thi).parent('.ui-dialog').width();
	var t=thi.parentNode.offsetTop;
	var l=thi.parentNode.offsetLeft;
	$(thi).parent('.ui-dialog').css({'top':t-h*0.05,'left':l-w*0.05,'height':h*1.1,'width':w*1.1});
}
function zooms(){
	var h=$(thi).parent('.ui-dialog').height();
	var w=$(thi).parent('.ui-dialog').width();
	var t=thi.parentNode.offsetTop;
	var l=thi.parentNode.offsetLeft;
	$(thi).parent('.ui-dialog').css({'top':t+h*0.05,'left':l+w*0.05,'height':h*0.9,'width':w*0.9});
}
$(document).keydown(function(e) {
    //console.log(e);
	var t=thi.parentNode.offsetTop;
	
	if(e.keyCode==38){
		l=$(thi).parent('div').position().top;
		l=l*1-1;
		$(thi).parent('.ui-dialog').css('top',l);
	}
	else if(e.keyCode==107){
		soomx();
	}
	else if(e.keyCode==109){
		sooms();
	}
	else if(e.keyCode==189){
		sooms();
	}
	else if(e.keyCode==187 && e.shiftKey){
		soomx();
	}
	else if(e.keyCode==37){
		l=$(thi).parent('div').position().left;
		l=l*1-1;
		$(thi).parent('.ui-dialog').css('left',l);
	}
	else if(e.keyCode==39){
		l=$(thi).parent('div').position().left;
		l=l*1+1;
		$(thi).parent('.ui-dialog').css('left',l);
	}
	else if(e.keyCode==40){
		l=$(thi).parent('div').position().top;
		l=l*1+1;
		$(thi).parent('.ui-dialog').css('top',l);
	}
	else if(e.keyCode==82){
		right();
	}
	else if(e.keyCode==76){
		left();
	}
	
});