// toggle password current password
const toggleCurrentPassword = document.querySelector(".togglePassword1");
const currentPassword = document.querySelector("#inputCurrentPassword2");

toggleCurrentPassword.addEventListener("click", function () {
  if (password == true) {
    currentPassword.setAttribute("type", "text");
    toggleCurrentPassword.innerHTML = "visibility";
  } else {
    currentPassword.setAttribute("type", "password");
    toggleCurrentPassword.innerHTML = "visibility_off";
  }
  password = !password;
});

// toggle new password
const toggleNewPassword = document.querySelector(".togglePassword2");
const newPassword = document.querySelector("#inputNewPassword2");

var password = true;

toggleNewPassword.addEventListener("click", function () {
  if (password == true) {
    newPassword.setAttribute("type", "text");
    toggleNewPassword.innerHTML = "visibility";
  } else {
    newPassword.setAttribute("type", "password");
    toggleNewPassword.innerHTML = "visibility_off";
  }
  password = !password;
});

// toggle confirm password
const toggleConfirmPassword = document.querySelector(".togglePassword3");
const confirmPassword = document.querySelector("#inputConfirmPassword2");

var password = true;

toggleConfirmPassword.addEventListener("click", function () {
  if (password) {
    confirmPassword.setAttribute("type", "text");
    toggleConfirmPassword.innerHTML = "visibility";
  } else {
    confirmPassword.setAttribute("type", "password");
    toggleConfirmPassword.innerHTML = "visibility_off";
  }
  password = !password;
});