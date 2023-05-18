<?php
session_start();
?>
<header>
  <nav class="navbar">
    <div class="navbar-brand">
      <h2 class="brand-title">FitLife</h2>
      <a href="index.php"><img src="assets/images/fitness-logo.png" alt="brand logo" class="logo"></a>
    </div>
    <ul class="navbar-menu">
      <li><a href="index.php">Home</a></li>
      <li><a href="workout_plans.php">Workout Plans</a></li>
      <li><a href="nutrition_plans.php">Nutrition Plans</a></li>
      <li><a href="community_forum.php">Community Forum</a></li>
      <?php if(isset($_SESSION['user_id'])) :?>
      <li><a href="logout.php">Logout</a></li>
      <?php else :?>
      <li><a href="authenticate.php">Login</a></li>
      <?php endif ?>
      <li><a href="authenticate.php">Register</a></li>
    </ul>
    <button class="navbar-toggle" type="button">
      <span class="toggle-bar"></span>
      <span class="toggle-bar"></span>
      <span class="toggle-bar"></span>
    </button>
  </nav>
</header>