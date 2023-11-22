const x = document.getElementById('login');
const y = document.getElementById('register');
const z = document.getElementById('btn');
const fname = document.getElementById('fname');
const lname = document.getElementById('lname');
const s_email = document.getElementById('s_email');
const s_pswd = document.getElementById('s_pswd');
const s_conpswd = document.getElementById('conpswd');
const form = document.getElementById('form');
const l_email = document.getElementById('l_email');
const l_pswd= document.getElementById('l_pswd');
const l_check= document.getElementById('l_check');
let bool_check = false;


function register () {
    x.style.left = '-400px';
    y.style.left = '50px';
    z.style.left = '110px';
}
function login () {
    x.style.left = '50px';
    y.style.left = '450px';
    z.style.left = '0px';
}

let modal = document.getElementById('login-form');
window.onclick = function (event) {
    if (event.target == modal){
        modal.style.display = "none";
    }
}



function validateInput () {
    if (l_email.value.trim() === "" ){
        bool_check = true;
        onError(l_email, "First Name cannot be empty");
    }else {
        onSuccess(l_email);
    }
    if (l_pswd.value.trim() === "" ){
        bool_check = tue;
        onError(l_pswd, "Last Name cannot be empty");
    }else {
        onSuccess(l_pswd);
    }
    if (s_email.value.trim() === "" ){
        
    }else {
        
    }
}

function onSuccess (input){
    let parent = input.parentElement;
    let err = parent.querySelector("small");
    err.style.visibility = "hidden";
    err.innerText = "";
    parent.classList.add("success");
    parent.classList.remove("error");
}
function onError (input, message){
    let parent = input.parentElement;
    let err = parent.querySelector("small");
    err.style.visibility = "visible";
    err.innerText = message;
    parent.classList.add("error");
    parent.classList.remove("success");
}

//document.querySelector("button").addEventListener("click", (event)=>{
//    event.preventDefault();
//    validateInput();
//}); 