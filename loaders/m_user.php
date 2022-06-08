<?php


if(isset($_POST['a']) ){

	$action = $krypton->decrypt($_POST['a']) ;
	if(isset($_POST['j'])){
	$user = $krypton->decrypt($_POST['j']) ;	
	}
	

	switch($action){
			
			
		case "edit_password":


			if(empty($_POST['p1'])){
				die("Please enter new password");
			} elseif(strlen($_POST['p1']) < 3){
				die("Password must be more than 6 characters");
			} else {
				$p1 = check_input($_POST['p1']);
			}



			if(empty($_POST['p2'])){
				die("Please enter new password");
			} elseif(strlen($_POST['p2']) < 3){
				die("Password must be more than 6 characters");
			} else {
				$p2 = check_input($_POST['p2']);

				}



			if($p1 != $p2){
				die("Pins don't match");
			} else {
				$data = [
					"pass" => md5($p2),
					"id" => $user
				];

				$stmt = $db_con->prepare("UPDATE diex_user SET pazz=:pass  WHERE id=:id");
				$stmt->execute($data);

				die('1');

		}

			break;
			
			
		
			
			
			
				case "edit_profile":

			if(empty($_POST['units'])){

				die("Please enter unit");
			} else {

				$unit = check_input($_POST['units']);
				
			}
			if(empty($_POST['name'])){

				die("Please enter full name");
			} else {

				$name = check_input($_POST['name']);
				$ncheck = 1;
			}

			///////username
if(empty($_POST["uname"])){
	
	die("Please enter  username");
} else {
	
	
	 $uname = check_input($_POST["uname"]);
	$unamez = username($uname);
	
	
	
	if($unamez == 6){
		
		die("Username should be more than 5 characters");
	}  else{
		$cname = checkuname($uname);
		
		
		if ($cname == 1){
			die('username already exists');
		} else {
			$uname = $uname ;
			$uname = str_replace(" ", "",$uname);
			$uncheck = 1;
		}
	}
}

		
////////email
if(empty($_POST["mail"])){
	
	$mail = "NIL" ;
			$emcheck = 1;
} else {
	if (vmail($_POST["mail"]) == 1) {
			$mail = $_POST["mail"] ;
			$emcheck = 1;
		
	} else {
		die("Please enter a valid email");
	}
}


			if(empty($_POST['type'])){

				$type = check_input($_POST['type']);
				$tycheck = 1;
			} else {

				$type = check_input($_POST['type']);
				$tycheck = 1;
			}
			
			if(empty($_POST["number"])){
				$phone = "0";
					$phcheck = 1;
			} else {
				if(!is_numeric($_POST["number"])) {
				} else if(strlen($_POST["number"]) < 11 || strlen($_POST["number"]) > 13) {
					die('Invalid phone number');
				} else {
					$phone = $_POST["number"];
					$phcheck = 1;
				}
			}
			if(($ncheck == 1) && ($uncheck == 1) && ($emcheck ==1) && ($phcheck == 1) && ($tycheck==1)){
			$data = [
				"name" => $name,
				"phone" => $phone,
				"user" => $user,
				"mail" => $mail,
				"uname" => $uname,
				"type" => $type,
				"unit" => $unit
			];
	$stmt = $db_con->prepare("UPDATE diex_user SET fname=:name, phone=:phone, mail=:mail, uname=:uname, type=:type, unit=:unit WHERE id=:user");
				if($stmt->execute($data)){

					die('1');
				} else{

					die("Something went wrong, please check your network and try again");
				}
				
			} else {
				
				die("Something went wrong, please check your network and try again");
			}
			

				
			break;
			
		case "delete":
			
			$id =$krypton->decrypt($_POST['j']);
			$stmt = $db_con->prepare("DELETE FROM diex_user WHERE id=:id");
			if($stmt->execute([ 'id'=> $id])){	
				die('1');
			} else {	
				die("Something went wrong, please refresh your browser and try againz");
			}
			
		
			
			
			break;
			
		case "view":

$stmt = $db_con->prepare("SELECT * FROM diex_user WHERE id=:user");
			$stmt->execute(['user' => $user]);
	$count = $stmt->rowCount();
			$row = $stmt->fetch();
			
			$munits = explode(",", $row['unit'])
?>
		
		

                         <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul  class="nav nav-pills " role="tablist">


                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-user"></i> Profile Summary</a>
                        </li>


                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-sliders"></i> Edit Profile</a>
                        </li>




                        <li role="presentation" class=""><a href="#tab_content5" role="tab" id="profile-tab4" data-toggle="tab" aria-expanded="false"><i class="fa fa-lock"></i> Change Password</a>
                        </li>


                      </ul>

                             <br>
                             <hr>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                            <h4><b>Account Profile</b></h4>
                            <hr>
                            <p> Full Name: <strong><?php echo(ucwords($row["fname"])); ?></strong> </p>
                                <p> Email: <strong><?php echo($row["mail"]); ?></strong> </p>
                            <p> Username: <strong><?php echo($row["uname"]); ?></strong> </p>
                            <p> Phone Number: <strong><?php echo($row["phone"]); ?></strong> </p>
                            <p> Units: <strong><?php
			
			foreach($munits as $unit){
				
				echo('<p>'.getunitname($unit).'</p>');
			}
								?></strong> </p>
                            
                        
                            


                        </div>




                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                           <h4><b>Edit Profile</b></h4>
                            <hr>

                        <form id="profile1"  class="form-horizontal "  name="updatedata" >

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3" for="first-name">Full Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-3"  placeholder="Enter your full name" value="<?php echo(ucwords($row["fname"])); ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3" for="first-name">Username <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="uname" name="uname" required="required" class="form-control col-md-7 col-xs-3"  placeholder="Enter your full name" value="<?php echo($row["uname"]); ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3" for="first-name">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="mail" name="mail" required="required" class="form-control col-md-7 col-xs-3"  placeholder="Enter your full name" value="<?php echo($row["mail"]); ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Phone <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="phone" type="number"  name="number"  placeholder="Enter phone number" class="form-control col-md-7 col-xs-12" value="<?php echo($row["phone"]); ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Units <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="unit" type="text"  name="units"  placeholder="Enter phone number" class="form-control col-md-7 col-xs-12" value="<?php echo($row["unit"]); ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Change User type <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         
                         <select class="form-control col-md-7 col-xs-12" name="type">
							 <option value="0" <?php if($row['type'] == 0){ echo('selected');} ?>  >Admin</option>
							 <option value="1"  <?php if($row['type'] == 1){ echo('selected');} ?> >Member </option>
							</select>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-3 col-md-offset-3">
                          <button type="button" class="btn btn-primary" onclick="profvend1()" id="diexinvad1" > <i class="fa fa-check-circle"></i> Save</button>
                        </div>
                      </div>
                      <input type="hidden" name="u" value="m_user" >

                    <input type="hidden" name="j" value="<?php echo $krypton->encrypt($row['id']) ; ?>" >

                    <input type="hidden" name="a" value="<?php echo $krypton->encrypt("edit_profile") ; ?>" >


                    </form>
                              
                                <div class="col-md-3 col-sm-3 col-xs-3">
                        <h4  >Unit codes <span class="required">*</span>
                        </h4>
                        <div >
                          <?php echo(unitcode()) ; ?>
                        </div>
                      </div>
                               <script>

					function profvend1() {



							document.getElementById("diexinvad1").disabled="disabled";

                            $("#diexinvad1").html('<span class="fa fa-circle-o-notch fa-spin"></span>');


						var data = $("#profile1").serialize();


			jQuery.ajax({
	url: "<?php echo(loader); ?>",
	data:data,
	type: "POST",
	success:function(data){

		if(data==1){
			new PNotify({
                                  title: 'Operation Successful',
                                  text: 'Profile Updated',
                                  type: 'success',
								  nonblock: {
                                      nonblock: true
                                  },
                                  styling: 'bootstrap3'
                              });


			 $("#diexinvad1").html('<span class="fa fa-check"> </span> Save');


		  document.getElementById("diexinvad1").disabled="disabled";


		} else {

			  document.getElementById("diexinvad1").disabled="";
              $("#diexinvad1").html('<span class="fa fa-check"></span> Save');
				new PNotify({
                                  title: 'Oopse...! Looks like you missed something',
                                  text: data,
                                  type: 'error',
								  //nonblock: {
                                 //     nonblock: true
                                 // },
                                  styling: 'bootstrap3'
                              });

		}




	},
	error:function (){

		document.getElementById("diexinvad1").disabled="";
        $("#diexinvad1").html('<span class="fa fa-check"></span> Submit');

			new PNotify({
                                  title: 'Network Error!',
                                  text: 'Please check your network connection and try again',
                                  type: 'error',
								  //nonblock: {
                                 //     nonblock: true
                                 // },
                                  styling: 'bootstrap3'
                              });

	}
	});






}
				</script>
                        </div>




                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">

                            <h4><b>Edit Bank Details</b></h4>
                            <hr>



                    <form class="form-horizontal form-label-left" id="profile2" >

                      <div class="form-group">

                                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Account Name</label>

                                 <div class="col-md-9 col-sm-9 col-xs-12">

                                   <input type="text" name="account_name" class="form-control" placeholder="Enter Account Name" value="<?php echo($brow['acname']) ?>" required>

                                 </div>

                               </div>

                                   <div class="form-group">

                                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Bank Name</label>

                                 <div class="col-md-9 col-sm-9 col-xs-12">

                                   <input type="text" name="bank_name" class="form-control" placeholder="Enter Bank Name" value="<?php echo($brow['dname']) ?>"  required>

                                 </div>

                               </div>

                               <div class="form-group">

                                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Account Number</label>

                                 <div class="col-md-9 col-sm-9 col-xs-12">
                                 
                                 

         <input type="number" minlength="10" name="account_number" class="form-control" placeholder="Enter Account Number" value="<?php echo($brow['bnum']) ?>"  required>

                                 </div>

                               </div>



                             <div class="ln_solid"></div>

                               <div class="form-group">

                                 <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">

                                 <button type="button" class="btn btn-primary" id="diexinvad2" onclick="profvend2()"><i class="fa fa-bank"></i> Save</button>

                                 </div>

                               </div>
   <input type="hidden" name="u" value="m_user" >

                    <input type="hidden" name="j" value="<?php echo $krypton->encrypt($brow['id']) ; ?>" >
                    <input type="hidden" name="a" value="<?php echo $krypton->encrypt("edit_bank") ; ?>" >
                    </form>
							<script>
								function profvend2() {
									document.getElementById("diexinvad2").disabled="disabled";
									$("#diexinvad2").html('<span class="fa fa-circle-o-notch fa-spin"></span>');
									var data = $("#profile2").serialize();
									jQuery.ajax({
										url: "<?php echo(loader); ?>",
										data:data,
										type: "POST",
										success:function(data){
											if(data==1){
												new PNotify({
													title: 'Operation Successful',
													text: 'Profile Updated',
													type: 'success',
													nonblock: {
														nonblock: true
													},
													styling: 'bootstrap3'
												});
												$("#diexinvad2").html('<span class="fa fa-check"> </span> Save');
												document.getElementById("diexinvad2").disabled="disabled";
											} else {
												document.getElementById("diexinvad2").disabled="";
												$("#diexinvad2").html('<span class="fa fa-check"></span> Save');
												new PNotify({
													title: 'Oopse...! Looks like you missed something',
													text: data,
													type: 'error',
													//nonblock: {
													//     nonblock: true
													// },
													styling: 'bootstrap3'
												});
											}
										},
										error:function (){
											document.getElementById("diexinvad2").disabled="";
											$("#diexinvad2").html('<span class="fa fa-check"></span> Submit');
											new PNotify({
												title: 'Network Error!',
												text: 'Please check your network connection and try again',
												type: 'error',
												//nonblock: {
												//     nonblock: true
												// },
												styling: 'bootstrap3'
											});
										}
									});	
								}
								
				</script>

                        </div>






                        <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="profile-tab">


                            <h4><b>Change Password</b></h4>
                            <hr>


                         <form id="profile4"  data-parsley-validate class="form-horizontal " >

                  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3" >New Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password"  name="p1" required="required" class="form-control col-md-7 col-xs-3" placeholder="Enter new password">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Confirm New Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="pass2" type="password"  name="p2" required="required" class="form-control col-md-7 col-xs-12" placeholder="Repeat new password">
                        </div>
                      </div>





                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-3 col-md-offset-3">
                          <button type="button" id="updatePass"  class="btn btn-primary" onClick="profvend4()"> <i class="fa fa-lock"></i> Update Password</button>
                        </div>
                      </div>
                             
   <input type="hidden" name="u" value="m_user" >

                    <input type="hidden" name="j" value="<?php echo $krypton->encrypt($row['id']) ; ?>" >
                             <input type="hidden" name="a" value="<?php echo $krypton->encrypt("edit_password") ; ?>" >
                    </form>
                    <script>
						function profvend4() {
						document.getElementById("updatePass").disabled="disabled";
							$("#updatePass").html('<span class="fa fa-circle-o-notch fa-spin"></span>');
							var data = $("#profile4").serialize();
							jQuery.ajax({
								url: "<?php echo(loader) ; ?>",
								data:data,
								type: "POST",
								success:function(data){
									if(data==1){
										document.getElementById("profile4").reset();
										new PNotify({
											title: 'Operation Successful',
											text: 'Profile Updated',
											type: 'success',
											nonblock: {
												nonblock: true
											},
											styling: 'bootstrap3'
										});
										$("#updatePass").html('<span class="fa fa-check"> </span> Update Password');
										document.getElementById("updatePass").disabled="disabled";
									} else {
										document.getElementById("profile4").reset();
										document.getElementById("updatePass").disabled="";
										$("#updatePass").html('<span class="fa fa-check"></span> Update Password');
										new PNotify({
											title: 'Oopse...! Looks like you missed something',
											text: data,
											type: 'error',
											//nonblock: {
											//     nonblock: true
											// },
											styling: 'bootstrap3'
										});
									}
								},
								error:function (){
									document.getElementById("profile4").reset();
									document.getElementById("updatePass").disabled="";
									$("#updatePass").html('<span class="fa fa-check"></span> Update Password');
									new PNotify({
										title: 'Network Error!',
										text: 'Please check your network connection and try again',
										type: 'error',
										//nonblock: {
										//     nonblock: true
										// },
										styling: 'bootstrap3'
									});
								}
							});	
						}
				</script>
                        </div>
                      </div>
                    </div>


                    <div class="clearfix"></div>
		
		<?php
			
			
			break;
			
	}
	
}

?>