<!--=========== BEGIN COURSE BANNER SECTION ================-->
<!--
<section id="imgBanner">
	<h2>Contact</h2>
</section>
-->
<br><br>
<!--=========== END COURSE BANNER SECTION ================-->

<!--=========== BEGIN CONTACT SECTION ================-->
<section id="contact">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="title_area">
					<h2 class="title_two">Insert a new product</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-2 col-md-2 col-sm-2"></div>
			<div class="col-lg-8 col-md-8 col-sm-8">
				<div class="contact_form wow fadeInLeft">
					<a class="btn btn-success" href="index.php?e=products">New</a>
					<a class="btn btn-success" href="index.php?e=products-view">View</a><br><br>
					<?php
					if ( isset( $_POST[ "sub" ] ) ) {
						
						if($_FILES["pic"]["name"]){
							$ext = pathinfo($_FILES["pic"]["name"]);
							$ext = strtolower($ext["extension"]);
							if($ext != "jpg" && $ext != "jpeg" && $ext != "gif" && $ext != "png"){
								$ext = "";
							}
						}else
							$ext = "" ;
						
						$pdt = new Product();
						$pdt->Name = $_POST[ 'pdt_name' ];
						$pdt->Price = $_POST[ 'pdt_price' ];
						$pdt->Vat = $_POST[ 'pdt_vat' ];
						$pdt->Discount = $_POST[ 'pdt_discount' ];
						$pdt->Categoryid = $_POST[ 'cat_id' ];
						$pdt->Stock = $_POST[ 'pdt_stock' ];
						$pdt->Picture = $ext;
						if ( $pdt->Insert() ) {
							if($ext){
								move_uploaded_file($_FILES["pic"]["tmp_name"], "images/product-{$pdt->Id}.{$ext} ");
							}
							echo "Insert successfully";
						} else {
							echo "Insert error";
						}
						
					}
					?>
					<form class="submitphoto_form" accept-charset="index.php?e=products" method="post" enctype="multipart/form-data">
						<input type="text" name="pdt_name" class="wp-form-control wpcf7-text" placeholder="Product title">
						<input type="text" name="pdt_price" class="wp-form-control wpcf7-text" placeholder="Product price">
						<input type="text" name="pdt_vat" class="wp-form-control wpcf7-text" placeholder="Product vat">
						<input type="text" name="pdt_discount" class="wp-form-control wpcf7-text" placeholder="Product discount">
						<select class="wp-form-control wpcf7-text" name="cat_id" id="cat_id">
							<option value="0">Select category</option>
							<?php 
						$cat = new Category();
						$allCat = $cat->View();
						while($value = mysqli_fetch_object($allCat)){
							echo "<option value=\"{$value->id}\">{$value->name}</option>";
						}
					?>
						</select>
						<input type="text" name="pdt_stock" class="wp-form-control wpcf7-text" placeholder="Product stock">
						<input type="file" name="pic" class="wp-form-control wpcf7-text">
						<input type="submit" value="Save" name="sub" class="wpcf7-submit">
					</form>
				</div>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2"></div>
		</div>
	</div>
</section>
<!--=========== END CONTACT SECTION ================-->