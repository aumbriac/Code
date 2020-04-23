$('form').submit(function (e) {
  e.preventDefault();
 let username = $('#username').val(),
  email = $('#email').val(),
  password = $('#password').val();
 $.ajax({
  method: 'POST',
  url: 'register.php',
  data: {
   register: true,
   username: username,
   email: email,
   password: password,
  },
  success: function (res) {
   if (res === 'emailTaken') {
    alert('Please use another email');
    $('#email').focus();
   } else if (res === 'usernameTaken') {
    alert('Please use another username');
    $('#username').focus();
   } else {
    alert('Registration successful');
    $('form')[0].reset();
    $('#submit').attr('disabled', true);
   },
   error: function() {
    alert('Server error. Please try again.');
   },
  },
 });
});

$('#password, #confirmPassword').on('blur', function () {
 if ($('#password').val() !== $('#confirmPassword').val()) {
  $('.alert').show();
  $('#output').html('Passwords do not match');
 }
});

$('#password, #confirmPassword').on('focus', function () {
 $('.alert').hide();
});

var globalEmail;

$('.form-control').on('keyup', function () {
 if (
  $('#username').val() !== '' &&
  $('#email').val() !== '' &&
  globalEmail === true &&
  $('#password').val().length > 0 &&
  $('#confirmPassword').val().length > 0 &&
  $('#password').val() === $('#confirmPassword').val()
 ) {
  $('#submit').attr('disabled', false);
 } else {
  $('#submit').attr('disabled', true);
 }
});

$('#email').bind('input propertychange paste', function () {
 let email = $('#email').val(),
  emailValidation = /[a-zA-Z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?/i;

 if (emailValidation.test(email)) {
  $.ajax({
   method: 'POST',
   url: 'validate_email.php',
   data: {
    email: email,
   },
   success: function (res) {
    if (res === 'valid') {
     globalEmail = true;
    } else {
     globalEmail = false;
    }
   },
  });
 } else {
  globalEmail = false;
 }
});
