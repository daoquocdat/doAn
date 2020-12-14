<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>product</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
	<script src="<?php echo base_url(); ?>vendor/js/main.js"></script>

	<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/css/main.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/css/base.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/css/grid.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/css/responsive.css">
</head>
<body>
		<?php include 'inc/inc_header.php'; ?>
		<div class="container-fluid">
			<div class="row">				
				<?php include 'inc/inc_sidebar.php'; ?>
				<div class="member-interface col l-9 m-12 c-12">
						
						<div class="row list-member">			
							<div class="list-member__search">
								<h2><strong>LIST MEMBER</strong></h2>
								<form action ="<?= base_url()?>Admin/search_member" method="post" id="searchform">
	    							<strong>Search the database: </strong>
								    <input type="text"  name="searchContent" value="" class="search-member"> 
							    	<input type="submit"  value="Search" class="add-member-btn" >
								</form>
							</div>
							<input type="checkbox" hidden name="" class="list-member--input" id="check-close--add-member">


							<label for="check-close--add-member" class="btn-add-member">
								Add Member
							</label>

								
							<label for="check-close--add-member" class="list-member--overlay"></label>
							<div class="member-interface--add-member">
								<label for="check-close--add-member" class="member-interface--add-member__close">
									<!-- Dấu close(X) -->
									<!-- <i class="fas fa-times"></i> -->		
									<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" class="svg-inline--fa fa-times fa-w-11" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512"><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg>
								</label>
								<h2 class="center">Sign in Member</h2>						
								<form action="<?= base_url(); ?>/admin/add_member" method="post" enctype="multidata/form-data" class="form--add-member">
									<div class="row">
										<label for="username" class="col l-4 text-form-add-member"><strong>UserName: &nbsp</strong></label>
										<input type="text" class="col l-6" name="username" id="username" required>
									</div>
									<div class="row">
										<label for="password" class="col l-4 text-form-add-member"><strong>Password: &nbsp</strong></label>
										<input type="password" class="col l-6" name="password" required>
									</div>
									<div class="row">
										<label for="confirm-password" class="col l-4 text-form-add-member"><strong>Confirm Password: &nbsp</strong></label>
										<input type="password" class="col l-6" name="confirm-password" required>
									</div>
									<div class="row">
										<div class="col l-7 text-form-add-member">
											<label><strong>Permission: &nbsp</strong></label>
											<select name="permission" class="l-o-2-3">
												<option value="">---Chọn---</option>
												<option value="boss">Boss</option>
												<option value="marketer">Marketer</option>
												<option value="manager">Manager</option>
												<option value="saler">Saler</option>
												<option value="it">IT</option>
												<option value="accountant">Accountant</option>
											</select>
										</div>
										<div class="col flex form-id l-3">
											<label class="text-form-add-member"><strong>Id: &nbsp</strong></label>
											<input type="text" name="id" size="6" class="col l-8">
										</div>
									</div>
									<div class="row">
										<label class="col l-4 text-form-add-member"><strong>FullName: &nbsp</strong></label>
										<input type="text" name="fullname" class="col l-6" required>
									</div>
									<div class="row">
										<label class="col l-4 text-form-add-member"><strong>Email: &nbsp</strong></label>	
										<input type="text" name="email" class="col l-6" required>
									</div>
									<div class="row">
										<label class="col l-4 text-form-add-member"><strong>Phone: &nbsp</strong></label>
										<input type="text" name="phone" class="col l-6" size="15" width="50px" required>
									</div>
									<div class="center">
										<input type="submit" name="add-member-btn" value="Add member" class="add-member-btn">
									</div>		
								</form>
							</div>
						</div>

							<table  style="width:100%;height:auto ">
								<tr>
									<th style="width:5%">Ord</th>
									<th style="width:10%">Id</th>
									<th style="width:20%">Full name</th>
									<th style="width:20%">Email</th>
									<th style="width:10%">Phone</th>
									<th style="width:15%">Permission</th>
									<th style="width:10%">Status</th>
									<th style="width:10%">Removed</th>
								</tr>
								<?php $i = 1; ?>			
								<?php foreach ($arrMember as  $value): ?>
									<tr <?= $value['status'] == 'active' ? '' : 'class="status-remove"' ?>>
										<th style="width:5%; text-align: center"><?= $i; ?></th>
										<th style="width:10%" class="items-id"><?= $value['id_member']; ?></th>
										<th style="width:20%"><?= $value['fullname']; ?></th>
										<th style="width:20%"><?= $value['email']; ?></th>
										<th style="width:10%"><?= $value['phone']; ?></th>
										<th style="width:15%"><?= $value['permission']; ?></th>
										<th style="width:10%;text-align: center" class="items-status"><?= $value['status']; ?></th>
										<th style="width:10%">
											<a href="<?php echo $value['id_member']; ?>" class="removed col l-1">
												<div class="icon-remove">
													<span class="material-icons">
														remove_circle
													</span>
												</div>			
											</a>
										</th>
									</tr>
								<?php $i++; ?>	
								<?php endforeach ?>		
							</table>						

						
				</div>
			</div>
		</div>

		<script>
			document.querySelectorAll('.removed').forEach(function(element) {
				element.onclick = function(event) {
					event.preventDefault();

					let parentElement = this.parentElement.parentElement;

					$.ajax({
						url: '/Admin/banned_member/'+parentElement.querySelector('.items-id').innerText,
						type: 'POST',
						dataType: 'json'
					})
					.done(function(data) {
						if (data.status) {
							parentElement.classList.add('status-remove');
							parentElement.querySelector('.items-status').innerText = 'disable';

							console.log(data.message);
						} else {
							console.log(data.message);
						}
					});
					
				}
			})
		</script>
</body>
</html>