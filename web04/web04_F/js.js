// JavaScript Document
/*
--------UI介面
*/
var the='',thi='',px=0,py=0;
function mu(the,cl){
	$('.submenu').hide();
	$('.menuitem').css('opacity','0.5');
	$(the).css('opacity','1');
	$('.'+cl).show();
}
function ufo(){
	$('.accessories').mousemove(function(e) {
		 var x=e.pageX-$('#picture').offset().left;
		 var y=e.pageY-$('#picture').offset().top;
		   if( x>0 && x < 460 && y>0 && y<600){
				if($(the).attr('in')=='now'){
					$(the).css('opacity','1');	
				}
				else{
					$(the).css('opacity','0.5');	
				}
			}
			else {
				$(the).css('opacity','1');
			} 
	   
	   
    });
}
$(document).keydown(function(e) {
	$('body').css('overflow','hidden');
  if(e.keyCode=='38'){
	  var l=thi.parentNode.offsetTop;
	  l--;
	  $(thi).parent('.ui-dialog').css('top',l);
  }
  else if(e.keyCode=='40'){
	 var l=thi.parentNode.offsetTop;
	 l++  
	 $(thi).parent('.ui-dialog').css('top',l);
  }
  else if(e.keyCode=='37'){
	 var l=thi.parentNode.offsetLeft;
	 l--  
	 $(thi).parent('.ui-dialog').css('left',l);
  }
  else if(e.keyCode=='39'){
   var l=thi.parentNode.offsetLeft;
	 l++  
	 $(thi).parent('.ui-dialog').css('left',l);
  }
  else if(e.keyCode=='107' || e.keyCode=='187' && e.shiftKey){
	  zoomx();
  }
  else if(e.keyCode=='109' || e.keyCode=='189' ){
	  zooms();
  }
  else if(e.keyCode=='82'){
  	right();
  }
  else if(e.keyCode=='76'){
  	left();
  }
  else{
	  
  }
});
$(document).keyup(function(e) {
      $('body').css('overflow','inherit');
});
function bar(){
	$(document).mousedown(function(e) {
        if(e.target.id=='picture'){
			$('.ui-dialog').css({'border':'#999 0rem dashed'});
			thi='';
		}
    });
	$('.ui-dialog-titlebar').mousedown(function(e) {
		$('.ui-dialog').css({'border':'#999 0rem dashed'});
		thi=this;
		$(thi).parent('div').css({'border':'#999 0.15rem dashed'});
    });	
}
function img(){
	$('#imageFace').dialog({
		'minWidth':20,'minHeight':20
		});
	$('#imageFace').attr({'class':'ui-dialog-titlebar ui-corner-all ui-helper-clearfix ui-draggable-handle'});
	$('#imageFace').css({'width':'460px'});
	$('.ui-widget-header ').remove();
	$('#imageFace').parent('.ui-dialog').attr({'class':'ui-dialog ui-widget ui-corner-all ui-front ui-draggable ui-resizable','style':'position: absolute; height: auto; width: 460px; top: 13px; left:0px ; z-index: inherit;'});
	//$('#imageFace').parent('.ui-dialog').css({'top':'0px','left':'0px','width':'460px !important'});
	$('#imageFace').parent('.ui-dialog').appendTo('#picture')
}
function zoomx(){
	var t=thi.parentNode.offsetTop;
	var l=thi.parentNode.offsetLeft;
	var h=$(thi).parent('.ui-dialog').height();
	var w=$(thi).parent('.ui-dialog').width();
	$(thi).parent('.ui-dialog').css({'height':h*1.1,'width':w*1.1,'top':t-h*0.05,'left':l-w*0.05});	
}
function zooms(){
	var t=thi.parentNode.offsetTop;
	var l=thi.parentNode.offsetLeft;
	var h=$(thi).parent('.ui-dialog').height();
	var w=$(thi).parent('.ui-dialog').width();
	$(thi).parent('.ui-dialog').css({'height':h*0.9,'width':w*0.9,'top':t+h*0.05,'left':l+w*0.05});	
}
function left(){
	var lr=0;
	if($(thi).parent('.ui-dialog').attr('lr')){
		lr=$(thi).parent('.ui-dialog').attr('lr');
	}
	lr-=10;
	$(thi).parent('.ui-dialog').css('transform','rotate('+lr+'deg)');
	$(thi).parent('.ui-dialog').attr('lr',lr);
}
function right(){
	var lr=0;
	if($(thi).parent('.ui-dialog').attr('lr')){
		lr=$(thi).parent('.ui-dialog').attr('lr');
	}
	lr=lr*1+10;
	$(thi).parent('.ui-dialog').css('transform','rotate('+lr+'deg)');
	$(thi).parent('.ui-dialog').attr('lr',lr);
}
function cleard(){
	two();
	two();
}
function two(){
	for($i=1;$i<$('#picture').children('div').children('img').length;$i++){
	  var alt=$('#picture').children('div').children('img').eq($i).attr('alt');
	  var blt=$('#picture').children('div').children('img').eq($i);
		  $('.'+alt).append('<img src="'+$('#picture').children('div').children('img').eq($i).attr('src')+'" alt="'+alt+'" class="accessories" style="position: relative;">');
		  $(blt).remove();
		   emove();						
	 }	
}
function deleted(){
	if($(thi).attr('id')=='imageFace'){
		$(thi).attr('src','');
	}
	else{
		var alt=$(thi).attr('alt');
	 	var blt=$(thi).attr('src');
		  $('.'+alt).append('<img src="'+blt+'" alt="'+alt+'" class="accessories" style="position: relative;">');
		  $(thi).remove();
		  emove();
	}
}
function emove(){
	$('.accessories').draggable({
		revert:'invalid',cursor:'move',cancel:'.ui-dialog-titlebar'
		})
	$('.accessories').mouseenter(function(e) {
        the=this
    });	
	$('.accessories').mouseleave(function(e) {
        the='';
    });
	
	$('#picture').droppable({
		drop:function (event,ui){
			if($(the).attr('in')!='now'){
				for($i=1;$i<$('#picture').children('div').children('img').length;$i++){
					var alt=$('#picture').children('div').children('img').eq($i).attr('alt');
					var blt=$('#picture').children('div').children('img').eq($i);
					if($(the).attr('alt')==alt){
						$('.'+alt).append('<img src="'+$('#picture').children('div').children('img').eq($i).attr('src')+'" alt="'+alt+'" class="accessories" style="position: relative;">');
						$(blt).remove();
						 emove();						
					}
				}
				$(the).dialog({
					'minWidth':20,'minHeight':20
				});
				$(the).attr({'class':'ui-dialog-titlebar ui-corner-all ui-helper-clearfix ui-draggable-handle'});
				$(the).css({'top':'0px','left':'0px','height':'100%','width':'100%','opacity':'1'});
				$('.ui-widget-header ').remove();
				$(the).parent('.ui-dialog').attr({'class':'ui-dialog ui-widget ui-corner-all ui-front ui-draggable ui-resizable','style': 'width:'+110*1.6+'px ;position: absolute; height: auto; top:'+py+'px; left:'+px+'px ; z-index: inherit;'});
				$(the).parent('.ui-dialog').appendTo('#picture');
				$(the).attr('in','now');
				bar();		
			}
		}
	})
		
}
/*
---------
uplaod上傳
*/

