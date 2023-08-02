loginForm.addEventListener('submit', function(e) {
    e.preventDefault();

    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    if (email.trim() === '' || password.trim() === '') {
        mensajeError.style.display = 'block';
        mensajeError.innerHTML = '<i class="fa-solid fa-circle-exclamation"></i>Todos los campos son obligatorios.';
        return;
    }

    const url = 'server/login-user.php';
    const data = `email=${email}&password=${password}`;
  
    xhr.open('POST', url);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
            const response = JSON.parse(xhr.responseText);

            if (response.success) {
                window.location.href = response.redirectUrl;
            } else {
                mensajeError.style.display = 'block';
                mensajeError.innerHTML = response.message;
            }
        }
    };
    xhr.send(data);
});

showPassword.addEventListener('click', function() {
    togglePassword(password, showPassword);
});
