
addEventListener("submit", (e) => {

    var sum = 0;
    var val1 = document.getElementsByName("q1");
    var val2a = document.getElementsByName("q2a");
    var val2b = document.getElementsByName("q2b");
    var val2c = document.getElementsByName("q2c");
    var val3 = document.getElementsByName("q3");
    var val4 = document.getElementsByName("q4");
    var val5 = document.getElementsByName("q5");

    var i, length, c = "";
    length = val1.length;
    for (i = 0; i < length; i++) {
        if (val1[i].checked) {
            c = val1[i].value;
            break;
        }
    }

    if (c == "") {
        alert('please select 1 choice answer');
        return false;
    } else if (c == "9min") {
        sum++;
    }


    if ((!val2a[0].checked) && (!val2b[0].checked) && (!val2c[0].checked)) {
        alert('please select 2 choice answers');
        return false;
    } else if (val2a[0].checked && val2b[0].checked && !val2c[0].checked) {
        sum++;
    }

    c = "";
    length = val3.length;
    for (i = 0; i < length; i++) {
        if (val3[i].checked) {
            c = val3[i].value;
            break;
        }
    }

    if (c == "") {
        alert('please select 3 choice answer');
        return false;
    } else if (c == "right") {
        sum++;
    }

    c = "";
    length = val4.length;
    for (i = 0; i < length; i++) {
        if (val4[i].checked) {
            c = val4[i].value;
            break;
        }
    }

    if (c == "") {
        alert('please select 4 choice answer');
        return false;
    } else if (c == "green") {
        sum++;
    }

    if (val5[0].value == "" || val5[0].value == null) {
        alert('please enter an answer in field 5');
        return false;
    }
    else if (val5[0].value == "mozzarella") {
        sum++;
    }

    alert("You got " + sum + "/5");
    return true;

});
