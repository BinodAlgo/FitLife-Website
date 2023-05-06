<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include_once 'favicon.php' ?>
  <title>FitLife - Workout Plans</title>
  <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
  <?php include_once 'header.php'; ?>

  <main>
    <section class="workout-plans">
      <h1 class="text-gradient">Workout Plans</h1>
      <p>Discover a variety of workout plans tailored to your fitness goals. Whether you're looking to lose weight,
        build muscle, or simply maintain a healthy lifestyle, our expertly designed plans will help you achieve the
        results you desire.</p>

      <div class="workout-plan-cards">
        <!-- Example workout plan card -->
        <div class="workout-plan-card">
          <img src="assets/images/full-body-workout.jpeg" alt="Workout Plan - Full body workout">
          <h2>Beginner Full Body Workout</h2>
          <p>This beginner-friendly workout plan focuses on building a strong foundation for your fitness journey. The
            program consists of a mix of cardio and strength training exercises that target major muscle groups for a
            balanced and effective full-body workout.</p>
          <a href="https://nothingbarredfitness.com/the-perfect-workout-plan-for-beginners/" class="workout-plan-link">Learn More</a>
        </div>
        <div class="workout-plan-card">
          <img src="assets/images/hiit-workout.jpeg" alt="Workout Plan - HIIT for fat loss">
          <h2>HIIT for Fat Loss</h2>
          <p>High-Intensity Interval Training (HIIT) is an effective workout plan for burning fat and improving cardiovascular
            fitness. This program combines short, intense bursts of exercise followed by brief recovery periods to keep your heart
            rate elevated and maximize calorie burn.</p>
          <a href="https://www.healthifyme.com/blog/10-best-hiit-cardio-workout-for-weight-loss/" class="workout-plan-link">Learn More</a>
        </div>
        <div class="workout-plan-card">
          <img src="assets/images/strength-and-power.jpeg" alt="Workout Plan - Strength and Power">
          <h2>Strength and Power</h2>
          <p>This workout plan is designed to help you increase strength and power through compound exercises targeting major muscle
            groups. It incorporates a mix of heavy and light resistance training, plyometrics, and functional movements to build
            lean muscle and improve overall athleticism.</p>
          <a href="https://fitbod.me/blog/strength-vs-power/" class="workout-plan-link">Learn More</a>
        </div>
        <div class="workout-plan-card">
          <img src="assets/images/Yoga-and-flexibility.jpeg" alt="Workout Plan - Yoga">
          <h2>Yoga and Flexibility</h2>
          <p>Enhance your flexibility, balance, and mindfulness with this comprehensive yoga program. Incorporating various styles of
            yoga, including Hatha, Vinyasa, and Yin, this plan focuses on increasing range of motion, reducing stress, and improving
            mental clarity.</p>
          <a href="https://www.yogabasics.com/connect/yoga-blog/yoga-for-flexibility/" class="workout-plan-link">Learn More</a>
        </div>
        <div class="workout-plan-card">
          <img src="assets/images/body-weight-circuit.jpeg" alt="Workout Plan - Bodyweight">
          <h2>Bodyweight Circuit Training</h2>
          <p>No gym? No problem! This bodyweight circuit training program is perfect for those with limited equipment or looking for
            a workout they can do anywhere. The plan includes a variety of functional movements, core exercises, and plyometrics to
            build strength, endurance, and agility without the need for weights.</p>
          <a href="https://www.trainerize.com/blog/full-body-circuit-workout-an-example-and-the-benefits/" class="workout-plan-link">Learn More</a>
        </div>
        <div class="workout-plan-card">
          <img src="assets/images/core-and-stability.jpeg" alt="Workout Plan  - core and stability">
          <h2>Core and Stability</h2>
          <p>Strengthen your core and improve stability with this targeted workout plan. The program focuses on exercises that engage
            the entire core, including the abdominal, lower back, and oblique muscles, to enhance balance, posture, and overall
            athletic performance.</p>
          <a href="https://blog.nasm.org/progressive-core-training" class="workout-plan-link">Learn More</a>
        </div>
        <!-- Add more workout plan cards here -->
      </div>
    </section>
  </main>

  <?php include_once 'footer.php'; ?>
  <script>
    Array.from(document.links).forEach(anchor => {
      if (anchor.classList.contains('workout-plan-link'))
        anchor.target = "_blank";
    });
  </script>
</body>

</html>