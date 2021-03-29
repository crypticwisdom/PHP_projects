
function run(val, file="", land="", error=""){
    
    if(val == 0){
        return document.getElementById(land).innerHTML=error;
    }else{
        if(window.XMLHttpRequest){
            jet = new XMLHttpRequest();
        }else{
            jet = new ActiveXObject('Microsoft.XMLHTTP');
        }
        jet.onreadystatechange = function(){
            if(jet.readyState == 4 && jet.status == 200){
                document.getElementById(land).innerHTML = jet.responseText;
            }
        };
        jet.open('GET', file+val, true);
        jet.send();
    }
  
}

