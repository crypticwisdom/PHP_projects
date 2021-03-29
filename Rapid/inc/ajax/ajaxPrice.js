   function price(val){
        if( val == "" ){
           document.getElementById('price').innerHTML = "<div class='text-danger'>Please choose a Business to tag a work Price</div>";
           return;
        }else{
if(window.XMLHttpRequest){
var price = new XMLHttpRequest();
}else{
var price = new ActiveXObject("Microsoft.XMLHTTP");
}

price.onreadystatechange = function (){
if( price.readyState == 4 && price.status == 200){
document.getElementById('price').innerHTML = price.responseText;

}
};
price.open('GET', 'inc/ajax/ajaxPrice.php?q='+val, true);
price.send();
return;
}

}


