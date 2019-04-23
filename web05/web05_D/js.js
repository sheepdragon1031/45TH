// JavaScript Document
function url(src,mess){
	if(mess){
		alert(mess);
	}
	document.location.href=src; 
}
function reurl(miss){
	if(miss){
		alert(miss);
		}
	window.history.back();	
}