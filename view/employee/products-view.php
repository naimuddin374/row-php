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
	<h2 class="title_two">Product View</h2>
	</div>
	</div>
	</div>
	<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12">
	<a class="btn btn-success" href="index.php?e=products">New</a>
	<a class="btn btn-success" href="index.php?e=products-view">View</a><br><br>
	<?php
		if(isset($_GET["did"])){
			$pdt = new Product();
			$pdt->Id = $_GET["did"];
			$ePdt = $pdt->View();
			while($data = mysqli_fetch_object($ePdt)){
				$oldext = $data->picture;
			}
			if($oldext != ''){
					if(file_exists("images/product-" .  $pdt->Id . "." . $oldext)){
						unlink("images/product-" .  $pdt->Id . "." . $oldext);
					}
				}
			if($pdt->Delete()){
				echo("Delete successfully");
				echo "<script>self.location='index.php?e=products-view';</script>";
			}
			else
				echo("Delete unsucessfully");
		}
	?>
	<table class="table table-bordered table-responsive">
		<thead>
			<tr class="tbl-head">
				<th>Title</th>
				<th>Price</th>
				<th>Vat</th>
				<th>Discount</th>
				<th>Sale</th>
				<th>Stock</th>
				<th>Categoryid</th>
				<th>Picture</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
			<?php 
			$pdt = new Product();
			$allPdt = $pdt->View();
			while($pvalue = mysqli_fetch_object($allPdt)){
			?>
		<tbody>
			<tr class="tbl-body">
				<td class="title">
				<?php echo $pvalue->name; ?>
				</td>
				<td>
				<?php echo $pvalue->price; ?>
				</td>
				<td>
				<?php echo $pvalue->vat . "%"; ?>
				</td>
				<td>
				<?php echo $pvalue->discount . "%"; ?>
				</td>
				<td width="200">
					<del><?php
						if($pvalue->discount > 0){
							echo "Tk" . $pdt->Calculator($pvalue->price, $pvalue->vat, 0);
						}
					?></del>
					<?php echo "&nbsp;>>&nbsp; Tk". $pdt->Calculator($pvalue->price, $pvalue->vat, $pvalue->discount); ?>
				</td>
				<td>
				<?php echo $pvalue->stock; ?>
				</td>
				<td>
				<?php echo $pvalue->catname; ?>
				</td>
				<td>
				<?php 
					if($pvalue->picture != ''){
						echo("<img src=\"images/product-{$pvalue->id}.{$pvalue->picture}\" width=60 /> ");
					}else{
						echo("<img src=\"images/no-image.png\" width=60 /> ");
					}
				?>
				</td>
				<td class="edit" style="vertical-align: middle"><a href="index.php?e=products-edit&eid=<?php echo $pvalue->id;?>"><i class="fa fa-pencil fa-lg"></i></a>
				</td>
				<td class="delete" style="vertical-align: middle"><a href="index.php?e=products-view&did=<?php echo $pvalue->id;?>"><i class="fa fa-trash-o fa-lg"></i></a>
				</td>
			</tr>
		</tbody>
			<?php } ?>
	</table>
	</div>
	</div>
</div>
</section>
<!--=========== END CONTACT SECTION ================-->