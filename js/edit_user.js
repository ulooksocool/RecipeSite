

function edit_user(user, type) {
    window.location = "edit_user.php?username=" + user + "&type=" + type;
}

function delete_user() {
    var del = document.getElementById('delete');
    if (del.checked) {
        let choise = confirm("Are you sure you want to delete this account. This action can not be reversed!");
        if (choise) {
            alert("Marked for deletion");
            del.checked = true;
        } else {
            alert("Action canceled");
            del.checked = false;
        }
    } 
}

addEventListener('submit',(e)=>{
    var del = document.getElementById('delete');
    var type = document.getElementsByName('type');
   

    if (!type[0].checked && !type[1].checked && !del.checked) {
        e.preventDefault();
        document.getElementById("type-error").innerText = "Επιλέξτε Απάντηση";
        document.getElementById("type-error").style.color = "red";
        document.getElementById("type-error").style.fontWeight = "bold";
        document.getElementById("type-error").style.marginTop = "-10px";
        document.getElementById("type-error").style.marginBottom = "-10px";

    } else {
        document.getElementById("type-error").innerText = "";
    }

});
