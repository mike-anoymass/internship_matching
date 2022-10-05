<?php 
    $usr = new UserView;
    $user = $usr->get($company['id']);
?>

<html>
<head>
    <link rel="stylesheet" href="/internship/public/style.css">
    <link rel="stylesheet" href="/internship/plugins/home-plugins/css/bootstrap.min.css">
</head>

<body>
<main class="auth layout">

<div class="">
  <div class="">
    <div class="layout__body">

      <form method="POST" id="company-data">
					<div class="row mt-3">
                        <input type="hidden" name="company_id" value="<?php echo $user['id'] ?>" >
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">Name of Company:*</label>
								<input type="text" name="name" value="<?php echo $company['name'] ?>" class="form-control" required>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1" required>Owner:*</label>
								<input type="text" name="owner" value="<?php echo $company['owner'] ?>"  class="form-control">
							</div>
						</div>
                        <div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Company Profile:*</label>
								<textarea name="bio" class="form-control" required> 
                                <?php echo $company['profile'] ?>
                                </textarea>
							</div>
						</div>
					</div>
					<div class="row">
						
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Mobile No:*</label>
								<input type="text" name="phone" class="form-control" pattern="\d*" maxlength="14"
                                title="Please Enter digits" value="<?php echo $company['phone'] ?>" required>

							</div>
						</div>
                        <div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">Contact Email:*</label>
								<input type="email" name="contact_email" class="form-control"
                                value="<?php echo $company['email'] ?>" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Postal Address:*</label>
								<textarea name="address" class="form-control" required> 
                                    <?php echo $company['postal_address'] ?>
                                </textarea>
							</div>
						</div>
                        
						<input type="hidden" value="Company"
                                name="type">
					</div>
					<div class="row">
                    <div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">Email:*</label>
								<input type="email" name="email" class="form-control"
                                value="<?php echo $user['email']  ?>" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Password:*</label>
								<input type="password" id="password" name="password"
                                value="<?php echo $user['password']  ?>" class="form-control" 
                                required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Confirm Password:*</label>
								<input type="password" id="password2"
                                value="<?php echo $user['password']  ?>" class="form-control" required>
							</div>
						</div>
                        
                    </div>
					</div>
					<div class="row">
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary px-5"
                            name="btn_save" id="account-update" value="Update">
                        </div>
                    </div>
				</form>
    </div>
  </div>
</div>
</main>
</body>
</html>