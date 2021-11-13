document.addEventListener("DOMContentLoaded", function (event) {
    const formSignIn = document.getElementById('si-form');
    const inputSiPassword = document.getElementById('si-password');

    formSignIn.addEventListener('submit', (event) => {
        event.preventDefault();

        let xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if (xmlhttp.responseText == 'success') {
                    window.location.replace('dashboard.php');
                }
                else {
                    if (!document.getElementById('si-error')) {
                        inputSiPassword.parentElement.after(createErrorMessage('si-error', 'Correo o contraseña incorrecta.'));
                    }
                }
            }
        }

        xmlhttp.open('POST', './resources/php/index/signin.php', true);
        xmlhttp.send(new FormData(formSignIn));
    });

    function createErrorMessage(id, message) {
        let div = document.createElement('div');
        let p = document.createElement('p');
        div.setAttribute('id', id);
        div.setAttribute('class', 'row');
        p.setAttribute('class', 'si-error-message');
        p.innerHTML = message;
        div.appendChild(p);

        return div;
    }
});
