addEventListener('click', (e) => {
    var level = document.getElementsByName("level");
    var type = document.getElementsByName("type");
    var quest = document.getElementsByName("quest");
    var sl = document.getElementsByName("right_wrong");
    var right1 = document.getElementsByName("right_ans1");
    var right2 = document.getElementsByName("right_ans2");
    var wrong1 = document.getElementsByName("wrong_ans1");
    var wrong2 = document.getElementsByName("wrong_ans2");
    var word = document.getElementsByName("oneword");

    if (level[0].clicked || level[1].clicked || level[2].clicked) {
        document.getElementById("level-error").innerText = "";
    }
    else if (type[0].clicked || type[1].clicked || type[2].clicked || type[3].clicked) {
        document.getElementById("type-error").innerText = "";
    } else if (sl[0].clicked || sl[1].clicked) {
        document.getElementById("right_wrong-error").innerText = "";
    }

    quest[0].addEventListener('keypress', () => {
        document.getElementById("quest-error").innerText = "";
    });

    right1[0].addEventListener('keypress', () => {
        document.getElementById("right1-error").innerText = "";
    });

    right2[0].addEventListener('keypress', () => {
        document.getElementById("right2-error").innerText = "";
    });

    wrong1[0].addEventListener('keypress', () => {
        document.getElementById("wrong1-error").innerText = "";
    });

    wrong2[0].addEventListener('keypress', () => {
        document.getElementById("wrong2-error").innerText = "";
    });

    word[0].addEventListener('keypress', () => {
        document.getElementById("word-error").innerText = "";
    });


    if (type[0].checked) {
        document.getElementById("sl").style.display = "block";
        document.getElementById("right1").style.display = "none";
        document.getElementById("right2").style.display = "none";
        document.getElementById("wrong1").style.display = "none";
        document.getElementById("wrong2").style.display = "none";
        document.getElementById("oneword").style.display = "none";
    }
    else if (type[1].checked) {
        document.getElementById("sl").style.display = "none";
        document.getElementById("right1").style.display = "block";
        document.getElementById("right2").style.display = "none";
        document.getElementById("wrong1").style.display = "block";
        document.getElementById("wrong2").style.display = "block";
        document.getElementById("oneword").style.display = "none";
    }
    else if (type[2].checked) {
        document.getElementById("sl").style.display = "none";
        document.getElementById("right1").style.display = "block";
        document.getElementById("right2").style.display = "block";
        document.getElementById("wrong1").style.display = "block";
        document.getElementById("wrong2").style.display = "none";
        document.getElementById("oneword").style.display = "none";
    }
    else if (type[3].checked) {
        document.getElementById("sl").style.display = "none";
        document.getElementById("right1").style.display = "none";
        document.getElementById("right2").style.display = "none";
        document.getElementById("wrong1").style.display = "none";
        document.getElementById("wrong2").style.display = "none";
        document.getElementById("oneword").style.display = "block";
    }
});

document.addEventListener("DOMContentLoaded", () => {
    document.getElementById("sl").style.display = "block";
    document.getElementById("right1").style.display = "none";
    document.getElementById("right2").style.display = "none";
    document.getElementById("wrong1").style.display = "none";
    document.getElementById("wrong2").style.display = "none";
    document.getElementById("oneword").style.display = "none";
});