$(document).ready(function(e) {
     emove();
	 img();
	 ufo();
	 $(document).mousemove(function(e) {
        px=e.pageX-$('#picture').offset().left-$(the).width()*0.8;;
		py=e.pageY-$('#picture').offset().top-$(the).height()*0.8;;
		
	});
	var dropzone=document.getElementById('drop');
	dropzone.addEventListener('drop',drop,false);
	dropzone.addEventListener('dragover',dragover,false);
	dropzone.addEventListener('drapleaven',drapleave,false);
	dropzone.addEventListener('dragenter',dragenter,false);
	
});
function drop(e){
	e.stopPropagation();
	e.preventDefault();
	$('#drop').css('background','rgba(255,255,255,1)');
	var file=e.dataTransfer.files;
	var nfd=new FormData();
	nfd.append('file',file[0]);
	console.log(e,file[0])
	if(file[0].size<300*1024){
		if(file[0].type=='image/jpeg'){
			var xhr=new XMLHttpRequest();
			xhr.open('POST','file.php');
			xhr.addEventListener('load',loader,false);
			xhr.send(nfd);
			$('#upload').show();
		}
		else{
			alert('not jpg');	
		}
	}
	else{
		alert('於大於300KB');
	}
}
function loader(e){
	var src=e.currentTarget.responseText;
	srun=setInterval(run,80);
	var num=0;
	function run(){
		num++;
		$('.inup').html(num+'%');
		$('.inup').css({'width':num+'%'});
		if(num==1 || num==25 || num==50 || num==75  ){
			$('.inup').css('background','rgba('+Math.floor(Math.random()*255)+','+Math.floor(Math.random()*255)+','+Math.floor(Math.random()*255)+',1)');
		}
		if(num==100){
			clearInterval(srun);
			$('#imageFace').attr('src',src);
			setTimeout(jo,3000);
		}
	}
}
function jo(){
	$('.inup').css({'width':'0%'});
	$('#upload').hide();
}
function dragover(e){
	e.stopPropagation();
	e.preventDefault();
}

function drapleave(e){
	e.stopPropagation();
	e.preventDefault();
	$('#drop').css('background','rgba(255,255,255,1)');
}

function dragenter(e){
	e.stopPropagation();
	e.preventDefault();
	$('#drop').css('background','rgba('+Math.floor(Math.random()*255)+','+Math.floor(Math.random()*255)+','+Math.floor(Math.random()*255)+',1)');
}
/*
--------------
canvas畫圖
*/
function canvas(){
	var can=document.getElementById('canvas');
	var cgt=can.getContext('2d');
	cgt.clearRect(0,0,600,600);
	var img=[];
	for($i=0;$i<$('#picture').children('.ui-dialog').length;$i++){
		var t=document.getElementById('picture').children[$i].offsetTop;
		var l=document.getElementById('picture').children[$i].offsetLeft;
		var h=$('#picture').children('.ui-dialog').eq($i).height();
		var w=$('#picture').children('.ui-dialog').eq($i).width();
		var lr=0;
		img[$i]=new Image();
		img[$i].src=$('#picture').children('.ui-dialog').children('img').eq($i).attr('src');
		if($('#picture').children('.ui-dialog').eq($i).attr('lr')){
			lr=$('#picture').children('.ui-dialog').eq($i).attr('lr');
		}
		console.log(img[$i]);
		cgt.save();
		cgt.translate(l+w*0.5,t+h*0.5);
		cgt.rotate(lr*Math.PI/180);
		cgt.drawImage(img[$i],-w*0.5,-h*0.5,w,h);
		cgt.restore();
	}
	down();
}
function down(){
	var can=document.getElementById('canvas');
	var ctd=can.toDataURL('image/png');
	var a=$('<a>').attr({'href':ctd,'download':'download'});
	a.appendTo('body');
	a[0].click();
	a[0].remove();
	var url=ctd.split(',');
	url=url[1];
	$.post('base.php',{base:url},function (date){console.log(date)});
}
/*
-----------
*/
