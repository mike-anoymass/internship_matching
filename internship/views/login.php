<?php 
    include_once "classAutoload.php";
    Session::start();
    if(Session::get("userVars")){
        if(Session::get("userVars","type") === "Applicant" ){
            header("Location: intern/index.php?views=appliedjobs");
        }else {
            header("Location: company/index.php?views=jobs");
        }   
    }
?>


<html>
<head>
    <link rel="stylesheet" href="../public/style.css">
</head>

<body>
<main class="auth layout">

<div class="container">
  <div class="layout__box">
    <div class="layout__boxHeader">
      <div class="layout__boxTitle">
        <h3>Login</h3>
      </div>
      <!--https://github.com/mike-anoymass/study_budy.git-->
    </div>
    <div class="layout__body">
      <h2 class="auth__tagline">Internship Matching</h2>

      <form class="form" action="" method="POST" id="data">
        <div class="form__group form__group">
          <label for="room_name">Email*</label>
          <input name="email" type="email" placeholder="e.g. johndoe@gmail.com"  required/>
        </div>
        <div class="form__group">
          <label for="password">Password*</label>
          <input
            id="password"
            name="password"
            type="password"
            placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;"
            required
          />
        </div>

        <button class="btn btn--main" type="submit" id="login">
          <svg
            version="1.1"
            xmlns="http://www.w3.org/2000/svg"
            width="32"
            height="32"
            viewBox="0 0 32 32"
          >
            <title>lock</title>
            <path
              d="M27 12h-1v-2c0-5.514-4.486-10-10-10s-10 4.486-10 10v2h-1c-0.553 0-1 0.447-1 1v18c0 0.553 0.447 1 1 1h22c0.553 0 1-0.447 1-1v-18c0-0.553-0.447-1-1-1zM8 10c0-4.411 3.589-8 8-8s8 3.589 8 8v2h-16v-2zM26 30h-20v-16h20v16z"
            ></path>
            <path
              d="M15 21.694v4.306h2v-4.306c0.587-0.348 1-0.961 1-1.694 0-1.105-0.895-2-2-2s-2 0.895-2 2c0 0.732 0.413 1.345 1 1.694z"
            ></path>
          </svg>

          Login
        </button>
      </form>

      <div class="auth__action">
        <p>Haven't registered yet?</p>
        <a href="#" class="btn btn--link" id="signUp">Register</a>
        <hr>
        <a href="/internship/" class="btn btn--link">View Site</a>
      </div>
    </div>
  </div>
</div>
</main>
</body>

<script src="../plugins/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="../plugins/sweetalert2/dist/sweetalert2.js"></script>

<?php include_once "../inc/scripts.php" ?>
<script src="../js/login.js"></script>



   
    </html>