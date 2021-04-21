function zoomIt() {
        let scale = "scale(1)";
        document.body.style.webkitTransform = scale; // Chrome, Opera, Safari
        document.body.style.msTransform = scale; // IE 9
        document.body.style.transform = scale; // Gener
}    

function login_Click() {
        let login = document.getElementById("login").value;
        let password = document.getElementById("password").value;

        if (login == "professorpaulo" && password == "1234") {
                window.location.href = "../prof-home/index.html";
        } else if (login == "alunopedro" && password == "5678") {
                window.location.href = "../aluno-home/index.php";
        } else {
                alert("Login ou senha inválidos!");
        }
}