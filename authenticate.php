<?php
// Check if login form is submitted 
require_once 'config.php';
session_start();


if (isset($_POST['login'])) {

  // If user has already logged in redirect them to home page
  if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
  }

  $username = trim($_POST['username']);
  $password = trim($_POST['password']);

  if (empty($password)) {
    $error[] = "Password is required.";
  }
  if (empty($username)) {
    $error[] = "Username is required.";
  }



  if (empty($error)) {
    $stmt = $mysqli->prepare('SELECT id, password FROM users WHERE username = ?');
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['user_login'] = true;
      header('Location: index.php');
      exit();
    } else {
      $error[] = 'Invalid email or password';
    }
  }
}

// Check if signup form is submitted

if (isset($_POST['signup'])) {
  // If users just signup, then redirect them to login page
  if (isset($_SESSION['user_id'])) {
    header('Location: authenticate.php');
    exit();
  }

  $fullname = htmlspecialchars($_POST['username']);
  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars($_POST['password']);
  $errors = [];

  if (empty($fullname)) {
    $errors[] = "Fullname is required.";
  }

  if (!empty($email)) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors[] = "Email is invalid.";
    }
  } else {
    $errors[] = "Email is required.";
  }
  if (empty($password)) {
    $errors[] = "Password is required.";
  }

  if (empty($errors)) {

    $stmt = $mysqli->prepare('SELECT id FROM users WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      $errors[] = 'Email address already exists';
    } else {
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
      $stmt = $mysqli->prepare('INSERT INTO users (username, email, password) VALUES (?, ?, ?)');
      $stmt->bind_param('sss', $fullname, $email, $hashedPassword);
      $stmt->execute();

      $_SESSION['user_id'] = $mysqli->insert_id;
      $_SESSION['user_registered'] = true;
    }
  }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include_once 'favicon.php' ?>
  <title>Login & Register</title>
  <link rel="stylesheet" href="assets/css/authentication.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
</head>

<body>
  <?php if (isset($_SESSION['user_registered'])) : ?>
    <div class='alert success show'>You have successfully registered!</div>
  <?php endif ?>

  <div class="back-to-home" id="backArrow">
    <span>&leftarrow;</span>
  </div>
  <div class="auth-container">
    <div class="form-container login-container">
      <h2 class="text-gradient">Login</h2>
      <form id="login-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <?php if (isset($error)) : ?>
          <?php foreach ($error as $err) : ?>
            <div class="form-group">
              <p class="error"><?= $err ?></p>
            </div>
          <?php endforeach ?>
        <?php endif ?>
        <div class="input-group">
          <i class="fas fa-user"></i>
          <input id="login-username" type="text" name="username" placeholder="Username">
        </div>
        <div class="input-group">
          <i class="fas fa-lock"></i>
          <input id="login-password" type="password" name="password" placeholder="Password">
        </div>
        <button type="submit" name="login">Login</button>
      </form>
    </div>
    <div class="form-container signup-container">
      <h2 class="text-gradient">Sign Up</h2>
      <form id="signup-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <?php if (isset($errors)) : ?>
          <?php foreach ($errors as $error) : ?>
            <div class="form-group">
              <p class="error"><?= $error ?></p>
            </div>
          <?php endforeach ?>
        <?php endif ?>
        <div class="input-group">
          <i class="fas fa-user"></i>
          <input id="signup-username" type="text" name="username" placeholder="Username">
        </div>
        <div class="input-group">
          <i class="fas fa-envelope"></i>
          <input id="signup-email" type="text" name="email" placeholder="Email">
        </div>
        <div class="input-group">
          <i class="fas fa-lock"></i>
          <input id="signup-password" type="password" name="password" placeholder="Password">
        </div>
        <button type="submit" name="signup">Sign Up</button>
      </form>
    </div>
  </div>
  <script>
    backArrow.onclick = function() {
      window.location.href = "/";
    }
    // Select the alert box element
    let $alert = $('.alert');
    // Hide the alert box after 3 seconds
    setTimeout(function() {
      $alert.removeClass('show');
    }, 3000);
  </script>
</body>

</html>