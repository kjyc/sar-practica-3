document.addEventListener("DOMContentLoaded", function (event) {
    const formSignUp = document.getElementById('su-form');
    const inputSuName = document.getElementById('su-name');
    const inputSuLastname = document.getElementById('su-lastname');
    const inputSuEmail = document.getElementById('su-email');
    const inputSuPassword = document.getElementById('su-password');
    const inputSuPassword_ = document.getElementById('su-password_');

    const reName = /^[a-zA-Zá-üÁ-Ü]+(\s[a-zA-Zá-üÁ-Ü]+)*$/;
    const reLastname = /^[a-zA-Zá-üÁ-Ü]+(\s[a-zA-Zá-üÁ-Ü]+)*$/;
    const reEmail = /^[a-z]+([0-9]{3}@ikasle\.|\.[a-z]+@|@)ehu\.(eus|es)$/;
    const rePassword = /^[a-zA-Z\d]{8,}$/;

    inputSuName.addEventListener('input', () => {
        verifyInput(inputSuName, 'su-name-error', 'Introduce un nombre válido.', reName.test(inputSuName.value));
    });

    inputSuLastname.addEventListener('input', () => {
        verifyInput(inputSuLastname, 'su-lastname-error', 'Introduce un apellido/s válido.', reLastname.test(inputSuLastname.value));
    });

    inputSuEmail.addEventListener('input', () => {
        verifyInput(inputSuEmail, 'su-email-error', 'Introduce un correo válido.', reEmail.test(inputSuEmail.value));
    });

    inputSuPassword.addEventListener('input', () => {
        verifyInput(inputSuPassword, 'su-password-error', 'La contraseña debe tener al menos 8 carácteres (letras y/o números).', rePassword.test(inputSuPassword.value));
    });

    inputSuPassword_.addEventListener('input', () => {
        verifyInput(inputSuPassword_, 'su-password_-error', 'Las contraseñas no son iguales.', inputSuPassword_.value === inputSuPassword.value);
    });

    formSignUp.addEventListener('submit', (event) => {
        event.preventDefault();

        let isValidName = /^[a-zA-Zá-üÁ-Ü]+(\s[a-zA-Zá-üÁ-Ü]+)*$/.test(document.getElementById('su-name').value);
        let isValidLastname = /^[a-zA-Zá-üÁ-Ü]+(\s[a-zA-Zá-üÁ-Ü]+)*$/.test(document.getElementById('su-lastname').value);
        let isValidEmail = /^[a-z]+([0-9]{3}@ikasle\.|\.[a-z]+@|@)ehu\.(eus|es)$/.test(document.getElementById('su-email').value);
        let isValidPassword = /^[a-zA-Z\d]{8,}$/.test(document.getElementById('su-password').value);
        let isValidPassword_ = document.getElementById('su-password').value === document.getElementById('su-password_').value;

        if (isValidName && isValidLastname && isValidEmail && isValidPassword && isValidPassword_) {
            let xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    if (xmlhttp.responseText == 'success') {
                        window.location.replace('index.php');
                    }
                    else {
                        if (xmlhttp.responseText == 'email-exists') {
                            alert('La dirección de correo ya está en uso. Utilize otro correo.');
                        } else {
                            alert('Ha ocurrido algún error. Verifique sus datos e intentelo otra vez.');
                        }
                    }
                }
            }

            xmlhttp.open('POST', './resources/php/index/signup.php', true);
            xmlhttp.send(new FormData(formSignUp));
        }
    });

    function verifyInput(element, id, message, isOk) {
        let errorMessage = document.getElementById(id);
        if (isOk) {
            element.classList.remove('ipt-error');
            if (errorMessage) {
                errorMessage.remove();
            }
        } else {
            element.classList.add('ipt-error');
            if (!errorMessage) {
                element.parentElement.after(createErrorMessage(id, message));
            }
        }
    }

    function createErrorMessage(id, message) {
        let div = document.createElement('div');
        let p = document.createElement('p');
        div.setAttribute('id', id);
        div.setAttribute('class', 'row');
        p.setAttribute('class', 'su-error-message');
        p.innerHTML = message;
        div.appendChild(p);

        return div;
    }
});
