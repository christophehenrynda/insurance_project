const container = document.querySelector('.container'),
const pwdShowHide = document.querySelector('.showhidepw'),
const pwFields = document.querySelector('.password'),
const signUp = document.querySelector('.signup-link'),
const login = document.querySelector('.login-link');

//js code to show and hide password andd change icon

pwdShowHide.forEach(eyeIcon =>{
    eyeIcon.addEventListener("click", ()=>{
        pwFields.forEach(pwField =>{
            if (pwField.type == "password") {
                pwField.type = "text";
                
                pwdShowHide.forEach(icon =>{
                    icon.classList.replace("fas fa-eye-slash", "fas fa-eye");
                })
            } else {
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
    const email = document.forms.loginForm.email;
    const password = document.forms.loginForm.password;
    
    const emailRegex = /^[a-zA-Z0-9.!#$%&'"+/=?^_'{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    
    if (email == "" || !emailRegex.test(email.value)){
        alert("Please provide a valid Email");
        email.focus();
        return false;
    }
    
    if (password == "" || ! passwordRegex.test(password.value)){
        alert("Please provide a strong Password");
        password.focus();
        return false;
    }

    alert("Login successful.")
    return true;
}
