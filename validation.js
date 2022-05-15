
function validateFun() {

  var username = document.getElementById('username');
var password = document.getElementById('password');
var form = document.getElementById("from-login");
var error_password = document.getElementById('error-password');
var error_username = document.getElementById('error-username');

  // debugger;
  let messages =0;
  if (username.value === '' || username.value == null) {
    error_username.innerText = '* Name is required';
    messages++;
  }

  if (password.value.length < 4) {
            error_password.innerText = 'Password must be longer than 6 characters';

    messages++;
  }

  if (password.value.length >= 20) {
        error_password.innerText = 'Password must be less than 20 characters';

    messages++;
  }

  if (password.value === 'password') {
    error_password.innerText = 'Password cannot be password';
    messages++;
  }

  if (messages > 0) {
    event.preventDefault()

    // errorElement.innerText = messages.join(', ')
  }
}