document.getElementById("sign-in-form").addEventListener("onsubmit", function(event) {
    var loginInput = document.getElementById("login");
    var passwordInput = document.getElementById("password");

    if (!loginInput.checkValidity()) {
        loginInput.style.backgroundColor = "red";
        event.preventDefault();
    }

    if (!passwordInput.checkValidity()) {
        emailInput.style.backgroundColor = "red";
        event.preventDefault();
    }
});