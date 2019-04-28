<!--=========== BEGIN COURSE BANNER SECTION ================-->
    <!--
    <section id="imgBanner">
      <h2>Contact</h2>
    </section>
    -->
    <br><br><br><br>
    <!--=========== END COURSE BANNER SECTION ================-->
    
    <!--=========== BEGIN CONTACT SECTION ================-->
    <section id="contact">
      <div class="container">
       <div class="row">
          <div class="col-lg-12 col-md-12"> 
            <div class="title_area">
              <h2 class="title_two">Login & Registration</h2>
            </div>
          </div>
       </div>
       <div class="row">
         <div class="col-lg-6 col-md-6 col-sm-6">
           <div class="contact_form wow fadeInLeft">
             <?php
			 	if(isset($_POST["submit"])){
					$cus = new Customers();
					$cus->Name = $_POST["p_name"];
			   		$cus->Email = $_POST["p_email"];
			   		$cus->Password = $_POST["p_pword"];
					$cus->Type = $_POST["p_type"];
					if($cus->Registration()){
						echo("Insert successfully");
					}else{
						echo "Insert error";
					}
				}  
			 ?>
              <form class="submitphoto_form" action="index.php?f=login" method="post">
                <input type="text" name="p_name" class="wp-form-control wpcf7-text" placeholder="Enter Your fullname">
                <input type="mail" name="p_email" class="wp-form-control wpcf7-email" placeholder="Enter a email address">          
                <input type="password" name="p_pword" class="wp-form-control wpcf7-text" placeholder="Enter a password">
                <select class="wp-form-control wpcf7-text" name="p_type">
                	<option value="0">Select your type</option>
                	<option value="a">a</option>
                	<option value="c">c</option>
                	<option value="b">b</option>
                </select>
                <input type="submit" name="submit" value="Submit" class="wpcf7-submit">
              </form>
           </div>
         </div>
         
          <div class="col-lg-6 col-md-6 col-sm-6">
           <div class="contact_form wow fadeInLeft">
             <?php
			 	if(isset($_POST["sub"])){
					$cus = new Customers();
			   		$cus->Email = $_POST["email"];
			   		$cus->Password = $_POST["pword"];
					if($cus->Login()){
						$_SESSION["myid"] = $cus->Id;
						$_SESSION["mytype"] = $cus->Type;
						echo "<script>self.location='index.php';</script>";
					}else{
						echo "Invalid Email or Password";
					}
				}
			 ?>
              <form class="submitphoto_form" accept-charset="index.php?f=login" method="post">
                <input type="email" name="email" class="wp-form-control wpcf7-text" placeholder="Enter Your valid email">
                <input type="password" name="pword" class="wp-form-control wpcf7-text" placeholder="Enter Your valid password">
                <input type="submit" value="Login" name="sub" class="wpcf7-submit">
              </form>
           </div>
         </div>
       </div>
      </div>
    </section>
    <!--=========== END CONTACT SECTION ================-->
