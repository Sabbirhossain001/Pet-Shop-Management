
window.addEventListener("load", function(){
    
    $('form').on("submit", function(event){
        event.preventDefault();

        const email = this['email'];
        const password = this["password"];
        
        const error = document.getElementById("error");


        //let data = JSON.stringify({'email' : email.value, 'username' : username.value, 'password' : pass1.value});
        let data = "email=" + email.value + "&password=" + password.value;
        let url = "handler/loginHandler.php";

        $.ajax(
            {
                url: url,
                type: 'post',
                // contentType : 'application/json',
                dataType: 'json',
                data: data,
            }).done(function(data){
                
                if(data.success){
                    queryString = window.location.search;
                    url = new URLSearchParams(queryString);
                    if(url.has('next'))
                        window.location.assign(url.get('next'));
                    else
                        window.location.assign('index.php');
                }
                else{
                    error.innerHTML = data.errorMsg;
                    error.style.display = "block";
                    email.style.border = password.style.border = "2px solid red";
                }
                
            }).fail(function(errorThrown){
                console.log(errorThrown.responseText);
        });

    });
});
