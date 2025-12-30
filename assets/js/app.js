document.getElementById('toggleTheme').addEventListener('click', function() {
    document.body.classList.toggle('dark-mode');
    document.body.classList.toggle('light-mode');
});

const userCards = document.getElementById('userCards');
const searchInput = document.getElementById('searchInput');
const pagination = document.getElementById('pagination');

const staticUsers = [
    {"id":1,"email":"george.bluth@reqres.in","first_name":"George","last_name":"Bluth","avatar":"https://reqres.in/img/faces/1-image.jpg"},
    {"id":2,"email":"janet.weaver@reqres.in","first_name":"Janet","last_name":"Weaver","avatar":"https://reqres.in/img/faces/2-image.jpg"},
    {"id":3,"email":"emma.wong@reqres.in","first_name":"Emma","last_name":"Wong","avatar":"https://reqres.in/img/faces/3-image.jpg"},
    {"id":4,"email":"eve.holt@reqres.in","first_name":"Eve","last_name":"Holt","avatar":"https://reqres.in/img/faces/4-image.jpg"},
    {"id":5,"email":"charles.morris@reqres.in","first_name":"Charles","last_name":"Morris","avatar":"https://reqres.in/img/faces/5-image.jpg"},
    {"id":6,"email":"tracey.ramos@reqres.in","first_name":"Tracey","last_name":"Ramos","avatar":"https://reqres.in/img/faces/6-image.jpg"}
];

let filteredUsers = [...staticUsers];
let currentPage = 1;
const usersPerPage = 3;

function displayUsersPage(page = 1){
    currentPage = page;
    const start = (page - 1) * usersPerPage;
    const end = start + usersPerPage;
    const usersToShow = filteredUsers.slice(start, end);

    // Clear current cards with smooth fade-out
    const cards = document.querySelectorAll('#userCards .card');
    cards.forEach(card => card.classList.remove('show'));
    setTimeout(() => {
        userCards.innerHTML = '';
        if(usersToShow.length === 0){
            userCards.innerHTML = `<div class="col-12 text-danger">No users found.</div>`;
            pagination.innerHTML = '';
            return;
        }

        usersToShow.forEach(user => {
            const card = document.createElement('div');
            card.classList.add('col-md-4');
            card.innerHTML = `
                <div class="card">
                    <img src="${user.avatar}" class="card-img-top" alt="${user.first_name}">
                    <div class="card-body">
                        <h5 class="card-title">${user.first_name} ${user.last_name}</h5>
                        <p class="card-text cardtext-search">${user.email}</p>
                    </div>
                </div>
            `;
            userCards.appendChild(card);
            setTimeout(() => card.querySelector('.card').classList.add('show'), 50);
        });

        // Pagination
        const totalPages = Math.ceil(filteredUsers.length / usersPerPage);
        pagination.innerHTML = '';
        for(let i = 1; i <= totalPages; i++){
            const li = document.createElement('li');
            li.classList.add('page-item');
            if(i === currentPage) li.classList.add('active');
            li.innerHTML = `<a class="page-link">${i}</a>`;
            li.addEventListener('click', () => displayUsersPage(i));
            pagination.appendChild(li);
        }
    }, 200); // fade-out duration
}

// Search filter
searchInput.addEventListener('input', () => {
    const filter = searchInput.value.toLowerCase();
    filteredUsers = staticUsers.filter(u =>
        u.first_name.toLowerCase().includes(filter) ||
        u.last_name.toLowerCase().includes(filter) ||
        u.email.toLowerCase().includes(filter)
    );
    displayUsersPage(1);
});

// Initial display
displayUsersPage(1);

// Prevent page reload and scroll
/* ===============================
   REAL-TIME FORM VALIDATION
================================ */
const form = document.getElementById('userForm');

const nameInput = document.getElementById('name');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');

const nameError = document.getElementById('nameError');
const emailError = document.getElementById('emailError');
const passwordError = document.getElementById('passwordError');

// Name
nameInput.addEventListener('input', () => {
    nameError.textContent = nameInput.value.trim() === ''
        ? 'Name is required'
        : '';
});

// Email
emailInput.addEventListener('input', () => {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    emailError.textContent = emailRegex.test(emailInput.value)
        ? ''
        : 'Invalid email format';
});

// Password
passwordInput.addEventListener('input', () => {
    passwordError.textContent = passwordInput.value.length < 6
        ? 'Minimum 6 characters required'
        : '';
});


/* ===============================
   SUBMIT HANDLER (NO SCROLL)
================================ */
form.addEventListener('submit', function(e) {
    e.preventDefault(); // ❌ stop reload + scroll

    let hasErrors = false;

    // Re-check on submit
    if(nameInput.value.trim() === ''){
        nameError.textContent = 'Name is required';
        hasErrors = true;
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if(!emailRegex.test(emailInput.value)){
        emailError.textContent = 'Invalid email format';
        hasErrors = true;
    }

    if(passwordInput.value.length < 6){
        passwordError.textContent = 'Minimum 6 characters required';
        hasErrors = true;
    }

    if(hasErrors) return; // ⛔ stop submit

    // ✅ Submit via AJAX (keep page position)
    const formData = new FormData(form);

    fetch(window.location.href, {
        method: 'POST',
        body: formData
    })
    .then(res => res.text())
    .then(() => {
        // Clear form ONLY on success
        form.reset();
        nameError.textContent = '';
        emailError.textContent = '';
        passwordError.textContent = '';
        alert('Form submitted successfully!');
    })
    .catch(err => console.error(err));
});


// profile card
document.addEventListener("DOMContentLoaded", function () {
    const profileCard = document.querySelector('.profile-card');
    if (profileCard) {
        profileCard.classList.add('show');
    }
});

// on page load animate

// Scroll animation
const animateElements = document.querySelectorAll('.animate-on-scroll');

const observer = new IntersectionObserver((entries, observer) => {
  entries.forEach(entry => {
    if(entry.isIntersecting){
      entry.target.classList.add('show');
      observer.unobserve(entry.target); // animate only once
    }
  });
}, { threshold: 0.1 });

animateElements.forEach(el => observer.observe(el));

// on pageload spinner
window.addEventListener('load', () => {
    const preloader = document.getElementById('preloader');
    preloader.style.opacity = '0';
    preloader.style.transition = 'opacity 0.5s ease';
    setTimeout(() => preloader.style.display = 'none', 500);
});