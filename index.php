<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include_once 'favicon.php' ?>
  <title>FitLife - Home</title>
  <link rel="stylesheet" href="assets/css/styles.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
</head>

<body>
  <!-- Add site header and navigation here -->
  <?php include_once 'header.php'; ?>
  <?php
  if (isset($_SESSION['user_login'])) {
    echo '<div class="alert success show">You have successfully logged in!</div>';
    // unset($_SESSION);
  }
  if (!isset($_SESSION['user_login'])) {
    echo '<div class="alert error show">You are successfully logged out!</div>';
    // unset($_SESSION);
  }
  ?>
  <main>
    <section class="hero">
      <h1>Welcome to FitLife!</h1>
      <p>Join our community and start achieving your fitness goals today!</p>
      <a href="authenticate.php">Get Started</a>
    </section>
    <section class="container first">
      <h2 class="text-gradient">What We Offer</h2>
      <div class="features">
        <div class="feature">
          <img src="assets/images/fitness-image-1.jpeg" alt="Workout Plans Icon">
          <h3>Workout Plans</h3>
          <p>Find the perfect workout plan tailored to your fitness level and goals.</p>
        </div>
        <div class="feature">
          <img src="assets/images/meals-plan.jpeg" alt="Meal Plans Icon">
          <h3>Meal Plans</h3>
          <p>Discover healthy and delicious meal plans designed to fuel your workouts and recovery.</p>
        </div>
        <div class="feature">
          <img src="assets/images/community-forum.jpeg" alt="Community Forum Icon">
          <h3>Community Forum</h3>
          <p>Connect with like-minded individuals, share your progress, and get support from our community.</p>
        </div>
      </div>
    </section>
    <section class="container">
      <h2 class="text-gradient">Success Stories</h2>
      <div class="success-stories">
        <div class="story">
          <img src="assets/images/workout-plan5.jpeg" alt="Alisha's Success Story ">
          <h3>Alisha's Story</h3>
          <p>"FitLife helped me lose 20 pounds and get in the best shape of my life!"</p>
        </div>
        <div class="story">
          <img src="assets/images/story-2.jpeg" alt="Mikes's Success Story">
          <h3>Mike's Transformation</h3>
          <p>"FitLife changed my life! I lost 30 pounds and gained muscle mass, thanks to their workout and meal plans."
          </p>
        </div>
        <div class="story">
          <img src="assets/images/workout-plan1.jpeg" alt="Lisa's Success Story ">
          <h3>Lisa's Accomplishment</h3>
          <p>"FitLife helped me get back in shape after my pregnancy. Their community forum provided the support I
            needed."</p>
        </div>
      </div>
    </section>
    <?php if (isset($_SESSION['success_message'])) : ?>
      <div class="alert success-newsletter">
        <?= $_SESSION['success_message']; ?>
      </div>
      <?php unset($_SESSION['success_message']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['error_message'])) : ?>
      <div class="alert error-newsletter">
        <?= $_SESSION['error_message']; ?>
      </div>
      <?php unset($_SESSION['error_message']); ?>
    <?php endif; ?>
    <section class="newsletter">
      <h3 class="text-gradient">Subscribe to our newsletter</h3>
      <form action="subscribe.php" method="post">
        <input type="email" name="email" placeholder="Enter your email" required>
        <button type="submit" name="subscribe">Subscribe</button>
      </form>
    </section>

  </main>

  <?php include_once 'footer.php'; ?>
</body>

</html>