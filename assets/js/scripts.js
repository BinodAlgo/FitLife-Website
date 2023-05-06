document.addEventListener("DOMContentLoaded", function () {
  // Get the navbar-toggle and navbar menu elements
  const navbarToggle = document.querySelector(".navbar-toggle");
  const navbarMenu = document.querySelector(".navbar-menu");

  // Toggle the 'show' class on the navbar menu and 'open' class on the navbar-toggle when the navbar-toggle is clicked
  navbarToggle.addEventListener("click", function () {
    navbarMenu.classList.toggle("show");
    navbarToggle.classList.toggle("open");
  });
});



// Nutrition Plans Accordion
document.querySelectorAll(".accordion-button").forEach((button) => {
  button.addEventListener("click", () => {
    // Close all other open accordions
    document.querySelectorAll(".accordion-button").forEach((otherButton) => {
      if (otherButton !== button) {
        const otherAccordionContent = otherButton.nextElementSibling;
        otherButton.classList.remove("active");
        otherAccordionContent.style.maxHeight = 0;
        otherButton.textContent = "Read more";
      }
    });

    const accordionContent = button.nextElementSibling;
    button.classList.toggle("active");

    if (button.classList.contains("active")) {
      accordionContent.style.maxHeight = accordionContent.scrollHeight + "px";
      button.textContent = "Read less";
    } else {
      accordionContent.style.maxHeight = 0;
      button.textContent = "Read more";
    }
  });
});

// Fade in alert messages
 
// Select the alert box element
let $alert = $('.alert');

// Hide the alert box after 3 seconds
setTimeout(function () {
  $alert.removeClass('show');
}, 3000);

// Add fade-out class and remove element when transition ends








