function validateForm() {
  const email = document.getElementById("email");
  const password = document.getElementById("password");
  const repassword = document.getElementById("repassword");

  // Email should follow format
  const emailRegex = /^[\w\.-]+@[a-zA-Z\d\.-]+\.[a-zA-Z]{2,6}$/;
  // Password 8 to 15 characters; at least one uppercase, one lowercase, one digit, and one special character
  const passwordRegex =
    /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,15}$/;

  // Validate username
  if (!emailRegex.test(email.value)) {
    alert("Invalid email, try again.");
    email.focus();
    return false;
  }

  // Validate password
  if (!passwordRegex.test(password.value)) {
    alert(
      "Invalid password. Must be 8-15 characters, at least one uppercase letter, one lowercase letter, one digit, and one special character."
    );
    password.focus();
    return false;
  }

  // Validate retyped password
  if (password.value !== repassword.value) {
    alert("Passwords do not match.");
    repassword.focus();
    return false;
  }

  return true;
}
