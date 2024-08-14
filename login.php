<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Chatting - APP</title>
  <link rel="shortcut icon" href="#" type="image/x-icon">
  <!-- <link rel="stylesheet" href="css/login_form.css"> -->
  <link rel="stylesheet" href="css/registration_form.css">
</head>

<body>

  <div class="loginForm__wrapper">

    <div class="loginForm">

      <div class="loginForm__image">
        <img src="/photo/form-image.jpg" alt="image">
      </div>

      <div class="loginForm__form">
        <h1>Realtime Chat App</h1>
        <form name="login">
          <input type="text" name="username" placeholder="Username" required />
          <input type="password" name="password" placeholder="Password" required />
          <button type="submit" name="submit">Continue to chat</button>
        </form>
        <span>Not yet signed up? <a href="/register">Signup Now</a></span>
        <span id="errorMessage"></span>
      </div>

    </div>

  </div>

  <script src="script/login_user_with_session.js"></script>
</body>

</html>