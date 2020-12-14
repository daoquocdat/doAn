<header class="header grid">
	<div class="row">
		<nav class="container__sidebar-menu--Mobile">
			<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bars" class="svg-inline--fa fa-bars fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"></path></svg>
		</nav>	
		<!-- overlay for mobile and tablet -->
		<nav class="container__sidebar-menu--Mobile__overlay"></nav>	
		<!-- End overlay for mobile and tablet -->

		<!-- sidebar on mobile and tablet -->
		<div class="container__sidebar--Mobile">
			<ul class="container__sidebar-menu--Mobile">							
				<li class="container__sidebar-menu-item--Mobile">
					<div href="#" class="dropdown-menu-item">
						<span class="material-icons">dashboard</span>
						DASHBOARD
						<ul class="container__sidebar-menu-item__ul--Mobile">
							<li><a href="#cv" class="asd">WEEK</a></li>
							<li><a href="#fd" class="asd">MONTH</a></li>
							<li><a href="#cv" class="asd">QUARTER</a></li>
						</ul>
					</div>
				</li>
				<li class="container__sidebar-menu-item--Mobile">
					<a href="<?php echo base_url(); ?>index.php/admin/load_member/">
						<span class="material-icons">account_box</span>MEMBERS								
					</a>
				</li>
				<li class="container__sidebar-menu-item--Mobile">
					<a href="#">
						<span class="material-icons">dashboard</span>
						ORDER								
					</a>
				</li>
				<li class="container__sidebar-menu-item--Mobile">
					<div href="#" class="dropdown-menu-item"  >
						<span class="material-icons">dashboard</span>
						PRODUCTS
						<ul class="container__sidebar-menu-item__ul--Mobile">
							<li><a href="#">VIEW</a></li>
							<li><a href="#">MANAGER</a></li>
						</ul>
					</div>
				</li>
				<li class="container__sidebar-menu-item--Mobile">
					<div href="#" class="dropdown-menu-item" >
						<span class="material-icons">dashboard</span>
						PLANS
						<ul class="container__sidebar-menu-item__ul--Mobile">
							<!-- <li><a href="#">WEEK</a></li> -->
							<!-- <li><a href="#">MONTH</a></li> -->
							<!-- <li><a href="#">QUARTER</a></li> -->
						</ul>
					</div>
				</li>
				<li class="container__sidebar-menu-item--Mobile">
					<div href="#" class="dropdown-menu-item" >
						<span class="material-icons">dashboard</span>
						DISCOUNT
						<ul class="container__sidebar-menu-item__ul--Mobile">
							<li><a href="#" class="asd">VIEW</a></li>
							<li><a href="#" class="asd">CREATE</a></li>
						</ul>
					</div>
				</li>
			</ul>
		</div>

		
		<div class="header__logo col l-3 l-o-0 md-3 m-o-3 c-0">
			<a href="<?php echo base_url(); ?>admin/load_interface_admin/">
				<img src="<?php echo base_url(); ?>vendor/img/logo6.png" alt="logo">
			</a>
		</div>
		<div class="header__content col l-9 md-5 c-12">
			<div class="logo--login">
				<a href="" class="logo-login">
					<div><span class="material-icons">account_circle</span></div>
					<div><p style="color: red;"><?php  echo $this->session->userdata('login') ?></p></div>
				</a>
				<div class="infomation-login">
					<table>
						<ul class="infomation-login__ul">
							<li>Infomation</li>
							<li>Change Password</li>
							<li><a href="<?php echo base_url(); ?>admin/logout/">Logout</a></li>
						</ul>
					</table>
				</div>
			</div>
			

			<div class="logan-header ">
				<p>JUST DO IT</p>
			</div>		
		</div>
	</div>
</header>