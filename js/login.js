

addEventListener('submit', (e) => {

    var username = document.getElementsByName("username");
    var psw = document.getElementsByName("psw");


    if (psw[0].value == "" || psw[0].value == null) {
        e.preventDefault();
        document.getElementById("psw-error").innerText = "Password can't be empty";
        document.getElementById("psw-error").style.color = "red";
        document.getElementById("psw-error").style.fontWeight = "bold";
        document.getElementById("psw-error").style.marginTop = "-10px";
        document.getElementById("psw-error").style.marginBottom = "8px";
        psw[0].focus();
    } else {
        document.getElementById("psw-error").innerText = "";
    }

    if (username[0].value == "" || username[0].value == null) {
        e.preventDefault();
        document.getElementById("username-error").innerText = "Username can't be empty";
        document.getElementById("username-error").style.color = "red";
        document.getElementById("username-error").style.fontWeight = "bold";
        document.getElementById("username-error").style.marginTop = "-10px";;
        document.getElementById("username-error").style.marginBottom = "8px";
        username[0].focus();
    } else {
        document.getElementById("username-error").innerText = "";
    }

});