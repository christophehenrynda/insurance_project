container = document.querySelector('.container'),
pwdShowHide = document.querySelector('.showhidepw'),
pwFields = document.querySelector('.password'),
signUp = document.querySelector('.signup-link'),
login = document.querySelector('.login-link');

//js code to show and hide password andd change icon

pwdShowHide.forEach(eyeIcon =>{
    eyeIcon.addEventListener("click", ()=>{
        pwFields.forEach(pwField =>{
            if (pwField.type === "password") {
                pwField.type = "text";
                pwdShowHide.forEach(icon =>{
                    icon.classList.replace("fas fa-eye-slash", "fas fa-eye");
                })
            }else {
                pwField.type = "password";

                pwdShowHide.forEach(icon =>{
                    icon.classList.replace("fas fa-eye", "fas fa-eye-slash")
                })
            }
        })
    })
})

//js code to appear signup and login form

signUp.addEventListener("click", function(){
    container.classList.add("active");
})
login.addEventListener("click", function (){
    container.classList.remove("active")
})

//form validation 
function loginvalidation() {
    let email = document.forms.loginForm.email.value;
    let password = document.forms.loginForm.password.value;
    let regEmail = /^[a-zA-Z0-9.!#$%&'"+/=?^_'{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if (email == "" || !regEmail.test(email)){
        alert("please enter your Email properly.");
        email.focus();
        return false;
    }if (password = ""){
        alert("please enter your password");
        password.focus();
        return false;
    }else {
        alert("Login successful.")
    }
}