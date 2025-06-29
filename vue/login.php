<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login</title>
  <link rel="stylesheet" href="/public/css/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script src="/public/js/script.js"></script>
</head>
<body>
  <div class="login-container">
    <div class="avatar">
      <i class="fa fa-user"></i>
    </div>

    <form action="/model/connexion/login_trtm.php" method="POST" class="login-form" id="loginForm">
      <div class="input-group">
        <i class="fa fa-user icon"></i>
        <input type="text" id="username" name="username" placeholder="Username" required />
      </div>
      <div class="input-group">
        <i class="fa fa-lock icon"></i>
        <input type="password" id="password" name="password" placeholder="Password" required />
      </div>
      <div class="options">
      </div>
      <div id="error-message"></div>
      <button type="submit">Connexion</button>
    </form>
  </div>
</body>
</html>
