<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 5 Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<div id="userGrid" class="grid"></div>

<script>
fetch('<?= base_url("users/fetch_users") ?>')
.then(res => res.json())
.then(data => {
  data.data.forEach(user => {
    document.getElementById('userGrid').innerHTML += `
      <div class="card">
        <img src="${user.avatar}">
        <h4>${user.first_name} ${user.last_name}</h4>
        <p>${user.email}</p>
      </div>`;
  });
});
</script>
<button onclick="toggleTheme()">Toggle Theme</button>

<script>
function toggleTheme() {
  document.body.classList.toggle('dark');
}
</script>
<form id="signupForm">
  <input type="text" id="name" placeholder="Name">
  <span id="nameErr"></span>

  <input type="email" id="email" placeholder="Email">
  <span id="emailErr"></span>

  <input type="password" id="password" placeholder="Password">
  <span id="passErr"></span>
</form>

<script>
document.getElementById('email').addEventListener('input', function(){
  document.getElementById('emailErr').innerText =
    this.value.includes('@') ? '' : 'Invalid Email';
});
</script>
<div class="profile-card">
  <img src="https://via.placeholder.com/150">
  <h3>Jitesh Lawande</h3>
  <p>Frontend / PHP Developer</p>
</div>
<div class="accordion">
  <button class="acc-btn">Section 1</button>
  <div class="acc-content">Content 1</div>

  <button class="acc-btn">Section 2</button>
  <div class="acc-content">Content 2</div>
</div>

<script>
document.querySelectorAll('.acc-btn').forEach(btn => {
  btn.onclick = () => btn.nextElementSibling.classList.toggle('show');
});
</script>

	</body>
</html>