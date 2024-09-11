

addEventListener('submit', (e) => {
    var name = document.getElementsByName("name");
    var lname = document.getElementsByName("lname");
    var username = document.getElementsByName("username");
    var psw = document.getElementsByName("psw");
    var psw_repeat = document.getElementsByName("psw_repeat");
    var email = document.getElementsByName("email");
    var gender = document.getElementsByName("gender");
    var bday = document.getElementsByName("bday");
    var photo = document.getElementsByName("photo");

    //in reverse order so -//-.focus(); can go on the first invalid field
    // agapame patentes

    if (photo[0].value == "" || photo[0].value == null) {

        e.preventDefault();
        document.getElementById("photo-error").innerText = "Please enter a profile photo";
        document.getElementById("photo-error").style.color = "red";
        document.getElementById("photo-error").style.fontWeight = "bold";
        document.getElementById("photo-error").style.marginTop = "8px";
        document.getElementById("photo-error").style.marginBottom = "-22px";
        photo[0].focus();
    } else {

        var fileEnding = photo[0].value.split(".").pop();

        if (fileEnding == "jpg" || fileEnding == "jpeg" || fileEnding == "png") {
            document.getElementById("photo-error").innerText = "";
        } else {
            e.preventDefault();
            document.getElementById("photo-error").innerText = "Photo must be of jpg, jpeg or png format";
            document.getElementById("photo-error").style.color = "red";
            document.getElementById("photo-error").style.fontWeight = "bold";
            document.getElementById("photo-error").style.marginTop = "8px";
            document.getElementById("photo-error").style.marginBottom = "-22px";
            photo[0].focus();
        }
    }

    if (bday[0].value == "" || bday[0].value == null) {
        e.preventDefault();
        document.getElementById("bday-error").innerText = "Please enter Date";
        document.getElementById("bday-error").style.color = "red";
        document.getElementById("bday-error").style.fontWeight = "bold";
        document.getElementById("bday-error").style.marginTop = "8px";
        document.getElementById("bday-error").style.marginBottom = "-22px";
        bday[0].focus();
    } else {
        document.getElementById("bday-error").innerText = "";
    }

    if (!gender[0].checked && !gender[1].checked && !gender[2].checked) {
        e.preventDefault();
        document.getElementById("gender-error").innerText = "Please select your gender";
        document.getElementById("gender-error").style.color = "red";
        document.getElementById("gender-error").style.fontWeight = "bold";
        document.getElementById("gender-error").style.marginTop = "8px";
        document.getElementById("gender-error").style.marginBottom = "-22px";
        gender[0].focus();
    } else {
        document.getElementById("gender-error").innerText = "";
    }

    //valid email address regex
    var reg = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

    if (email[0].value == "" || email[0].value == null || !reg.test(email[0].value)) {
        e.preventDefault();
        document.getElementById("email-error").innerText = "Please enter a valid email address";
        document.getElementById("email-error").style.color = "red";
        document.getElementById("email-error").style.fontWeight = "bold";
        document.getElementById("email-error").style.marginTop = "-10px";
        document.getElementById("email-error").style.marginBottom = "8px";
        email[0].focus();
    } else {
        document.getElementById("email-error").innerText = "";
    }

    if (psw_repeat[0].value == "" || psw_repeat[0].value == null || psw[0].value != psw_repeat[0].value) {
        e.preventDefault();
        document.getElementById("psw_repeat-error").innerText = "Passwords do not match";
        document.getElementById("psw_repeat-error").style.color = "red";
        document.getElementById("psw_repeat-error").style.fontWeight = "bold";
        document.getElementById("psw_repeat-error").style.marginTop = "-10px";
        document.getElementById("psw_repeat-error").style.marginBottom = "8px";
        psw_repeat[0].focus();
    } else {
        document.getElementById("psw_repeat-error").innerText = "";
    }

    //valid password regex must contain[1 uppercase, 1 lowercase, 1 number, 1 symbol] and total char [8,64]
    reg = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,64}$/;

    if (psw[0].value == "" || psw[0].value == null || !reg.test(psw[0].value)) {
        e.preventDefault();
        document.getElementById("psw-error").innerText = "Password must be 8-64 characters long and contain:\n1 Uppercase character\n1 Lowercase character\n1 Number\n1 Symbol";
        document.getElementById("psw-error").style.color = "red";
        document.getElementById("psw-error").style.fontWeight = "bold";
        document.getElementById("psw-error").style.marginTop = "-10px";
        document.getElementById("psw-error").style.marginBottom = "8px";
        psw[0].focus();
    } else {
        document.getElementById("psw-error").innerText = "";
    }

    if (username[0].value == "" || username[0].value == null || username[0].value.length < 3 || username[0].value.length > 50) {
        e.preventDefault();
        document.getElementById("username-error").innerText = "Username must be 3-50 characters long";
        document.getElementById("username-error").style.color = "red";
        document.getElementById("username-error").style.fontWeight = "bold";
        document.getElementById("username-error").style.marginTop = "-10px";;
        document.getElementById("username-error").style.marginBottom = "8px";
        username[0].focus();
    } else {
        document.getElementById("username-error").innerText = "";
    }

    if (lname[0].value == "" || lname[0].value == null || lname[0].value.length < 3 || lname[0].value.length > 100) {
        e.preventDefault();
        document.getElementById("lname-error").innerText = "Lastname must be 3-100 characters long";
        document.getElementById("lname-error").style.color = "red";
        document.getElementById("lname-error").style.fontWeight = "bold";
        document.getElementById("lname-error").style.marginTop = "-10px";
        document.getElementById("lname-error").style.marginBottom = "8px";
        lname[0].focus();
    } else {
        document.getElementById("lname-error").innerText = "";
    }

    if (name[0].value == "" || name[0].value == null || name[0].value.length < 3 || name[0].value.length > 50) {
        e.preventDefault();
        document.getElementById("name-error").innerText = "Name must be 3-50 characters long";
        document.getElementById("name-error").style.color = "red";
        document.getElementById("name-error").style.fontWeight = "bold";
        document.getElementById("name-error").style.marginTop = "-10px";
        document.getElementById("name-error").style.marginBottom = "8px";
        name[0].focus();
    } else {
        document.getElementById("name-error").innerText = "";
    }
});