document.addEventListener("DOMContentLoaded", function (event) {
    const btnSignIn = document.getElementById('btn-sign-in');
    const btnSignUp = document.getElementById('btn-sign-up');

    btnSignIn.addEventListener('click', () => {
        document.getElementById('sign-in').style.display = 'block';
        document.getElementById('sign-up').style.display = 'none';
    });

    btnSignUp.addEventListener('click', () => {
        document.getElementById('sign-in').style.display = 'none';
        document.getElementById('sign-up').style.display = 'block';
    });
});
