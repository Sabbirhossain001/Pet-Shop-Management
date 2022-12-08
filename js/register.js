
window.addEventListener("load", function(){
    
    $('form').on("submit", function(event){
        event.preventDefault();

        const email = this['email'];
        const username = this['username'];
        const pass1 = this["password"];
        const pass2= this["password2"];
        const error = document.getElementsByTagName("span");

        if (pass1.value != pass2.value){
        
            pass1.style.border = "2px solid red";
            pass2.style.border = "2px solid red";
            error['password'].innerHTML = "Passwords do not match";
            error['password'].style.display = "block";
        }
        else {
            error['password'].style.display = "none";
            pass1.style.border = pass2.style.border = "inherit";

            //let data = JSON.stringify({'email' : email.value, 'username' : username.value, 'password' : pass1.value});
            let data = "email=" + email.value + "&username=" + username.value + "&password=" + pass1.value;
            let url = "handler/registerHandler.php";

            $.ajax(
                {
                    url: url,
                    type: 'post',
                    // contentType : 'application/json',
                    dataType: 'json',
                    data: data,
                }).done(function(data){
                    
                    if(data.success){
                        popUp("Your account has been succesfully created!", function(){
                            history.back();
                        });
                    }
                    else{
                        email.style.border = username.style.border = "inherit";
                        error['email'].style.display = error['username'].style.display = "none"

                        if (data.errorMsg.hasOwnProperty('email')){
                            error['email'].innerHTML = data.errorMsg.email;
                            error['email'].style.display = "block";
                            email.style.border = "2px solid red";
                        }
                        else if (data.errorMsg.hasOwnProperty('username')){
                            error['username'].innerHTML = data.errorMsg.username;
                            error['username'].style.display = "block";
                            username.style.border = "2px solid red";
                        }
                    }
                        
                }).fail(function(errorThrown){
                    console.log(errorThrown.responseText);
            });
        }

    });
});
