window.addEventListener("load", function(){
    
    $(".edit").each(function(){
        $(this).on("click", function(event){

            const edit = event.currentTarget;
            const order = edit.parentNode.parentNode.firstElementChild;
            const status = edit.parentNode.previousElementSibling;
            const status_input = status.firstElementChild;
            const status_text = status.lastElementChild;
            const tick_icon = this.nextElementSibling;
            const cross_icon = tick_icon.nextElementSibling;

            function open_editing_tool (){
                edit.style.display = status_text.style.display = "none";
                tick_icon.style.display = cross_icon.style.display = status_input.style.display = "initial";
            }

            function close_editing_tool (){
                tick_icon.style.display = cross_icon.style.display = status_input.style.display = "none";
                edit.style.display = status_text.style.display = "initial";
            }
            
            for(let i=0; i<status_input.options.length; i++)
                if(status_input.options[i].value == status_text.innerHTML)
                    status_input.selectedIndex = i;

            open_editing_tool();

            tick_icon.addEventListener("click", function(){
                let data = "order=" + order.innerHTML + "&status=" + status_input.options[status_input.selectedIndex].value;
                let url = "handler/editOrderHistory.php";

                $.ajax(
                    {
                        url: url,
                        type: 'post',
                        dataType: 'json',
                        data: data,
                    }).done(function(data){
                        
                        if(data.success){
                            status_text.innerHTML = status_input.options[status_input.selectedIndex].value;
                            close_editing_tool();
                        }
                        else
                            alert("Your request to edit order #" + order.innerHTML + " failed");
                       
                    }).fail(function(errorThrown){
                        console.log(errorThrown.responseText);
                });

            });
            
            cross_icon.addEventListener("click", close_editing_tool);
        });
    });

    
});



/*fetch("include/orderHistoryHandler.php", {
                    method: 'post',
                    body: data,
                    headers : {
                        'Accept' : 'application/x-www-form-urlencoded',
                        'Content-type' : 'application/x-www-form-urlencoded'
                    }
                }).then(function(response){
                    console.log(response.status);
                }).catch(function(error){
                    console.log(error);
                })
*/

/*const xhttp = new XMLHttpRequest();
xhttp.open("POST", url);
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.send(data);
xhttp.onload = function() {
    if (this.responseText){
        status_text.innerHTML = status_input.options[status_input.selectedIndex].value;
        close_editing_tool();
    }
    else {
        alert("Your request to edit order #" + order.innerHTML + " failed");
    }     
}*/