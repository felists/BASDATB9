$(document).ready(function() {
    if (sessionStorage.getItem("username") === null) {
        $("#login").submit(function() {
            var unInput = $("#username").val();
            var passInput = $("#password").val();
            var found = false;
            var xmlDoc = loadXMLDoc("data/users.xml");
            var data = xmlDoc.getElementsByTagName("user");
            var photo = "";
            for (var i = 0; i < data.length; i++) {
                un = data[i].getElementsByTagName("username")[0].childNodes[0].nodeValue;
                pass = data[i].getElementsByTagName("password")[0].childNodes[0].nodeValue;
                if (un == unInput && pass == passInput) {
                    photo = data[i].getElementsByTagName("photo")[0].childNodes[0].nodeValue;
                    found = true;
                    break;
                }
            }
            if (found) {
                sessionStorage.setItem("username", unInput);
                window.location.href = "login.php";
                return false;
            } else {
                alert("Username dan Password Salah");
            }
        });
    } else {
        window.location.href = "login.php";
    }
});

function loadXMLDoc(dname) {
    if (window.XMLHttpRequest) {
        xhttp = new XMLHttpRequest();
    } else {
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhttp.open("GET", dname, false);
    xhttp.send();
    return xhttp.responseXML;
}