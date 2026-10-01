// Toggle class active
const navbarNav = document.querySelector('.navbar-nav');

// ketika hamburger menu di klik
document.querySelector('#hamburger-menu').onclick = () => {
  navbarNav.classList.toggle('active');
};

// klik di luar sidebar untuk hilangkan navbar
const hamburger = document.querySelector('#hamburger-menu');

document.addEventListener('click', function (e) {
  if (!hamburger.contains(e.target) && !navbarNav.contains(e.target)) {
    navbarNav.classList.remove('active');
  }
});

// carousel banners
const track = document.getElementById('track');
const slides = document.querySelectorAll('.slide');
const dotsContainer = document.getElementById('dots');
let index = 0;
let autoplayTimer;

slides.forEach((_, i) => {
  const dot = document.createElement('div');
  dot.classList.add('dot');
  if (i === 0) dot.classList.add('active');
  dot.onclick = () => goTo(i);
  dotsContainer.appendChild(dot);
});
const dots = document.querySelectorAll('.dot');

function update() {
  track.style.transform = `translateX(-${index * 100}%)`;
  dots.forEach((d) => d.classList.remove('active'));
  dots[index].classList.add('active');
}
function move(dir) {
  index = (index + dir + slides.length) % slides.length;
  update();
  resetAutoplay();
}
function goTo(i) {
  index = i;
  update();
  resetAutoplay();
}
function startAutoplay() {
  autoplayTimer = setInterval(() => move(1), 3500);
}
function resetAutoplay() {
  clearInterval(autoplayTimer);
  startAutoplay();
}

startAutoplay();
