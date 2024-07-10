/* eslint-disable no-console */

document.addEventListener('DOMContentLoaded', function() {
    // Xử lý form đăng nhập
    var loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', function(event) {
            event.preventDefault();

            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;
            var errorMessage = document.getElementById('errorMessage');

            fetch('http://localhost:3000/login', { // Đảm bảo URL phù hợp với máy chủ của bạn
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ username: username, password: password })
            })
            .then(function(response) {
                return response.json();
            })
            .then(function(result) {
                if (result.success) {
                    errorMessage.style.display = 'none';
                    alert('Đăng nhập thành công');
                    window.location.href = 'index.html'; // Chuyển hướng sau khi đăng nhập thành công
                } else {
                    errorMessage.textContent = result.message;
                    errorMessage.style.display = 'block';
                }
            })
            .catch(function(error) {
                // eslint-disable-next-line no-console
                console.error('Error:', error);
                alert('Đăng nhập thất bại. Vui lòng thử lại.');
            });
        });
    }

    // Xử lý form đăng ký
    var registerForm = document.getElementById('registerForm');
    if (registerForm) {
        registerForm.addEventListener('submit', function(event) {
            event.preventDefault();

            var formData = new FormData(this);
            var data = {
                email: formData.get('email'),
                password: formData.get('password'),
                parent_name: formData.get('parent_name'),
                parent_phone: formData.get('parent_phone'),
                student_name: formData.get('student_name'),
                class: formData.get('class'),
                school: formData.get('school'),
                address: formData.get('address')
            };

            fetch('http://localhost:3000/register', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
            .then(function(response) {
                return response.json();
            })
            .then(function(result) {
                if (result.success) {
                    alert('Đăng ký thành công!');
                    window.location.href = 'index.html'; // Chuyển hướng sau khi đăng ký thành công
                } else {
                    alert('Đăng ký thất bại: ' + result.message);
                }
            })
            .catch(function(error) {
                // eslint-disable-next-line no-console
                console.error('Error:', error);
                alert('Đăng ký thất bại. Vui lòng thử lại.');
            });
        });
    }
});
