document.addEventListener('DOMContentLoaded', function() {
    var loginLinks = document.querySelectorAll('.login-required');
    var loginReminder = document.getElementById('loginReminder');

    for (var i = 0; i < loginLinks.length; i++) {
        loginLinks[i].addEventListener('click', function(event) {
            event.preventDefault();
            loginReminder.style.display = 'block';
        });
    }
});
