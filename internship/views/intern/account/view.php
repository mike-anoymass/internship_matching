<?php 
    $usr = new UserView;
    $user = $usr->get($applicant['id']);

    $categ = new CategoryView();
    $categories = $categ->getAll();
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

      <form method="POST" id="intern-data" enctype="multipart/form-data">
					<div class="row mt-3">
						<div class="col-md-4">
                            <input type="hidden" value="<?php echo $applicant['id'] ?>" name="id">
							<div class="form-group">
								<label for="exampleInputEmail1">First Name:*</label>
								<input type="text" name="first_name" class="form-control"
                                value="<?php echo $applicant['firstname'] ?>" required>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1" required>Last Name:*</label>
								<input type="text" name="last_name" class="form-control"
                                value="<?php echo $applicant['lastname'] ?>">
							</div>
						</div>
                        <input type="hidden" id="gender" value="<?php echo $applicant['gender'] ?>">
                        <div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Gender:</label>
                                
								<select id="gender-select" name="gender" class="form-control" required>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Mobile No:*</label>
								<input type="number" name="phone" class="form-control"
                                value="<?php echo $applicant['phone'] ?>" required>
							</div>
						</div>
                        <div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">Program of Study:*</label>
								<input type="text" name="prg" class="form-control" 
                                value="<?php echo $applicant['program'] ?>" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Graduation Year:*</label>
								<input type="number" name="year" value="<?php echo $applicant['graduation_year'] ?>"
                                 class="form-control">
							</div>
						</div>
                        <div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Field Of Study:*</label>
								<input type="text" name="category" class="form-control" list="topic-list"
                                value="<?php echo $applicant['field']  ?>" required>
                                <datalist id="topic-list">
                                    <select id="room_topic">
                                        <?php 
                                            if ($categories) {
                                                foreach($categories as $category){
                                                    echo "<option>".$category['name']."</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </datalist>
                            </div>
						</div>
                        <div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Your Bio:*</label>
								<textarea name="bio" class="form-control" required> 
                                    <?php echo $applicant['about']  ?>
                                </textarea>
							</div>
						</div>
						<input type="hidden" value="Applicant"
                                name="type">
                         <div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Upload your CV:*</label>
								<input type="file" name="resume"  class="form-control" 
                                accept=".pdf,.docx,.doc">
                                <input type="hidden"  value="<?php echo $applicant['cv']  ?>" name="cv_path">
							</div>
                            <input name="MAX_FILE_SIZE" type=
                                "hidden" value="1000000">
						</div>

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
								<input type="password" id="password" name="password" class="form-control" 
                                value="<?php echo $user['password']  ?>" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Confirm Password:*</label>
								<input type="password" id="password2" class="form-control"
                                value="<?php echo $user['password']  ?>" required>
							</div>
						</div>

                       

                        
                    </div>
					</div>
					<div class="row">
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary px-5"
                            name="btn_save" id="applicant-update" value="Update">
                        </div>
                    </div>
				</form>

    </div>
  </div>
</div>
</main>
</body>
 
</html>