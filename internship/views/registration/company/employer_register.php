<html>
<head>
    <link rel="stylesheet" href="/internship/public/style.css">
    <link rel="stylesheet" href="/internship/plugins/home-plugins/css/bootstrap.min.css">
</head>

<body>
<main class="auth layout">

<div class="">
  <div class="">
    <div class="layout__boxHeader">
      <div class="layout__boxTitle">
        <h3>Company Registration</h3>
      </div>
      <!--https://github.com/mike-anoymass/study_budy.git-->
    </div>
    <div class="layout__body">
      <h2 class="auth__tagline">Internship Matching</h2>

      <form method="POST" id="company-data">
					<div class="row mt-3">
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">Name of Company:*</label>
								<input type="text" name="name" class="form-control" required>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1" required>Owner:*</label>
								<input type="text" name="owner" class="form-control">
							</div>
						</div>
                        <div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Company Profile:*</label>
								<textarea name="bio" class="form-control" required> </textarea>
							</div>
						</div>
					</div>
					<div class="row">
						
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Mobile No:*</label>
								<input type="text" name="phone" class="form-control" pattern="\d*" maxlength="14"
                                title="Please Enter digits" required>

							</div>
						</div>
                        <div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">Contact Email:*</label>
								<input type="email" name="contact_email" class="form-control" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Postal Address:*</label>
								<textarea name="address" class="form-control" required> </textarea>
							</div>
						</div>
                        
						<input type="hidden" value="Company"
                                name="type">
					</div>
					<div class="row">
                    <div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">Email:*</label>
								<input type="text" name="email" class="form-control" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Password:*</label>
								<input type="password" id="password" name="password" class="form-control" 
                                required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Confirm Password:*</label>
								<input type="password" id="password2" class="form-control" required>
							</div>
						</div>
                        
                    </div>
					</div>
					<div class="row">
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary px-5"
                            name="btn_save" id="btn-save" value="Register">
                        </div>
                    </div>
				</form>

      <div class="auth__action">
        <p>Already have an account?</p>
        <a href="/internship/views/login.php" class="btn btn--link">Login</a>
      </div>
    </div>
  </div>
</div>
</main>
</body>

<script src="../../../plugins/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="../../../plugins/sweetalert2/dist/sweetalert2.js"></script>

<?php include_once "../../../inc/scripts.php" ?>
<script src="../../../js/register_company.js"></script>



   
    </html>