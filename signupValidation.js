var pw1 = document.getElementById("pswrd");
var pw2 = document.getElementById("pswrd2");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

function matchPassword() {
  var pw1 = document.getElementById("pswrd");
  var pw2 = document.getElementById("pswrd2");

  if (pw1.value != pw2.value) {
    alert("Passwords did not match");
    pw1.reset();
    pw2.reset();
    return false;
  } else {
    return true;
  }
}

// When the user clicks on the password field, show the message box
pw1.onfocus = function () {
  document.getElementById("message").style.display = "block";
};

// When the user clicks outside of the password field, hide the message box
pw1.onblur = function () {
  document.getElementById("message").style.display = "none";
};

// When the user starts to type something inside the password field
pw1.onkeyup = function () {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if (pw1.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if (pw1.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if (pw1.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  // Validate length
  if (pw1.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
};
