<?php include "template/header.php"; ?>

<div class="container">
	<div class="row min-vh-100 justify-content-center align-items-center">
		<div class="col-5">
       <?php
       if (isset($_POST['saveBtn'])){
          createContact();
       }
       ?>
			<form action="" method="post" enctype="multipart/form-data">
				<div class="d-flex justify-content-between align-items-end">
					<h4 class="mb-0">
						<i class="fas fa-plus-circle text-primary"></i> Add New Contact
					</h4>
					<button class="btn btn-primary" name="saveBtn">Save</button>
				</div>
				<hr>



				<!--For Photo Upload Validation-->
				<div class="mb-3 row">
					<label for="upload" class="col-sm-2 col-form-label"><i class="fas fa-image"></i></label>
					<div class="col-sm-10">
						<input type="file" class="form-control" id="upload" name="upload" value="" accept="image/png, image/jpeg">
					</div>
				</div>

				<!--For Name Validation-->
				<div class="mb-3 row">
					<label class="col-sm-2 col-form-label"><i class="fas fa-user"></i></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="user_name" value="" placeholder="Your name">
					</div>
				</div>

				<!--For Email Validation-->
				<div class="mb-3 row">
					<label for="email" class="col-sm-2 col-form-label"><i class="fas fa-envelope"></i></label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="email" name="email" value="" placeholder="Email">
					</div>
				</div>

				<!--For Phone Validation-->
				<div class="mb-3 row">
					<label for="phone" class="col-sm-2 col-form-label"><i class="fas fa-phone-alt"></i></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="phone" name="phone" value="" placeholder="Phone">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>




<?php include "template/footer.php"; ?>