<?php
    $categ = new CategoryView();
    $categories = $categ->getAll();
?>

<main class="auth layout">

<div class="">
  <div class="">
    <div class="layout__boxHeader">
      <div class="layout__boxTitle">
        <h4>
            <a class="text-danger" title="Back to Vacancies" href="index.php?view=jobs">
                <i class="fa fa-arrow-left"></i>
            </a>
            | Vacancy Registration Form
        </h4>
        <hr>
      </div>
      <!--https://github.com/mike-anoymass/study_budy.git-->
    </div>
    <div class="layout__body">

      <form method="POST" id="vacancy-data">
					<div class="row mt-3">
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">Title of the Post:*</label>
								<input type="text" name="title" class="form-control" required>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1" required>Brief Description:*</label>
								<textarea name="description" class="form-control" required></textarea>
							</div>
						</div>

                        <div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">Location:*</label>
								<input type="text" name="location" class="form-control" required>
							</div>
						</div>
					</div>
					<div class="row">

                    <div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Category:*</label>
								<input type="text" name="category" class="form-control" list="topic-list" required>
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
								<label for="exampleInputPassword1">Employment Type:*</label>
								<input type="text" name="type" class="form-control" list="type-list" required>
                                <datalist id="type-list">
                                    <select>
                                        <option>Full Time</option>
                                        <option>Part Time</option>
                                    </select>
                                </datalist>
                            </div>
						</div>
						
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Salary:</label>
								<input type="text" name="salary" class="form-control" pattern="\d*" maxlength="14"
                                title="Please Enter digits">
							</div>
						</div>
					</div>

					<div class="row">
                        <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputPassword1" required>Duties:*</label>
                                    <textarea name="duties" class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputPassword1" required>Skills:*</label>
                                    <textarea name="skills" class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputPassword1" required>Qualifications:*</label>
                                    <textarea name="qua" class="form-control" required></textarea>
                                </div>
                            </div>
					</div>

                    <div class="row">
                        <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputPassword1" required>Other Information:</label>
                                    <textarea name="info" class="form-control"></textarea>
                                </div>
                            </div>
                        <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputPassword1" required>Closing Date:*</label>
                                    <input type="text" name="date" class="form-control">
                                </div>
                            </div>
                    </div>

					<div class="row">
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary px-5"
                             id="save-vacancy" value="Save">
                        </div>
                    </div>
				</form>
    </div>
  </div>
</div>
</main>
