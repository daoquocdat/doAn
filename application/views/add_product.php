<?php include 'inc/inc_head.php'; ?>
<body>
	<?php include 'inc/inc_header.php'; ?>
	<div class="container-fluid">
		<div class="row">				
			<?php include 'inc/inc_sidebar.php'; ?>
			<div class="view-product-interface col l-9">
			<h2 class="alert-success center">Add Product</h2>
			<div class="form">
				<span style="font-size: 20px; color: red; font-style: italic"><b>Please enter your infomation</b> </span>
				<form action="<?=  base_url(); ?>Admin/add_product" method="post" enctype="multipart/form-data">
					<table>
						<tr> 
							<td>ID product</td>
							<td> <input type="text" name="id_pro" autofocus required></td>
						</tr>
						
						<tr>
							<td>Name</td>
							<td> <input type="text" name="name"></td>
						</tr>
						<tr>
							<td>ID catelogy</td>
							<td>
								<select name="id_cat" >
									<option value="">---Chọn ---</option>
									<?php foreach ($arrProduct as  $value): ?>
										<option value="<?php echo $value['id_cat']; ?>">
											<?php echo $value['name'];  ?>  
										</option>
									<?php endforeach ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Amount</td>
							<td> <input type="text" name="amount"></td>
						</tr>
						<tr>
							<td>Price</td>
							<td> <input type="text" name="price"></td>
						</tr>

						<tr>
							<td>Status(active or close)</td>
							<td>	
								<select name="status" >
									<option value="active">Active</option>
									<option value="close">Close</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Id Supplier</td>
							<td>
								<select name="id_sup" >
									<option value="">---Chọn ---</option>
									<?php foreach ($arrSupplier as  $value): ?>
										<option value="<?php echo $value['id_sup']; ?>">
											<?php echo $value['name'];  ?>  
										</option>
									<?php endforeach ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Product hot(0 or 1)</td>
							<td>	
								<select name="pro_hot" >
									<option value="">0</option>
									<option value="gc">1(Hot)</option>		
								</select>
							</td>
						</tr>
						<tr>
							<td>Images</td>
							<td> <input type="file" name="img"></td>
						</tr>
						<tr>
							<td colspan=2>
							<input type="submit" value="Add Product" name="add-product"/>
							</td>
						</tr>
					</table>
					
				</form>

			</div>
		</div>
	</div>
	</div>
</body>