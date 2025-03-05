// login-register Modal

let openModalLogin = document.getElementById("open-modal");
let closeModalLogin = document.getElementById("close-modal-login");
let modalloginContainer = document.getElementById("modal-login");
let openModalRegister = document.getElementById("register-modal-button");
let modalRegister = document.getElementById("modal-register");
let closeModalRegister = document.getElementById("close-modal-register");
let openModalLogin2 = document.getElementById("login-modal-button");

openModalLogin2.onclick = function() {
    modalloginContainer.classList.add("show");
    modalRegister.classList.remove("show");
}

openModalLogin.onclick = function() {
    modalloginContainer.classList.add("show"); 
}

closeModalLogin.onclick = function() {
    modalloginContainer.classList.remove("show"); 
}

openModalRegister.onclick = function() {
    modalRegister.classList.add("show");
    modalloginContainer.classList.remove("show");
}

closeModalRegister.onclick = function() {
    modalRegister.classList.remove("show");
}

window.onclick = function(event) {
    if (event.target === modalloginContainer) {
        modalloginContainer.classList.remove("show");
    }

    if (event.target === modalRegister) {
        modalRegister.classList.remove("show");
    }
}

