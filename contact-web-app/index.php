<?php include "template/header.php"?>

<section class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="d-flex justify-content-between align-items-center mt-5 mb-3">
							<div class="">
								<h1>Contact</h1>
							</div>
							<div class="">
								<a href="add_new_contact.php" class="btn btn-sm btn-outline-primary">
									<i class="fas fa-upload"></i>
									Upload
								</a>
							</div>
						</div>
						<hr>

						<table class="table table-hover table-striped table-bordered">
							<thead>
							<tr>
								<th>#</th>
								<th>Photo</th>
								<th>Name</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Created_at</th>
							</tr>
							</thead>

							<tbody>
							<?php foreach (contactDetails() as $contactDetail){ ?>
							<tr class="">
								<td><?php echo $contactDetail['id'];?></td>
								<td>
									<div class="show-photo">
										<img src="<?php echo !empty($contactDetail['photo'])? ' ' . $contactDetail['photo']: 'upload/default.png';?>" alt="">
									</div>

								</td>
								<td><?php echo $contactDetail['user_name'];?></td>
								<td><?php echo $contactDetail['email'];?></td>
								<td><?php echo $contactDetail['phone'];?></td>
								<td><?php echo showTime($contactDetail['created_at']);?></td>
							</tr>
							<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
<?php include "template/footer.php"; ?>