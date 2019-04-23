// JavaScript Document
function url(x,y){
	if(y){
		alert(y)
	}
	document.location.href=x;
}
function err(x){
	alert(x);
	window.history.back();
}