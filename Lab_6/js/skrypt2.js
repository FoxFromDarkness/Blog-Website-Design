function kliker() {

    if (document.getElementById("ButtonKlik").value == 0) {
        document.getElementById("ID").style.display = "none";
        document.getElementById("ButtonKlik").value = 1;
    }
    else {
        document.getElementById("ID").style.display = "block";
        document.getElementById("ButtonKlik").value = 0;

    }

}