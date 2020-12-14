<?php include'inc/inc_head.php' ?>
<body>
		<?php include 'inc/inc_header.php'; ?>
		<div class="container-fluid">
			<div class="row">				
				<?php include 'inc/inc_sidebar.php'; ?>
				<div class="member-interface col l-9 m-12 c-12">

					<a href="<?php base_url(); ?>load_member" class="btn btn-info return">&lt;Return Member Interface</a>

					<div class="search-by-key">Search By <?php echo $key; ?></div>
					<table  style="width:100%;height:auto ">
								<tr>
									<th style="width:5%">Ord</th>
									<th style="width:10%">Id</th>
									<th style="width:20%">Full name</th>
									<th style="width:20%">Email</th>
									<th style="width:10%">Phone</th>
									<th style="width:15%">Permission</th>
									<th style="width:10%">Status</th>
								</tr>
								<?php $i = 1; ?>			
								<?php foreach ($arrSearch as  $value): ?>
									<tr <?= $value['status'] == 'active' ? '' : 'class="status-remove"' ?>>
										<th style="width:5%; text-align: center"><?= $i; ?></th>
										<th style="width:10%" class="items-id"><?= $value['id_member']; ?></th>
										<th style="width:20%"><?= $value['fullname']; ?></th>
										<th style="width:20%"><?= $value['email']; ?></th>
										<th style="width:10%"><?= $value['phone']; ?></th>
										<th style="width:15%"><?= $value['permission']; ?></th>
										<th style="width:10%;text-align: center" class="items-status"><?= $value['status']; ?></th>
	
									</tr>
								<?php $i++; ?>	
								<?php endforeach ?>		
							</table>		
				</div>
			</div>
		</div>
</body>