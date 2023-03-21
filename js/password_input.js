function showPassword() {
    var x = document.getElementById("passwordInput");
    var eye = document.getElementById("show-password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
    eye.classList.toggle("fa-eye");
    eye.classList.toggle("fa-eye-slash");
  }