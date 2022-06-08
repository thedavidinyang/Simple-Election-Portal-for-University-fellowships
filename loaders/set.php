<?php

if(isset($_POST['a']) ){

	$action = $krypton->decrypt($_POST['a']) ;

	switch($action){
		
			
			
		
			
		////////////////////////////////////////////////////////////////////////////////////////////			
		case "delcoup":
			
			
			$j = $_POST['j'];
			
			$stmt = $db_con->prepare("DELETE FROM diex_unit WHERE id=:id");
			
			if($stmt->execute([ 'id'=> $j])){
				
				die('1');
			} else {
				
				die('something went wrong, please refresh your browser and try again');
			}
			
			
			break;
			
	
			
			
			
			//////////////////////////////////////////////////////////////////////////////////
			
		case "coupons":
			$stmt = $db_con->prepare("SELECT * FROM diex_unit ORDER BY id DESC");
			$stmt->execute();
			$count = $stmt->rowCount();
			$row = $stmt->fetch(); 

?>
			
			
			<div class="diexformz">
		<div id="platz">
			
			 <?php if(!empty($count) ) { ?>
                      <table class="table table-striped jambo_table bulk_action">
                          <thead>
                              <tr class="headings">
                                  <th class="column-title">Unit Code</th>
                                  <th class="column-title">Name</th>
                                  <th class="column-title">IT Brethren</th>
                                  <th class="column-title">Offices </th>
                                  <th class="column-title">Action</th>
                               
                              </tr>
                          </thead>
                          <tbody>
                              <?php do { ?>
                              <tr class="even pointer">
                              <td><?php echo($row['id']) ; ?> </td>
                              <td><?php echo($row['name']) ; ?> </td>
                              <td>
								  <?php 
										$itbz = explode(',', $row['itb']);
										foreach($itbz as $itbz){
											echo($itbz."<br>");
										}
										; ?>
                             
                             </td>
                              <td>
								  <?php 
										$ofiz = explode(',', $row['ofice']);
										foreach($ofiz as $ofiz){
											echo($ofiz."<br>");
										}
										; ?>
										</td>
								  
                              
                            <td>  
                            
                            <button class="btn btn-xs btn-warning" onClick="vew(this.value)" value="<?php echo($row['id']) ; ?>"><i class="fa fa-search"></i> Edit</button> 
                            <button class="btn btn-xs btn-danger" onClick="delp(this.value)" value="<?php echo($row['id']) ; ?>"><i class="fa fa-cross"></i> Delete</button> 
                            </td>
                         
                              </tr>
<?php } while ($row = $stmt->fetch()); ?>
                          </tbody>

                      </table>
                      
                      <script>
			
				
	function vew(value){
		var dx = value;
		var data = {j: dx, u:'set', a:'<?php echo($krypton->encrypt('editunit'))?>'};
			jQuery.ajax({
			url: '1261622387512781028128758912875128712581258',
			data:data,
			type: "POST",
			success:function(data){
				
					$('#platz').html(data);
			
			},
			error:function (){
				
				new PNotify({
					title: 'Network Error!',
					text: 'Please check your network connection and try again',
					type: 'error',
					//nonblock: {
					// },
					styling: 'bootstrap3'
				});
			}
		});
		
		
		
	}	
				
	function delp(value){
		var dx = value;
		var data = {j: dx, u:'set', a:'<?php echo($krypton->encrypt('delcoup'))?>'};
			jQuery.ajax({
			url: '1261622387512781028128758912875128712581258',
			data:data,
			type: "POST",
			success:function(data){
				
					
				if(data == 1){
					
						new PNotify({
					title: 'Operation successful',
					text: '',
					type: 'success',
					//nonblock: {
					// },
					styling: 'bootstrap3'
				});
					
															$.ajax({
			url: "1261622387512781028128758912875128712581258",
			data: {u:'set', a:'<?php echo($krypton->encrypt('coupons'))?>'},
			type: "POST",
			success: function (result) {
				$("#atl").html('');
				$('.adt').html(result);
			},
			error:function (){
				$("#atl").html('');
				new PNotify({
					title: 'Load Error',
					text: 'OOpse! Something went wrong, please check your internet connection and reload the page',
					type: 'error',
					styling: 'bootstrap3'
				});
			}
		});
					
				} else {
					
					new PNotify({
					title: 'Oops! Something went wrong',
					text: data,
					type: 'error',
					//nonblock: {
					// },
					styling: 'bootstrap3'
				});
					
				}
			},
			error:function (){
				
				new PNotify({
					title: 'Network Error!',
					text: 'Please check your network connection and try again',
					type: 'error',
					//nonblock: {
					// },
					styling: 'bootstrap3'
				});
			}
		});
		
		
		
	}
			
			</script>
                      
                      <?php 			} else {
	
	echo('<h4> No records available</h4> <hr>');
				
				
} ?>
		
		<h4> Add Unit</h4> <hr>
			<form id="uniz">
		
			
			<div class="form-group">
							   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pname">Name<span class="required">*</span>
                        </label>
							   <div class="col-md-6 col-sm-6 col-xs-12 input-group">
							   
							   <input type="text" name="name"  class="form-control col-md-7 col-xs-12"  placeholder="Unit name">
							   
					
                        </div>
                      </div>
                      <br>
                  <div class="form-group">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pname">IT Students<span class="required">*</span>
                        </label>
					  <div class="col-md-12 col-sm-12 col-xs-12">
						  <textarea  id="ball"name="itb" class="resizable_textarea form-control editor-wrapper" placeholder="Names of those on IT, each seperated by a comma"></textarea>
                    </div>
                  </div>
            
                  <div class="form-group">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pname">Offices in unit<span class="required">*</span>
                        </label>
					  <div class="col-md-12 col-sm-12 col-xs-12">
						  <textarea id="balla" name="office" class="resizable_textarea form-control editor-wrapper" placeholder="Offices in unit,  each seperated by a comma"></textarea>
                    </div>
                  </div>
            
                 
                      <br>
                      
                         <div class="ln_solid"></div>
                         <br>
                      	<div class="form-group">
							  <input name="a" type="hidden" value="<?php echo($krypton->encrypt('newunit'))?>">
							  <input name="u" type="hidden" value="set">
							   <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
							   <br>
							   <button class="btn btn-primary" id="diexinvad1" type="button" onClick="uniz()"><i class="fa fa-cog"></i> Save unit </button>
							   
						
                        </div>
                      </div>
                      
                      </form>
                      
                      	<script>
							
															$('#balla').on('change, keyup', function() {
    var currentInput = $(this).val();
    var fixedInput = currentInput.replace(/[^A-Za-z ,:]/g, '');
    $(this).val(fixedInput);
    //console.log(fixedInput);
});
															$('#ball').on('change, keyup', function() {
    var currentInput = $(this).val();
    var fixedInput = currentInput.replace(/[^A-Za-z ,:]/g, '');
    $(this).val(fixedInput);
    //console.log(fixedInput);
});
						function uniz() {
							document.getElementById("diexinvad1").disabled="disabled";
							$("#diexinvad1").html('<span class="fa fa-circle-o-notch fa-spin"></span>');
							var data = $("#uniz").serialize();
							jQuery.ajax({
								url: "<?php echo(loader); ?>",
								data:data,
								type: "POST",
								success:function(data){
									if(data==1){
										new PNotify({
											title: 'Operation Successful',
											text: '',
											type: 'success',
											nonblock: {
												nonblock: true
											},
											styling: 'bootstrap3'
										});
										$("#diexinvad1").html('<span class="fa fa-cog"> </span> Generate');
										document.getElementById("diexinvad1").disabled="";
										
												$.ajax({
			url: "1261622387512781028128758912875128712581258",
			data: {u:'set', a:'<?php echo($krypton->encrypt('coupons'))?>'},
			type: "POST",
			success: function (result) {
				$("#atl").html('');
				$('.adt').html(result);
			},
			error:function (){
				$("#atl").html('');
				new PNotify({
					title: 'Load Error',
					text: 'OOpse! Something went wrong, please check your internet connection and reload the page',
					type: 'error',
					styling: 'bootstrap3'
				});
			}
		});
									} else {
										document.getElementById("diexinvad1").disabled="";
										$("#diexinvad1").html('<span class="fa fa-cog"></span> Generate');
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
									$("#diexinvad1").html('<span class="fa fa-cog"></span> Generate');
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
			 <hr>
			<?php
					 
		
			
			break;
			
		case "editunit":
			
				$stmt = $db_con->prepare("SELECT * FROM diex_unit WHERE id=:id ORDER BY id DESC");
			$stmt->execute(['id' => $_POST['j']]);
			$count = $stmt->rowCount();
			$row = $stmt->fetch(); 
			
			?>
			
			<h4> Edit <?php echo($row['name']) ; ?> Unit</h4> <hr>
			<form id="uniz">
		
			
			<div class="form-group">
							   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pname">Name<span class="required">*</span>
                        </label>
							   <div class="col-md-6 col-sm-6 col-xs-12 input-group">
							   
							   <input type="text" name="name"  class="form-control col-md-7 col-xs-12" value="<?php echo($row['name']) ; ?>"  placeholder="Unit name">
							   
					
                        </div>
                      </div>
                      <br>
                  <div class="form-group">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pname">IT Students<span class="required">*</span>
                        </label>
					  <div class="col-md-12 col-sm-12 col-xs-12">
						  <textarea id="balla" name="itb" class="resizable_textarea form-control editor-wrapper" placeholder="Names of those on IT, each seperated by a comma"><?php echo($row['itb']) ; ?></textarea>
                    </div>
                  </div>
            
                  <div class="form-group">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pname">Offices in unit<span class="required">*</span>
                        </label>
					  <div class="col-md-12 col-sm-12 col-xs-12">
						  <textarea id="ball" name="office" class="resizable_textarea form-control editor-wrapper" placeholder="Offices in unit, each seperated by a comma"><?php echo($row['ofice']) ; ?></textarea>
                    </div>
                  </div>
            
                 
                      
                      
                         <div class="ln_solid"></div>
                      	<div class="form-group">
							  <input name="a" type="hidden" value="<?php echo($krypton->encrypt('upunit'))?>">
							  <input name="j" type="hidden" value="<?php echo($krypton->encrypt($row['id']))?>">
							  <input name="u" type="hidden" value="set">
							   <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
							   <br>
							   <button class="btn btn-primary" id="diexinvad1" type="button" onClick="saveun()"><i class="fa fa-cog"></i> Save unit </button>
							   
						
                        </div>
                      </div>
                      
                      </form>
                      
                      	<script>
							
															$('#balla').on('change, keyup', function() {
    var currentInput = $(this).val();
    var fixedInput = currentInput.replace(/[^A-Za-z ,:]/g, '');
    $(this).val(fixedInput);
    //console.log(fixedInput);
});
							
															$('#ball').on('change, keyup', function() {
    var currentInput = $(this).val();
    var fixedInput = currentInput.replace(/[^A-Za-z ,:]/g, '');
    $(this).val(fixedInput);
    //console.log(fixedInput);
});
						function saveun() {
							document.getElementById("diexinvad1").disabled="disabled";
							$("#diexinvad1").html('<span class="fa fa-circle-o-notch fa-spin"></span>');
							var data = $("#uniz").serialize();
							jQuery.ajax({
								url: "<?php echo(loader); ?>",
								data:data,
								type: "POST",
								success:function(data){
									if(data==1){
										new PNotify({
											title: 'Operation Successful',
											text: '',
											type: 'success',
											nonblock: {
												nonblock: true
											},
											styling: 'bootstrap3'
										});
										$("#diexinvad1").html('<span class="fa fa-cog"> </span> Generate');
										document.getElementById("diexinvad1").disabled="";
										
												$.ajax({
			url: "1261622387512781028128758912875128712581258",
			data: {u:'set', a:'<?php echo($krypton->encrypt('coupons'))?>'},
			type: "POST",
			success: function (result) {
				$("#atl").html('');
				$('.adt').html(result);
			},
			error:function (){
				$("#atl").html('');
				new PNotify({
					title: 'Load Error',
					text: 'OOpse! Something went wrong, please check your internet connection and reload the page',
					type: 'error',
					styling: 'bootstrap3'
				});
			}
		});
									} else {
										document.getElementById("diexinvad1").disabled="";
										$("#diexinvad1").html('<span class="fa fa-cog"></span> Generate');
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
									$("#diexinvad1").html('<span class="fa fa-cog"></span> Generate');
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
			 <hr>
			
			<?php
			
			
			break;
		
			
			
		
			
		case 'upunit':
			
				if(empty($_POST['j'])){
				die('are you kidding me?');
			} else{
				$id = check_input($krypton->decrypt($_POST['j']));				
			}
			
			if(empty($_POST['name'])){
				
				die('Enter unit name');
			} else{
				$name = check_input($_POST['name']);
			
				
			}
			if(empty($_POST['itb'])){
				
				die('enter members on IT');
			} else{
				$itb = check_input($_POST['itb']);
			
				
			}
			if(empty($_POST['office'])){
				
				die('enter offices in unit');
			} else{
				$ofice = check_input($_POST['office']);
			
				
			}
			
			$data = [
				'name' => $name,
				'itb' => $itb,
				'ofice' =>$ofice,
				'id' =>$id
			];
			
			
			$stmt = $db_con->prepare("UPDATE diex_unit SET name=:name, itb=:itb, ofice=:ofice WHERE id=:id");
			if($stmt->execute($data)){
				die('1');
				} else{

					die("Something went wrong, please check your network and try again");
				}
			
			
			break;	
		case 'newunit':
			
			if(empty($_POST['name'])){
				
				die('Enter unit name');
			} else{
				$name = check_input($_POST['name']);
			
				
			}
			if(empty($_POST['itb'])){
				
				die('enter members on IT');
			} else{
				$itb = check_input($_POST['itb']);
			
				
			}
			if(empty($_POST['office'])){
				
				die('enter offices in unit');
			} else{
				$ofice = check_input($_POST['office']);
			
				
			}
			
			$data = [
				'name' => $name,
				'itb' => $itb,
				'ofice' =>$ofice
			];
			
			
			$stmt = $db_con->prepare("INSERT INTO diex_unit (name, itb, ofice) VALUES (:name, :itb, :ofice)");
			if($stmt->execute($data)){
				die('1');
				} else{

					die("Something went wrong, please check your network and try again");
				}
			
			
			break;	
			
			
		case 'savemail':
			
			if(empty($_POST['fname'])){
				
				die('Please enter fullname');
			} else{
				
				$name = check_input($_POST['fname']);
				
			}
			if(empty($_POST['user'])){
				
				die('Please enter  username');
			} else{
				
				$user = check_input($_POST['user']);
				
			}
			if(empty($_POST['pass'])){
				
				die('Please enter  password');
			} else{
				
				$pass = md5(check_input($_POST['pass']));
				
			}
			if(empty($_POST['unit'])){
				
				die('Please enter units');
			} else{
				
				$unit = check_input($_POST['unit']);
				
			}
			
			   $data = [
        "fname" => $name,
        "pass" => $pass,
        "user" => $user,
        "unit" => $unit
      ];



        $stmt = $db_con->prepare("INSERT INTO diex_user (fname, pazz, uname,unit) VALUES (:fname, :pass, :user, :unit) ");		
				if($stmt->execute($data)){

					die('1');
				} else{

					die("Something went wrong, please check your network and try again");
				}
			
			
			break;	
		case 'saveapi':
			
			if(empty($_POST['skey'])){
				
				die('Please enter secret key');
			} else{
				
				$sk = check_input($_POST['skey']);
				
			}
			if(empty($_POST['pkey'])){
				
				die('Please enter secret key');
			} else{
				
				$pk = check_input($_POST['pkey']);
				
			}
			
			   $data = [
        "skey" => $sk,
        "pkey" => $pk,
        "id" => $seid,
      ];



        $stmt = $db_con->prepare("UPDATE diex_set SET pkey=:pkey, skey=:skey WHERE id=:id");		
				if($stmt->execute($data)){

					die('1');
				} else{

					die("Something went wrong, please check your network and try again");
				}
			
			
			break;

			
			
			////////////////////////////////////////
		case 'gen':
			 ?>
			
			  <h3>Add Unit Member</h3>
                 <hr>
			<form id="apiz">
				<div class="form-group">
							   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pname">Full Name <span class="required">*</span>
                        </label>
							   <div class="col-md-6 col-sm-6 col-xs-12 input-group">
							   
							   <input type="text" name="fname" class="form-control col-md-7 col-xs-12"  placeholder="Full Name">
					
                        </div>
                      </div>
				<div class="form-group">
							   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pname">Username <span class="required">*</span>
                        </label>
							   <div class="col-md-6 col-sm-6 col-xs-12 input-group">
							   
							   <input type="text" name="user" class="form-control col-md-7 col-xs-12"  placeholder="Username">
					
                        </div>
                      </div>
				<div class="form-group">
							   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pname">Password <span class="required">*</span>
                        </label>
							   <div class="col-md-6 col-sm-6 col-xs-12 input-group">
							   
							   <input type="text" name="pass" class="form-control col-md-7 col-xs-12" placeholder="Password">
					
                        </div>
                      </div>
				<div class="form-group">
							   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pname">Units <span class="required">*</span>
                        </label>
							   <div class="col-md-6 col-sm-6 col-xs-12 input-group">
							   
							   <input type="text" name="unit" class="form-control col-md-7 col-xs-12"  placeholder="Units">
					
                        </div>
                      </div>
                      
                               <div class="col-md-3 col-sm-3 col-xs-3">
                        <h4  >Unit codes <span class="required">*</span>
                        </h4>
                        <div >
                          <?php echo(unitcode()) ; ?>
                        </div>
                      </div>
                      
                      
				<div class="ln_solid"></div>
                      	<div class="form-group">
							  <input name="a" type="hidden" value="<?php echo($krypton->encrypt('savemail'))?>">
							  <input name="u" type="hidden" value="set">
							   <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
							   <button class="btn btn-primary" id="diexinvad1" type="button" onClick="saveapi()"><i class="fa fa-cog"></i> Save </button>
							</div>
				</div>
</form>

					<script>
						function saveapi() {
							document.getElementById("diexinvad1").disabled="disabled";
							$("#diexinvad1").html('<span class="fa fa-circle-o-notch fa-spin"></span>');
							var data = $("#apiz").serialize();
							jQuery.ajax({
								url: "<?php echo(loader); ?>",
								data:data,
								type: "POST",
								success:function(data){
									
										document.getElementById("apiz").reset();
									if(data==1){
										new PNotify({
											title: 'Operation Successful',
											text: 'Member added',
											type: 'success',
											nonblock: {
												nonblock: true
											},
											styling: 'bootstrap3'
										});
										$("#diexinvad1").html('<span class="fa fa-cog"> </span> Save');
										document.getElementById("diexinvad1").disabled="";
									} else {
										document.getElementById("diexinvad1").disabled="";
										$("#diexinvad1").html('<span class="fa fa-cog"></span> Save');
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
									$("#diexinvad1").html('<span class="fa fa-cog"></span> Save');
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
			
			
			<?php
			break;
		
		
				
			
	}
	
}




?>
						   
						    
						   