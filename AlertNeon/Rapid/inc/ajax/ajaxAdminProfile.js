function getProfile(val){

    if( val == "" || val < 1 ){
        document.getElementById('profile').innerHTML = "please make sure you signed in correctly" ;
        return;
    }else{
        if( window.XMLHttpRequest ){
            var value = new XMLHttpRequest();
        }else{
            var value = new ActiveXObject('Microsoft.XMLHTTP');
        }
            value.onreadystatechange = function(){
                if( value.readyState == 4 && value.status == 200 ){
                    document.getElementById('profile').innerHTML = value.responseText;
                }
            };
            value.open('GET', 'inc/ajax/ajaxAdminProfile.php?val' +val, true);
            value.send();
            return;
    }
}
