const passwordInput = document.querySelector('#password');
const showPasswordCheckbox = document.querySelector('#show-password');
const eyeIcon = document.querySelector('#eye-icon');

eyeIcon.addEventListener('click', function() {
  passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
  eyeIcon.classList.toggle('fa-eye');
  eyeIcon.classList.toggle('fa-eye-slash');
});

showPasswordCheckbox.addEventListener('change', function() {
  passwordInput.type = showPasswordCheckbox.checked ? 'text' : 'password';
  eyeIcon.classList.toggle('fa-eye');
  eyeIcon.classList.toggle('fa-eye-slash');
});