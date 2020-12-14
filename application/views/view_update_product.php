<?php include'inc/inc_head.php'; ?>
<?php include 'inc/inc_head.php'; ?>
<body>
	<?php include 'inc/inc_header.php'; ?>
	<div class="container-fluid">
		<div class="row">				
			<?php include 'inc/inc_sidebar.php'; ?>
			<div class="view-product-interface col l-9">
			<h2 class="alert-success center">Update Product</h2>
			<div class="form">
				<span style="font-size: 20px; color: red; font-style: italic"><b>Please enter update infomation</b> </span>
				<form action="<?=  base_url(); ?>Admin/update_product" method="post" enctype="multipart/form-data">
					<table>

						<?php foreach ($arrDataProduct as  $value): ?>
							<tr> 
								<td>ID product</td>
								<td> <input type="text" name="id_pro" autofocus value="<?= $value['id_pro'] ?>" style="background-color: #d3d3d3;" readonly></td>
							</tr>
							
							<tr>
								<td>Name</td>
								<td> <input type="text" name="name" value="<?= $value['name'] ?>"></td>
							</tr>

							<?php 
								$choose_cat = "";
								if($value['id_cat'] != ""){
									$choose_cat = $value['id_cat'];
								}
							 ?>

							<tr>
								<td>ID catelogy</td>
								<td>
									<select name="id_cat" >
										<option value="">---Chọn ---</option>
										<?php foreach ($arrProduct as  $value1): ?>
											<option value="<?php echo $value1['id_cat']; ?>"<?= ($value1['id_cat'] == $choose_cat) ? 'selected' : '' ?>>
												<?php echo $value1['name'];  ?>  
											</option>
										<?php endforeach ?>
									</select>
								</td>
							</tr>
							<tr>
								<td>Amount</td>
								<td> <input type="text" name="amount" value="<?= $value['amount'] ?>"></td>
							</tr>
							<tr>
								<td>Price</td>
								<td> <input type="text" name="price" value="<?= $value['price'] ?>"></td>
							</tr>

							<tr>
								<td>Status(active or close)</td>
								<td>	
									<select name="status" >
										<option value="active" <?= $value['status'] =="active"?'selected':''; ?> >Active</option>
										<option value="close" <?= $value['status'] =="close"?'selected':'';?> >Close</option>
									</select>
								</td>
							</tr>

							<?php 
								$choose_sup = "";
								if($value['id_sup'] !=""){
									$choose_sup = $value['id_sup'];
								}
							 ?>
							<tr>
								<td>Id Supplier</td>
								<td>
									<select name="id_sup" >
										<option value="">---Chọn ---</option>
										<?php foreach ($arrSupplier as  $value2): ?>
											<option value="<?php echo $value2['id_sup']; ?>"<?= ($value2['id_sup'] == $choose_sup) ? 'selected' : '' ?> >
												<?php echo $value2['name'];  ?>  
											</option>
										<?php endforeach ?>
									</select>
								</td>
							</tr>
							<tr>
								<td>Product hot(0 or 1)</td>
								<td>	
									<select name="pro_hot" >
										<option value="" <?= $value['pro_hot'] ==""?'selected':''; ?> >0</option>
										<option value="gc">1(Hot)</option>		
									</select>
								</td>
							</tr>
							<tr>
								<td>Images</td>
								<td>
									<div class="col l-4">
									<img src="<?=  $value['img']; ?>" alt="" class="img-fluid">
									</div>
									  <input type="file" name="img">
								</td>
								<input type="hidden" value="<?=  $value['img']; ?>" name="img2">
								
							</tr>

						<?php endforeach ?>
							<tr>
								<td colspan=2>
								<input type="submit" value="Update" name="update-product"/>
								</td>
							</tr>
					</table>
					
				</form>

			</div>
		</div>
	</div>
	</div>
</body>