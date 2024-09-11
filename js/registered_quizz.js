var q1;
var q2;
var q3a;
var q3b;
var q3c;
var q4;
var q5;
var q5a;
var q5b;
var q5c;
var url;
var urlvars;
var level;
var form;
var action;
var num;

addEventListener('DOMContentLoaded', () => {

    //get url after comming from menu to get the level
    url = window.location.search;
    urlvars = new URLSearchParams(url);
    level = urlvars.get('level');

    //take the number variable from the script request-quizz.php by putting it in the html and retrieving it from there
    //contains 1 if additional question is multiple1 or 0 if additional question is multipl2
    form = document.getElementsByName("form1");
    action = form[0].action;
    urlvars = new URLSearchParams(action);
    num = urlvars.get('num');

    q1 = document.getElementsByName("q1");
    q2 = document.getElementsByName("q2");
    q3a = document.getElementsByName("q3a");
    q3b = document.getElementsByName("q3b");
    q3c = document.getElementsByName("q3c");
    q4 = document.getElementsByName("q4");



    if (level == "easy" || level == "hard") {
        q5 = document.getElementsByName("q5");
    } else if (level == "normal") {
        if (num == 1) {
            q5 = document.getElementsByName("q5");
        } else {
            q5a = document.getElementsByName("q5a");
            q5b = document.getElementsByName("q5b");
            q5c = document.getElementsByName("q5c");
        }
    }

});

