var username, password, loginBtn, wrongUsernameOrPassword;
document.addEventListener("DOMContentLoaded", function() {
    username = document.getElementById("username");
    if (username) {
        username.addEventListener("input",handleInputChange);
        username.autofocus = true;
        username.addEventListener("focusout", usernameUnfocused);
    }

    password = document.getElementById("password");
    if (password) {
        password.addEventListener("input", handleInputChange);
        password.addEventListener("focusout", passwordUnfocused);
    }

    loginBtn = document.getElementById("BTNlogin");
    wrongUsernameOrPassword= document.getElementById("wrongUsernameOrPassword");
});



function usernameUnfocused()
{
    if (username.value === '')
    {
        username.classList.add("visible");
        loginBtn.classList.remove("changeColor");
    }
    else
    {
        username.classList.remove("visible");

    }

}

function handleInputChange()
{
    wrongUsernameOrPassword.classList.remove("visible");
    if (password.value === '' || username.value === '')
    {
        loginBtn.setAttribute("disabled", "");
    }
    else
    {
        loginBtn.removeAttribute("disabled");
    }
}

function passwordUnfocused()
{

    if (password.value === '')
    {
        password.classList.add("visible");
        loginBtn.classList.remove("changeColor");
    }
    else
    {
        password.classList.remove("visible");

    }
}

function clickUsername()
{
    username.classList.remove("visible");
}
function clickPassword()
{
    password.classList.remove("visible");
}


