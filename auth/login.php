<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel = "stylesheet" href = "login.css">
</head>
<body>
    <section class="header">
      <nav>
        <a href="index1.html"><img src="images/logo.png" width="100px" /></a>
        <div class="nav-links">
          <ul>
            <li><a href="">HOME</a></li>
            <li><a href="">EVENTS</a></li>
            <li><a href="">CALENDAR</a></li>
            <li><a href="">CONTACT</a></li>
            <li><button type="button" class="btn btn-outline-success">Sign in</button></li>
          </ul>
          </div>
          </nav>

          <div class = "gradient-bg">
          <section class = "form-container">
            <form name = "login-form" class = "login-form">
                <h4>Welcome to NSBM eventHUB!</h4><br>
                <p>Sign in to continue</p>
                <label>Enter Email: </label>
                <input type = "email" id = "email" name = "emailaddress" placeholder = "name@nsbm.students.ac.lk"><br><br>
                <button type="button" class="btn btn-outline-success">Continue with email</button>
            </form>
          </section>
          </div>
</body>
</html>