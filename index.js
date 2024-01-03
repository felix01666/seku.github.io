//Header
//Navigation panel
// Get the navigation links
const navLinks = document.querySelectorAll('nav a');

// Add event listeners to each link
navLinks.forEach(link => {
  link.addEventListener('click', handleClick);
});

// Function to handle click events
function handleClick(event) {
  // Prevent the default link behavior
  event.preventDefault();

  // Remove the active class from all links
  navLinks.forEach(link => {
    link.classList.remove('active');
  });

  // Add the active class to the clicked link
  event.target.classList.add('active');
}

// Get the navigation menu element
const menu = document.getElementById("menu");

// Get the toggle button element
const toggleButton = document.getElementById("toggle-button");

// Add event listener for toggle button click
toggleButton.addEventListener("click", function() {
  // Toggle the "active" class on the navigation menu element
  menu.classList.toggle("active");
});
//>>>>>>End 


//HERO SECTION
// Get the hero element
const hero = document.querySelector('.hero');

// Set the height of the hero element to the viewport height
function setHeroHeight() {
  hero.style.height = window.innerHeight + 'px';
}

// Call the setHeroHeight function on page load and window resize
window.addEventListener('load', setHeroHeight);
window.addEventListener('resize', setHeroHeight);
//>>>>>>End


//FOOTER SECTION
// Get the footer element
const footer = document.querySelector('footer');

// Get the navigation links in the footer
const footerNavLinks = footer.querySelectorAll('nav ul li a');

// Add a click event listener to each link
footerNavLinks.forEach(link => {
  link.addEventListener('click', (e) => {
    // Prevent the default link behavior
    e.preventDefault();

    // Get the href attribute of the clicked link
    const sectionId = link.getAttribute('href').substr(1);

    // Scroll to the corresponding section
    document.getElementById(sectionId).scrollIntoView({
      behavior: 'smooth'
    });
  });
});

// Get the email and phone elements
const email = document.getElementById('email');
const phone = document.getElementById('phone');

// Add a click event listener to the email element
email.addEventListener('click', () => {
  alert('Email us at info@sekuguesthouse.com');
});

// Add a click event listener to the phone element
phone.addEventListener('click', () => {
  alert('Call us at +254-XXX-XXX-XXX');
});