addEventListener('click', () => {

    if (!q1[0].checked && !q1[1].checked) {
        document.getElementById("sl1-error").innerText = "Επιλέξτε Απάντηση";
        document.getElementById("sl1-error").style.color = "red";
        document.getElementById("sl1-error").style.fontWeight = "bold";
        document.getElementById("sl1-error").style.marginTop = "-15px";
        document.getElementById("sl1-error").style.marginBottom = "10px";

    } else {
        document.getElementById("sl1-error").innerText = "";
    }

    if (!q2[0].checked && !q2[1].checked && !q2[2].checked) {
        document.getElementById("mult1-error").innerText = "Επιλέξτε Απάντηση";
        document.getElementById("mult1-error").style.color = "red";
        document.getElementById("mult1-error").style.fontWeight = "bold";
        document.getElementById("mult1-error").style.marginTop = "3px";
        document.getElementById("mult1-error").style.marginBottom = "-25px";

    } else {
        document.getElementById("mult1-error").innerText = "";
    }

    if (!q3a[0].checked && !q3b[0].checked && !q3c[0].checked) {
        document.getElementById("mult2-error").innerText = "Επιλέξτε Απάντηση";
        document.getElementById("mult2-error").style.color = "red";
        document.getElementById("mult2-error").style.fontWeight = "bold";
        document.getElementById("mult2-error").style.marginTop = "3px";
        document.getElementById("mult2-error").style.marginBottom = "-25px";

    } else {
        document.getElementById("mult2-error").innerText = "";
    }

    var reg = /^[a-zA-Z0-9α-ωΑ-ΩπρστυχςίϊΐόάέύϋΰήώΊΪΌΆΈΎΫΉΏ@$!%*?.,&;#\-\S]{1,100}$/; // \S means spaces aren't accepted
    if (!reg.test(q4[0].value) || q4[0].value == "" || q4[0].value == null) {
        document.getElementById("oneword-error").innerText = "Συμπληρώστε την Απάντηση";
        document.getElementById("oneword-error").style.color = "red";
        document.getElementById("oneword-error").style.fontWeight = "bold";
        document.getElementById("oneword-error").style.marginTop = "-15px";
        document.getElementById("oneword-error").style.marginBottom = "15px";
    } else {
        document.getElementById("oneword-error").innerText = "";
    }
    q4[0].addEventListener('keypress', () => {
        document.getElementById("oneword-error").innerText = "";
    });

    if (level == "easy") {
        if (!q5[0].checked && !q5[1].checked) {
            document.getElementById("sl2-error").innerText = "Επιλέξτε Απάντηση";
            document.getElementById("sl2-error").style.color = "red";
            document.getElementById("sl2-error").style.fontWeight = "bold";
            document.getElementById("sl2-error").style.marginTop = "-15px";
            document.getElementById("sl2-error").style.marginBottom = "15px";

        } else {
            document.getElementById("sl2-error").innerText = "";
        }
    } else if (level == "normal") {
        if (num == 1) {

            if (!q5[0].checked && !q5[1].checked && !q5[2].checked) {
                document.getElementById("mult1-temp-error").innerText = "Επιλέξτε Απάντηση";
                document.getElementById("mult1-temp-error").style.color = "red";
                document.getElementById("mult1-temp-error").style.fontWeight = "bold";
                document.getElementById("mult1-temp-error").style.marginTop = "3px";
                document.getElementById("mult1-temp-error").style.marginBottom = "-25px";

            } else {
                document.getElementById("mult1-temp-error").innerText = "";
            }

        } else {

            if (!q5a[0].checked && !q5b[0].checked && !q5c[0].checked) {
                document.getElementById("mult2-temp-error").innerText = "Επιλέξτε Απάντηση";
                document.getElementById("mult2-temp-error").style.color = "red";
                document.getElementById("mult2-temp-error").style.fontWeight = "bold";
                document.getElementById("mult2-temp-error").style.marginTop = "3px";
                document.getElementById("mult2-temp-error").style.marginBottom = "-25px";

            } else {
                document.getElementById("mult2-temp-error").innerText = "";
            }

        }

    } else if (level == "hard") {

        var reg = /^[a-zA-Z0-9α-ωΑ-ΩπρστυχςίϊΐόάέύϋΰήώΊΪΌΆΈΎΫΉΏ@$!%*?.,&;#\-\S]{1,100}$/; // \S means spaces aren't accepted
        if (!reg.test(q5[0].value) || q5[0].value == "" || q5[0].value == null) {
            document.getElementById("oneword2-error").innerText = "Συμπληρώστε την Απάντηση";
            document.getElementById("oneword2-error").style.color = "red";
            document.getElementById("oneword2-error").style.fontWeight = "bold";
            document.getElementById("oneword2-error").style.marginTop = "-15px";
            document.getElementById("oneword2-error").style.marginBottom = "15px";
        } else {
            document.getElementById("oneword2-error").innerText = "";
        }
        q5[0].addEventListener('keypress', () => {
            document.getElementById("oneword2-error").innerText = "";
        });

    }


});

addEventListener('submit', (e) => {
   
    if (!q1[0].checked && !q1[1].checked) {
        e.preventDefault();
        document.getElementById("sl1-error").innerText = "Επιλέξτε Απάντηση";
        document.getElementById("sl1-error").style.color = "red";
        document.getElementById("sl1-error").style.fontWeight = "bold";
        document.getElementById("sl1-error").style.marginTop = "-15px";
        document.getElementById("sl1-error").style.marginBottom = "10px";

    } else {
       
        document.getElementById("sl1-error").innerText = "";
    }


    if (!q2[0].checked && !q2[1].checked && !q2[2].checked) {
        e.preventDefault();
        document.getElementById("mult1-error").innerText = "Επιλέξτε Απάντηση";
        document.getElementById("mult1-error").style.color = "red";
        document.getElementById("mult1-error").style.fontWeight = "bold";
        document.getElementById("mult1-error").style.marginTop = "3px";
        document.getElementById("mult1-error").style.marginBottom = "-25px";

    } else {
      
        document.getElementById("mult1-error").innerText = "";
    }


    if (!q3a[0].checked && !q3b[0].checked && !q3c[0].checked) {
        e.preventDefault();
        document.getElementById("mult2-error").innerText = "Επιλέξτε Απάντηση";
        document.getElementById("mult2-error").style.color = "red";
        document.getElementById("mult2-error").style.fontWeight = "bold";
        document.getElementById("mult2-error").style.marginTop = "3px";
        document.getElementById("mult2-error").style.marginBottom = "-25px";

    } else {
        
        document.getElementById("mult2-error").innerText = "";
    }


    var reg = /^[a-zA-Z0-9α-ωΑ-ΩπρστυχςίϊΐόάέύϋΰήώΊΪΌΆΈΎΫΉΏ@$!%*?.,&;#\-\S]{1,100}$/; // \S means spaces aren't accepted
    if (!reg.test(q4[0].value) || q4[0].value == "" || q4[0].value == null) {
        e.preventDefault();
        document.getElementById("oneword-error").innerText = "Συμπληρώστε την Απάντηση";
        document.getElementById("oneword-error").style.color = "red";
        document.getElementById("oneword-error").style.fontWeight = "bold";
        document.getElementById("oneword-error").style.marginTop = "-15px";
        document.getElementById("oneword-error").style.marginBottom = "15px";
    } else {
      
        document.getElementById("oneword-error").innerText = "";
    }


    if (level == "easy") {
        if (!q5[0].checked && !q5[1].checked) {
            e.preventDefault();
            document.getElementById("sl2-error").innerText = "Επιλέξτε Απάντηση";
            document.getElementById("sl2-error").style.color = "red";
            document.getElementById("sl2-error").style.fontWeight = "bold";
            document.getElementById("sl2-error").style.marginTop = "-15px";
            document.getElementById("sl2-error").style.marginBottom = "15px";

        } else {
           
            document.getElementById("sl2-error").innerText = "";
        }

    } else if (level == "normal") {
        if (num == 1) {
            if (!q5[0].checked && !q5[1].checked && !q5[2].checked) {
                e.preventDefault();
                document.getElementById("mult1-temp-error").innerText = "Επιλέξτε Απάντηση";
                document.getElementById("mult1-temp-error").style.color = "red";
                document.getElementById("mult1-temp-error").style.fontWeight = "bold";
                document.getElementById("mult1-temp-error").style.marginTop = "3px";
                document.getElementById("mult1-temp-error").style.marginBottom = "-25px";

            } else {
               
                document.getElementById("mult1-temp-error").innerText = "";
            }


        } else {
            if (!q5a[0].checked && !q5b[0].checked && !q5c[0].checked) {
                e.preventDefault();
                document.getElementById("mult2-temp-error").innerText = "Επιλέξτε Απάντηση";
                document.getElementById("mult2-temp-error").style.color = "red";
                document.getElementById("mult2-temp-error").style.fontWeight = "bold";
                document.getElementById("mult2-temp-error").style.marginTop = "3px";
                document.getElementById("mult2-temp-error").style.marginBottom = "-25px";

            } else {
               
                document.getElementById("mult2-temp-error").innerText = "";
            }
        }
    } else if (level == "hard") {

        var reg = /^[a-zA-Z0-9α-ωΑ-ΩπρστυχςίϊΐόάέύϋΰήώΊΪΌΆΈΎΫΉΏ@$!%*?.,&;#\-\S]{1,100}$/; // \S means spaces aren't accepted
        if (!reg.test(q5[0].value) || q5[0].value == "" || q5[0].value == null) {
            e.preventDefault();
            document.getElementById("oneword2-error").innerText = "Συμπληρώστε την Απάντηση";
            document.getElementById("oneword2-error").style.color = "red";
            document.getElementById("oneword2-error").style.fontWeight = "bold";
            document.getElementById("oneword2-error").style.marginTop = "-15px";
            document.getElementById("oneword2-error").style.marginBottom = "15px";
        } else {
           
            document.getElementById("oneword2-error").innerText = "";
        }

    }

});


function mult_a() {
    if (q3a[0].checked && q3b[0].checked && q3c[0].checked) {
        q3b[0].checked = false;
    }
}
function mult_b() {
    if (q3a[0].checked && q3b[0].checked && q3c[0].checked) {
        q3c[0].checked = false;
    }
}
function mult_c() {
    if (q3a[0].checked && q3b[0].checked && q3c[0].checked) {
        q3a[0].checked = false;
    }
}

function mult_a_temp() {
    if (q5a[0].checked && q5b[0].checked && q5c[0].checked) {
        q5b[0].checked = false;
    }
}
function mult_b_temp() {
    if (q5a[0].checked && q5b[0].checked && q5c[0].checked) {
        q5c[0].checked = false;
    }
}
function mult_c_temp() {
    if (q5a[0].checked && q5b[0].checked && q5c[0].checked) {
        q5a[0].checked = false;
    }
}

