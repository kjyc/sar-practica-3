
document.addEventListener("DOMContentLoaded", function (event) {
    const btnSignIn = document.getElementById('btn-sign-in');
    const btnSignUp = document.getElementById('btn-sign-up');

    btnSignIn.addEventListener('click', () => {
        document.getElementById('signin').style.display = 'block';
        document.getElementById('signup').style.display = 'none';
    });

    btnSignUp.addEventListener('click', () => {
        document.getElementById('signin').style.display = 'none';
        document.getElementById('signup').style.display = 'block';
    });
});

function validateSUSubmit(){
    let name = document.getElementById('su-name').value;
    let lastname = document.getElementById('su-lastname').value;
    let email = document.getElementById('su-email').value;
    let password = document.getElementById('su-password').value;
    let password_ = document.getElementById('su-password_').value;

    if(name == ''){
        return false;
    }
    if(lastname == ''){
        return false;
    }
    if(email == ''){
        return false;
    }
    if(password != ''){
        if(password != password_){
            return false;
        }
    }
    else{
        return false;
    }
}