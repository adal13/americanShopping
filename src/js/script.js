const confirmInput = document.getElementById('validate_password');
const passwordMatchMessage = document.getElementById('validatePasswordMessage');

const passwordInput = document.getElementById('password');
const passwordMessage = document.getElementById('passwordMessage');

    passwordInput.addEventListener('input', function(event) {
        const password = event.target.value;
        const hasMinimumLength = password.length >= 8;
        const hasSpecialCharacter = /[@$!%*#?&]/.test(password);

        if (!hasMinimumLength) {
            passwordMessage.innerHTML = 'La contraseña debe tener al menos 8 caracteres.<br><br>';
        } else if (!hasSpecialCharacter) {
            passwordMessage.innerHTML = 'La contraseña debe contener al menos un carácter especial (@, $, !, %, *, #, ?, &).<br><br>';
        } else {
            passwordMessage.textContent = '';
        }
    });

    confirmInput.addEventListener('input', function(event) {
        const password = passwordInput.value;
        const confirm = event.target.value;
        const hasMinimumLength = password.length >= 8;
        const hasSpecialCharacter = /[@$!%*#?&]/.test(password);

        if (!hasMinimumLength) {
            passwordMessage.innerHTML = 'La contraseña debe tener al menos 8 caracteres.<br><br>';
        } else if (!hasSpecialCharacter) {
            passwordMessage.innerHTML = 'La contraseña debe contener al menos un carácter especial (@, $, !, %, *, #, ?, &).<br><br>';
        } else {
            passwordMessage.textContent = '';
        }

        if (password === confirm) {
            passwordMatchMessage.textContent = '';
        } else {
            passwordMatchMessage.innerHTML = 'La contraseñas no coinciden.<br><br>';
        }
    });