addEventListener('submit', (e) => {
    var level = document.getElementsByName("level");
    var type = document.getElementsByName("type");
    var quest = document.getElementsByName("quest");
    var sl = document.getElementsByName("right_wrong");
    var right1 = document.getElementsByName("right_ans1");
    var right2 = document.getElementsByName("right_ans2");
    var wrong1 = document.getElementsByName("wrong_ans1");
    var wrong2 = document.getElementsByName("wrong_ans2");
    var word = document.getElementsByName("oneword");

    //validate level
    if (!level[0].checked && !level[1].checked && !level[2].checked) {
        e.preventDefault();
        document.getElementById("level-error").innerText = "Επιλέξτε Επίπεδο Δυσκολίας";
        document.getElementById("level-error").style.color = "red";
        document.getElementById("level-error").style.fontWeight = "bold";
        document.getElementById("level-error").style.marginTop = "8px";
        document.getElementById("level-error").style.marginBottom = "-20px";

    } else {
        document.getElementById("level-error").innerText = "";
    }

    //validate type
    if (!type[0].checked && !type[1].checked && !type[2].checked && !type[3].checked) {
        e.preventDefault();
        document.getElementById("type-error").innerText = "Επιλέξτε Τύπο";
        document.getElementById("type-error").style.color = "red";
        document.getElementById("type-error").style.fontWeight = "bold";
        document.getElementById("type-error").style.marginTop = "8px";
        document.getElementById("type-error").style.marginBottom = "-20px";

    } else {
        document.getElementById("type-error").innerText = "";
    }

    var reg = /^[a-zA-Z0-9α-ωΑ-ΩπρστυχςίϊΐόάέύϋΰήώΊΪΌΆΈΎΫΉΏ@$!%*?.,&;#\-\s]{1,255}$/; // \s means spaces are accepted
    if (quest[0].value == "" || quest[0].value == null || !reg.test(quest[0].value)) {
        e.preventDefault();
        document.getElementById("quest-error").innerText = "Συμπληρώστε την Ερώτηση";
        document.getElementById("quest-error").style.color = "red";
        document.getElementById("quest-error").style.fontWeight = "bold";
        document.getElementById("quest-error").style.marginTop = "-15px";
        document.getElementById("quest-error").style.marginBottom = "10px";

    } else {
        document.getElementById("quest-error").innerText = "";
    }

    if (!type[3].checked && !type[0].checked) {

        var reg = /^[a-zA-Z0-9α-ωΑ-ΩπρστυχςίϊΐόάέύϋΰήώΊΪΌΆΈΎΫΉΏ@$!%*?.,&;#\-\s]{1,100}$/; // \s means spaces are accepted
        if (right1[0].value == "" || right1[0].value == null || !reg.test(right1[0].value)) {
            e.preventDefault();
            document.getElementById("right1-error").innerText = "Συμπληρώστε την Απάντηση";
            document.getElementById("right1-error").style.color = "red";
            document.getElementById("right1-error").style.fontWeight = "bold";
            document.getElementById("right1-error").style.marginTop = "-15px";
            document.getElementById("right1-error").style.marginBottom = "10px";

        } else {
            document.getElementById("right1-error").innerText = "";
        }

        if (wrong1[0].value == "" || wrong1[0].value == null || !reg.test(wrong1[0].value)) {
            e.preventDefault();
            document.getElementById("wrong1-error").innerText = "Συμπληρώστε την Απάντηση";
            document.getElementById("wrong1-error").style.color = "red";
            document.getElementById("wrong1-error").style.fontWeight = "bold";
            document.getElementById("wrong1-error").style.marginTop = "-15px";
            document.getElementById("wrong1-error").style.marginBottom = "10px";

        } else {
            document.getElementById("wrong1-error").innerText = "";
        }

        if (type[1].checked) {

            if (wrong2[0].value == "" || wrong2[0].value == null || !reg.test(wrong2[0].value)) {
                e.preventDefault();
                document.getElementById("wrong2-error").innerText = "Συμπληρώστε την Απάντηση";
                document.getElementById("wrong2-error").style.color = "red";
                document.getElementById("wrong2-error").style.fontWeight = "bold";
                document.getElementById("wrong2-error").style.marginTop = "-15px";
                document.getElementById("wrong2-error").style.marginBottom = "10px";

            } else {
                document.getElementById("wrong2-error").innerText = "";
            }

        } else if (type[2].checked) {

            if (right2[0].value == "" || right2[0].value == null || !reg.test(right2[0].value)) {
                e.preventDefault();
                document.getElementById("right2-error").innerText = "Συμπληρώστε την Απάντηση";
                document.getElementById("right2-error").style.color = "red";
                document.getElementById("right2-error").style.fontWeight = "bold";
                document.getElementById("right2-error").style.marginTop = "-15px";
                document.getElementById("right2-error").style.marginBottom = "10px";

            } else {
                document.getElementById("right2-error").innerText = "";
            }

        }

    } else if (type[3].checked) {

        var reg = /^[a-zA-Z0-9α-ωΑ-ΩπρστυχςίϊΐόάέύϋΰήώΊΪΌΆΈΎΫΉΏ@$!%*?.,&;#\-\S]{1,100}$/; // \S means spaces aren't accepted
        if (word[0].value == "" || word[0].value == null || !reg.test(word[0].value)) {
            e.preventDefault();
            document.getElementById("word-error").innerText = "Συμπληρώστε την Απάντηση";
            document.getElementById("word-error").style.color = "red";
            document.getElementById("word-error").style.fontWeight = "bold";
            // document.getElementById("word-error").style.marginTop = "8px";
            // document.getElementById("word-error").style.marginBottom = "-22px";

        } else {
            document.getElementById("word-error").innerText = "";
        }

    } else if (type[0].checked) {

        if (!sl[0].checked && !sl[1].checked) {
            e.preventDefault();
            document.getElementById("right_wrong-error").innerText = "Επιλέξτε την Απάντηση";
            document.getElementById("right_wrong-error").style.color = "red";
            document.getElementById("right_wrong-error").style.fontWeight = "bold";
            document.getElementById("right_wrong-error").style.marginTop = "8px";
            document.getElementById("right_wrong-error").style.marginBottom = "-20px";

        } else {
            document.getElementById("right_wrong-error").innerText = "";
        }

    }

});
