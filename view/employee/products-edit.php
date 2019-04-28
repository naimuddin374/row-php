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
					<h2 class="title_two">Product edit</h2>
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
						$pdt = new Product();
						$ePdt = $pdt->View();
						while($data = mysqli_fetch_object($ePdt)){
							$oldext = $data->picture;
						}
						$pdt->Id = $_POST["pdt_id"];
						
						if($_FILES['pic']['name'] != ''){
							$ext = pathinfo($_FILES["pic"]["name"]);
							$ext = strtolower($ext['extension']);
							if($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png' && $ext != 'gif'){
								$ext = $oldext;
							}else{
								if($oldext != ''){
								unlink("images/product-".$pdt->Id.".".$oldext);
								}
							move_uploaded_file($_FILES['pic']['tmp_name'], "images/product-".$pdt->Id.".".$ext);
							}
						}else{
							$ext = $oldext;
						}
						
						$pdt->Name = $_POST[ 'pdt_name' ];
						$pdt->Price = $_POST[ 'pdt_price' ];
						$pdt->Vat = $_POST[ 'pdt_vat' ];
						$pdt->Discount = $_POST[ 'pdt_discount' ];
						$pdt->Categoryid = $_POST[ 'cat_id' ];
						$pdt->Stock = $_POST[ 'pdt_stock' ];
						$pdt->Picture = $ext;
						
						if ( $pdt->Update() ) {
							echo "Update successfully";
							/*echo "<script>self.location='index.php?e=products-view';</script>";*/
						} else {
							echo "Update error";
						}
					}
						
					if (isset($_GET["eid"])) {
						$pdt = new Product();
						$pdt->Id = $_GET["eid"];
						$allPdt = $pdt->Edit();
						while($pvalue = mysqli_fetch_object($allPdt)){
					?>
					<form class="submitphoto_form" accept-charset="index.php?e=products-view" method="post" enctype="multipart/form-data">
						<input type="hidden" name="pdt_id" value="<?php echo $pvalue->id ?>" />
						<input type="text" name="pdt_name" class="wp-form-control wpcf7-text" placeholder="Product title" value="<?php echo $pvalue->name;?>">
						<input type="text" name="pdt_price" class="wp-form-control wpcf7-text" placeholder="Product price" value="<?php echo $pvalue->price;?>">
						<input type="text" name="pdt_vat" class="wp-form-control wpcf7-text" placeholder="Product vat" value="<?php echo $pvalue->vat;?>">
						<input type="text" name="pdt_discount" class="wp-form-control wpcf7-text" placeholder="Product discount" value="<?php echo $pvalue->discount;?>">
						<select class="wp-form-control wpcf7-text" name="cat_id" id="cat_id">
						<option value="0">Select category</option>
						<?php 
						$cat = new Category();
						$allCat = $cat->View();
						while($value = mysqli_fetch_object($allCat)){
							if($value->id == $pvalue->categoryid){
							echo "<option selected value=\"{$value->id}\">{$value->name}</option>";
							}else
								echo "<option value=\"{$value->id}\">{$value->name}</option>";
						}
						?>
						</select>
						<input type="text" name="pdt_stock" class="wp-form-control wpcf7-text" placeholder="Product stock" value="<?php echo $pvalue->stock;?>">
						<input type="file" name="pic"/>
						
						<?php
							if($pvalue->picture != ""){
								echo "<img src=\"images/product-{$pvalue->id}.{$pvalue->picture}\" width='80' />";
							}
							else{
								echo("<img src=\"images/no-image.png\" width=60 />");	
							}
						?>
						<br><br><input type="submit" value="Update" name="sub" class="wpcf7-submit">
					</form>
					<?php }} ?>
				</div>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2"></div>
		</div>
	</div>
</section>
<!--=========== END CONTACT SECTION ================-->