<?php include 'inc/inc_head.php'; ?>
<body>
	<?php include 'inc/inc_header.php'; ?>

	<div class="container-fluid">
		<div class="row">				
			<?php include 'inc/inc_sidebar.php'; ?>
			<div class="view-product-interface col l-9">
                <div class="flex list-product">           
                    <h2><strong>LIST PRODUCT</strong></h2>
                    <a href="<?php echo base_url(); ?>Admin/view_add_product" class="btn btn-outline-info">Add new product</a>    
                </div>


			<table id="view_product" class="display" width="100%" data-page-length="25" data-order="[[ 1, &quot;asc&quot; ]]">
        <thead>
            <tr>
                <th>Ord</th>
                <th>Img</th>
                <th>Id_Pro</th>
                <th>Name</th>
                <th>Id_Catelogy</th>
                <th>Amount</th>
                <th>Price</th>
                <th>Status</th>
                <th>Id_Supplier</th>
                <th>Change</th>
            </tr>
        </thead>

        <tbody>
            <?php $i = 1; ?>            
            <?php foreach ($arrProduct as  $value): ?>
                <tr <?= $value['status'] == 'active' ? '' : 'class="status-remove"' ?>>
                    <th style="width:5%; text-align: center"><?= $i; ?></th>
                    <th style="width:10%" ><img src="<?= $value['img']; ?>" alt="" width="50" height="50"></th>
                    
                        <th style="width:10%" class="id-product"><?= $value['id_pro']; ?></th>
                    
                    <th style="width:20%"><?= $value['name']; ?></th>
                    
                        <th style="width:20%"><?= $value['id_cat']; ?>

                         </th>
                    
                    <th style="width:10%" class="center"><?= $value['amount']; ?></th>
                    <th style="width:5%"><?= $value['price']; ?></th>
                    <th style="width:10%"  class="items-status"><?= $value['status']; ?></th>
                    <th style="width:10%" class="center"><?= $value['id_sup']; ?></th>
                    <th>
                        <a href="<?php echo base_url(); ?>Admin/edit_product/<?= $value['id_pro']; ?>"><span class="material-icons">create</span></a>
                        <a href="<?php echo $value['id_pro']; ?>" class="remove-pro">
                                <span class="material-icons">
                                    remove_circle
                                </span> 
                    </th>
                </tr>
            <?php $i++; ?>  
            <?php endforeach ?> 
        </tbody>
    </table>

		</div>
	</div>



    <script>
            document.querySelectorAll('.remove-pro').forEach(function(element) {
                element.onclick = function(event) {
                    event.preventDefault();

                    let parentElement = this.parentElement.parentElement;

                    $.ajax({
                        url: '/Admin/banned_product/'+parentElement.querySelector('.id-product').innerText,
                        type: 'POST',
                        dataType: 'json'
                    })
                    .done(function(data) {
                        if (data.status) {
                            console.log(parentElement)
                            parentElement.classList.toggle('status-remove');
                            if(parentElement.querySelector('.items-status').innerText == 'active')
                                parentElement.querySelector('.items-status').innerText = 'close';
                            else
                                parentElement.querySelector('.items-status').innerText = 'active';
                            
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