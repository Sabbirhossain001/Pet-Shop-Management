function header_function(title) {

    document.getElementsByTagName("title")[0].innerHTML = title;

    //addB();
    //removeMain();

    document.getElementById("ps-logo").addEventListener("click", function(){
        window.location.href = "index.php";
    });

    window.addEventListener("scroll", function () {
        var header = document.getElementsByTagName("header")[0];
        var main = document.getElementById("main");
        var sticky = header.offsetTop;

        if(window.pageYOffset > sticky){
            header.classList.add("sticky");
            main.style.position = "static";
        }    
        else{
            header.classList.remove("sticky");
            main.style.position = "relative";
        }
    });



    document.getElementsByTagName("form")[0].addEventListener("submit", function (event){
        event.preventDefault();
        searchBar = document.getElementsByTagName("input")[0];
        keyword = searchBar.value;
        console.log(keyword);
        alert("You have searched for: " + keyword);
        window.location.replace("index.php?search=" + keyword);
    });

}

function addB(){
    var all = document.getElementsByTagName("*");
    for(var i=0; i<all.length; i++){
        if (all[i].tagName != 'BODY')
            all[i].classList.add("b");
    }
}

function removeMain(){
    var main = document.getElementById("main");
    var p = main.getElementsByTagName("p");    
    for(var i=0; i<p.length; i++)
        p[i].style.display="none";
}

function popUp(message, callback=null){

    const pop_up_text = document.getElementById("pop-up-content");
    pop_up_text.firstElementChild.innerHTML = message;
    pop_up_text.style.width = message.length*0.6 + "%";

    
    pop_up_text.lastElementChild.addEventListener("click", function(){
        if(callback)
            callback();
        else
            $("#pop-up").hide();
    });

    $("#pop-up").show();

}


// const delay = (delayInms) => {
//     return new Promise(resolve => setTimeout(resolve, delayInms));
//   }
//   const sample = async () => {
//     let delayres = await delay(5000);
// }
// sample();