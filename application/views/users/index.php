<html lang="en">
<head>
<meta charset="UTF-8">
<title>Frontend Developer Assignment</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<link href='https://fonts.googleapis.com/css?family=Aoboshi One' rel='stylesheet'>

<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">


<style>



</style>
</head>
<body class="light-mode">
<div id="preloader">
  <div class="spinner">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-xl-12 mt-3">
<div class="theme-toggle animate-on-scroll" id="toggleTheme">
  <div class="toggle-knob"></div>
  <span class="light-label">Light</span>
  <span class="dark-label">Dark</span>
</div>
</div>
</div>
<section class="mb-5 mt-5">
<h2 class="head-2 text-center animate-on-scroll">Search User</h2>
<input type="text" id="searchInput" class="form-control mb-3 mt-3" placeholder="Search users...">
<div class="row animate-on-scroll" id="userCards"></div>
<ul class="pagination" id="pagination"></ul>
</section>

<section class="mb-5" id="userFormSection">
<h2 class="head-2 text-center animate-on-scroll">User form</h2>
<div class="row">
    <div class="col-11 col-sm-10 col-md-7 col-lg-6 col-xl-5 mx-auto form-back animate-on-scroll">
<?php if ($success): ?>
<div class="alert alert-success"><?= $success ?></div>
<?php endif; ?>
<form method="POST" id="userForm" novalidate>
<div class="mb-3 text-center">
  <label class="form-label">Name</label>
  <input type="text" name="name" id="name" class="form-control">
  <div class="error" id="nameError"></div>
</div>


<div class="mb-3 text-center">
  <label class="form-label">Email</label>
  <input type="email" name="email" id="email" class="form-control">
  <div class="error" id="emailError"></div>
</div>

<div class="mb-3 text-center">
  <label class="form-label">Password</label>
  <input type="password" name="password" id="password" class="form-control">
  <div class="error" id="passwordError"></div>
</div>
<button class="btn btn-success w-100 mt-4" style="border-radius: 20px;">Submit</button>
</form>
</div>
</div>
</section>

<section class="mb-5 text-center">
  <h2 class="head-2 text-center animate-on-scroll">Profile Card</h2>

  <div class="card profile-card mx-auto mt-3 animate-on-scroll">
    <!-- Photo -->
    <div class="card-body">
      <!-- Name -->
      <h5 class="card-title">John Doe</h5>
<img
  src="https://randomuser.me/api/portraits/men/32.jpg"
  class="profile-avatar"
  alt="Profile Photo"
/>
      <!-- Short Bio -->
      <p class="card-text" style="font-size: 1rem; font-weight: 400; color:#333">
        Passionate frontend developer who loves crafting clean,
        responsive, and user-friendly web experiences.
      </p>
    </div>
  </div>
</section>



<section class="mb-5">
  <h2 class="head-2 text-center animate-on-scroll">Accordion Menu</h2>

  <div class="accordion accordion-flush mt-3 animate-on-scroll" id="customAccordion">

    <!-- Item 1 -->
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#sectionOne">
          Section One
        </button>
      </h2>
      <div id="sectionOne" class="accordion-collapse collapse">
        <div class="accordion-body">
          Content for Section One. You can place text, lists, or links here.
        </div>
      </div>
    </div>

    <!-- Item 2 -->
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#sectionTwo">
        Section Two
        </button>
      </h2>
      <div id="sectionTwo" class="accordion-collapse collapse">
        <div class="accordion-body">
          Content for Section Two. This section can open together with others.
        </div>
      </div>
    </div>

    <!-- Item 3 -->
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#sectionThree">
          Section Three
        </button>
      </h2>
      <div id="sectionThree" class="accordion-collapse collapse">
        <div class="accordion-body">
          Content for Section Three. Fully responsive and animated.
        </div>
      </div>
    </div>

  </div>
</section>


</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>


</script>
<script src="<?= base_url('assets/js/app.js') ?>"></script>

</body>
</html>