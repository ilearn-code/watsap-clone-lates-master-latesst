document.addEventListener('DOMContentLoaded', function () {
    const registerForm = document.querySelector('form[name="register"]');
    const errorSpan = document.getElementById('errorMessage');

    registerForm && registerForm.addEventListener('submit', function (event) {
        event.preventDefault();

        const formData = new FormData(registerForm);

        fetch('php_api/registerp.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Registration success
                    console.log(data.message);
                    // Perform any additional actions or redirect to another page
                    window.location.href = 'index.php';
                } else {
                    // Registration failed
                    console.log('Registration failed');
                    // Display error messages to the user
                    errorSpan.innerHTML = '';

                    for (const key in data) {
                        if (key !== 'success' && key !== 'message') {
                            const errorMessage = data[key];
                            const errorElement = document.createElement('p');
                            errorElement.textContent = errorMessage;
                            errorSpan.appendChild(errorElement);
                        }
                    }
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
});