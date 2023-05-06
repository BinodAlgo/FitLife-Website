<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FAQ</title>
  <?php include_once 'favicon.php' ?>
  <link rel="stylesheet" href="assets/css/faq.css">
  <script src="https://kit.fontawesome.com/adc549ef6b.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="back-to-home" id="backArrow">
    <span>&leftarrow;</span>
  </div>
  <h1 class="text-gradient">Frequently Asked Questions</h1>
  <div class="accordion">
    <div class="accordion-item">
      <button class="accordion-button">
        <span>What services do you provide?</span>
        <i class="fas fa-plus"></i>
        <i class="fas fa-minus" style="display: none;"></i>
      </button>
      <div class="accordion-content">
        <p>We provide a variety of services, including workout plans, nutrition guides, community support, and
          personalized
          coaching.</p>
      </div>
    </div>

    <div class="accordion-item">
      <button class="accordion-button">
        <span>Do I need any equipment to follow the workout plans?</span>
        <i class="fas fa-plus"></i>
        <i class="fas fa-minus" style="display: none;"></i>
      </button>
      <div class="accordion-content">
        <p>Some of our workout plans require equipment, while others are designed for bodyweight exercises. Each plan
          will
          specify the equipment needed, if any. We also offer alternatives for exercises that require equipment, so you
          can
          still complete the workouts without it.</p>
      </div>
    </div>

    <div class="accordion-item">
      <button class="accordion-button">
        <span>Can I customize my nutrition plan based on dietary restrictions or preferences?</span>
        <i class="fas fa-plus"></i>
        <i class="fas fa-minus" style="display: none;"></i>
      </button>
      <div class="accordion-content">
        <p>Yes, our nutrition plans can be customized to accommodate dietary restrictions and preferences. When you sign
          up,
          you can provide information about your dietary needs, and our team will create a plan tailored to your
          requirements.</p>
      </div>
    </div>

    <div class="accordion-item">
      <button class="accordion-button">
        <span>How do I access the community forum?</span>
        <i class="fas fa-plus"></i>
        <i class="fas fa-minus" style="display: none;"></i>
      </button>
      <div class="accordion-content">
        <p>Our community forum is available to all registered members. Once you sign up and log in to your account, you
          can
          access the forum from the main navigation menu. There, you can connect with other members, share your
          experiences,
          and ask questions.</p>
      </div>
    </div>

    <div class="accordion-item">
      <button class="accordion-button">
        <span>Do you offer refunds if I'm not satisfied with the service?</span>
        <i class="fas fa-plus"></i>
        <i class="fas fa-minus" style="display: none;"></i>
      </button>
      <div class="accordion-content">
        <p>We strive to ensure that our members are satisfied with our services. If you're not happy with your
          experience,
          please contact our support team, and we'll work with you to address any concerns. If we cannot resolve the
          issue,
          we may offer a refund on a case-by-case basis.</p>
      </div>
    </div>

    <div class="accordion-item">
      <button class="accordion-button">
        <span>Can I pause or cancel my membership at any time?</span>
        <i class="fas fa-plus"></i>
        <i class="fas fa-minus" style="display: none;"></i>
      </button>
      <div class="accordion-content">
        <p>Yes, you can pause or cancel your membership at any time. To do so, log in to your account, navigate to your
          account settings, and follow the instructions for pausing or canceling your membership. Ifyou need assistance,
          please contact our support team.</p>
      </div>
    </div>
    <div class="accordion-item">
      <button class="accordion-button">
        <span>How often are workout plans and nutrition guides updated?</span>
        <i class="fas fa-plus"></i>
        <i class="fas fa-minus" style="display: none;"></i>
      </button>
      <div class="accordion-content">
        <p>Our workout plans and nutrition guides are updated regularly to keep them fresh, engaging, and aligned with
          the
          latest fitness and nutrition research. You can expect new content to be added every few weeks or months,
          depending
          on the specific plan or guide.</p>
      </div>
    </div>
    <div class="accordion-item">
      <button class="accordion-button">
        <span>What support is available if I have questions or need help?</span>
        <i class="fas fa-plus"></i>
        <i class="fas fa-minus" style="display: none;"></i>
      </button>
      <div class="accordion-content">
        <p>We offer multiple support channels to assist you with any questions or concerns. You can reach out to our
          support
          team via email, live chat, or the community forum. Our team is available to help with technical issues,
          account
          management, workout and nutrition advice, and more.</p>
      </div>
    </div>
    <div class="accordion-item">
      <button class="accordion-button">
        <span>Are the workout plans suitable for beginners?</span>
        <i class="fas fa-plus"></i>
        <i class="fas fa-minus" style="display: none;"></i>
      </button>
      <div class="accordion-content">
        <p>Yes, our workout plans cater to various fitness levels, including beginners. When you sign up, you can select
          your current fitness level, and our team will provide you with a plan that matches your needs. As you
          progress,
          you can move on to more advanced workout plans.</p>
      </div>
    </div>
    <div class="accordion-item">
      <button class="accordion-button">
        <span>How do I track my progress and achievements?</span>
        <i class="fas fa-plus"></i>
        <i class="fas fa-minus" style="display: none;"></i>
      </button>
      <div class="accordion-content">
        <p>Within your account, you will have access to a progress dashboard that helps you track your workouts,
          nutrition,
          and overall fitness improvements. You can log your workout and nutrition information, view charts and graphs
          that
          display your progress, and earn achievements for reaching milestones.</p>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const accordionButtons = document.querySelectorAll('.accordion-button');

      accordionButtons.forEach(button => {
        button.addEventListener('click', () => {
          const content = button.nextElementSibling;

          button.classList.toggle('active');
          content.classList.toggle('show');

          const plusIcon = button.querySelector('.fa-plus');
          const minusIcon = button.querySelector('.fa-minus');

          if (content.classList.contains('show')) {
            plusIcon.style.display = 'none';
            minusIcon.style.display = 'inline';
          } else {
            plusIcon.style.display = 'inline';
            minusIcon.style.display = 'none';
          }
        });
      });
    });


  </script>
</body>

</html>