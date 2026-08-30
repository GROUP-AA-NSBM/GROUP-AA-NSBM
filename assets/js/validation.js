document.addEventListener("DOMContentLoaded", function () {

  const loginForm = document.querySelector("#loginForm");
  if (loginForm) {
    loginForm.addEventListener("submit", function (e) {
      const email = document.querySelector("#loginEmail").value.trim();
      const password = document.querySelector("#loginPassword").value.trim();

      if (email === "" || password === "") {
        e.preventDefault();
        alert("Please fill in all fields.");
        return;
      }

      if (!email.toLowerCase().endsWith("@nsbm.ac.lk")) {
        e.preventDefault();
        alert("Please use a valid NSBM email address (@nsbm.ac.lk).");
      }
    });
  }

  const registerForm = document.querySelector("#registerForm");
  if (registerForm) {
    registerForm.addEventListener("submit", function (e) {
      const name = document.querySelector("#regName").value.trim();
      const email = document.querySelector("#regEmail").value.trim();
      const password = document.querySelector("#regPassword").value.trim();

      if (name.length < 2) {
        e.preventDefault();
        alert("Please enter a valid name (at least 2 characters).");
        return;
      }

      if (!email.toLowerCase().endsWith("@nsbm.ac.lk")) {
        e.preventDefault();
        alert("Registration requires a valid NSBM email address (@nsbm.ac.lk).");
        return;
      }

      if (password.length < 6) {
        e.preventDefault();
        alert("Password must be at least 6 characters long.");
      }
    });
  }

  const adminLoginForm = document.querySelector("#adminLoginForm");
  if (adminLoginForm) {
    adminLoginForm.addEventListener("submit", function (e) {
      const email = document.querySelector("#adminEmail").value.trim();
      const password = document.querySelector("#adminPassword").value.trim();

      
      if (email === "" || password === "") {
        e.preventDefault();
        alert("Please enter both admin email and password.");
        return;
      }

      if (password !== "123456") {
        e.preventDefault();
        alert("Incorrect admin password.");
        return;
      }
    

      
      if (!email.toLowerCase().endsWith("@nsbm.ac.lk")) {
        e.preventDefault();
        alert("Access restricted: Please enter a valid NSBM email.");
      }
    });
  }
  
});
