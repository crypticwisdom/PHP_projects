function getEmail(val){
if( val.length < 4 ){
document.getElementById('get').innerHTML = "click to select from a select field";
return;
}else{
if(window.XMLHttpRequest){
var jet = new XMLHttpRequest();
}else{
var jet = new ActiveXObject("Microsoft.XMLHTTP");
}

jet.onreadystatechange = function (){
if( jet.readyState == 4 && jet.status == 200){
document.getElementById('get').innerHTML = jet.responseText;
}

};
jet.open('GET', 'inc/ajax/ajaxGetAdminEmail.php?q='+val, true);
jet.send();


}


}
