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
    <link rel = "stylesheet" href = "login-process.css">
</head>
<body>
    <section class="header">
      <nav>
        <a href="../index.php"><img src="../assets/images/logo.png" width="100px" /></a>
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

          <div class="gradient-bg">
  <section class="otp-form">
    <h4>Enter code</h4>
    <div id="inputs" class="otp-inputs">
      <input class="input" type="text" inputmode="numeric" maxlength="1">
      <input class="input" type="text" inputmode="numeric" maxlength="1">
      <input class="input" type="text" inputmode="numeric" maxlength="1">
      <input class="input" type="text" inputmode="numeric" maxlength="1">
      <input class="input" type="text" inputmode="numeric" maxlength="1">
      <input class="input" type="text" inputmode="numeric" maxlength="1">
    </div>
    <button type="button" class="btn btn-outline-success">Resend code</button>
  </section>
</div>
</body>
</html>