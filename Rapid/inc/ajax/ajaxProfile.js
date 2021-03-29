function fetch(val){
if( val == 0 || val == "" ){
document.getElementById('return').innerHTML = "<h2 class='text-center'>click to select from a select field</h2>";
return;
}else{
if(window.XMLHttpRequest){
var jet = new XMLHttpRequest();
}else{
var jet = new ActiveXObject("Microsoft.XMLHTTP");
}

jet.onreadystatechange = function (){
if( jet.readyState == 4 && jet.status == 200){
document.getElementById('return').innerHTML = jet.responseText;

}
};
jet.open('GET', 'inc/ajax/ajaxProfile.php?q='+val, true);
jet.send();


}


}
