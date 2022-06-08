
       <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><i class="fa fa-cogs"></i> Settings<small></small></h3> 
              </div>

             
            </div>

            <div class="clearfix"></div>
<hr>
            <div class="row">
              


              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                       </div>
                  
                  <div id="diexloader">
                  <div class="x_content">
                          <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul  class="nav nav-pills " role="tablist">


                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" class="gen" role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-cogs"></i> Add Members <span id="summ"></span></a>
                        </li>



                        <li role="presentation" class=""><a href="#tab_content3" role="tab"  class="coupon"  id="add-tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-bank"></i> Units <span id="coul"></span></a>
                        </li>
                       
                     


                      </ul>

                             <br>
                             
                             
                             <br>
                           
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                           <div class="sum">
                            
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
									if(data==1){
										
										document.getElementById("apiz").reset();
										new PNotify({
											title: 'Operation Successful',
											text: 'Member Added',
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
                           
       
                          
						  </div>

                        </div>





                           <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="add-tab">
<div class="adt">
                          

                    </div>
                   
                           <!-- /page content -->
<script>
	$('.paypi').click(function () {
		$("#apil").html('<span class="fa fa-circle-o-notch fa-spin"></span> ');
		$.ajax({
			url: "1261622387512781028128758912875128712581258",
			data: {u:'set', a:'<?php echo($krypton->encrypt('api'))?>'},
			type: "POST",
			success: function (result) {
				$("#apil").html('');
				$('.adt').html(result);
			},
			error:function (){
				$("#apil").html('');
				new PNotify({
					title: 'Load Error',
					text: 'OOpse! Something went wrong, please check your internet connection and reload the page',
					type: 'error',
					styling: 'bootstrap3'
				});
			}
		});
	}); 
	
	
	$('.plaforms').click(function () {
		$("#atl").html('<span class="fa fa-circle-o-notch fa-spin"></span> ');
		$.ajax({
			url: "1261622387512781028128758912875128712581258",
			data: {u:'set', a:'<?php echo($krypton->encrypt('plaforms'))?>'},
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
	}); 
	
	
	
	$('.act').click(function () {
		$("#jal").html('<span class="fa fa-circle-o-notch fa-spin"></span> ');
		$.ajax({
			url: "1261622387512781028128758912875128712581258",
			data: {u:'set', a:'<?php echo($krypton->encrypt('actions'))?>'},
			type: "POST",
			success: function (result) {
				$("#jal").html('');
				$('.adt').html(result);
			},
			error:function (){
				$("#jal").html('');
				new PNotify({
					title: 'Load Error',
					text: 'OOpse! Something went wrong, please check your internet connection and reload the page',
					type: 'error',
					styling: 'bootstrap3'
				});
			}
		});
	}); 
	
	
	$('.coupon').click(function () {
		$("#coul").html('<span class="fa fa-circle-o-notch fa-spin"></span> ');
		$.ajax({
			url: "1261622387512781028128758912875128712581258",
			data: {u:'set', a:'<?php echo($krypton->encrypt('coupons'))?>'},
			type: "POST",
			success: function (result) {
				$("#coul").html('');
				$('.adt').html(result);
			},
			error:function (){
				$("#coul").html('');
				new PNotify({
					title: 'Load Error',
					text: 'OOpse! Something went wrong, please check your internet connection and reload the page',
					type: 'error',
					styling: 'bootstrap3'
				});
			}
		});
	}); 
	
	$('.mail').click(function () {
		$("#mal").html('<span class="fa fa-circle-o-notch fa-spin"></span> ');
		$.ajax({
			url: "1261622387512781028128758912875128712581258",
			data: {u:'set', a:'<?php echo($krypton->encrypt('mail'))?>'},
			type: "POST",
			success: function (result) {
				$("#mal").html('');
				$('.adt').html(result);
			},
			error:function (){
				$("#mal").html('');
				new PNotify({
					title: 'Load Error',
					text: 'OOpse! Something went wrong, please check your internet connection and reload the page',
					type: 'error',
					styling: 'bootstrap3'
				});
			}
		});
	}); 
		
	$('.gen').click(function () {
		$("#summ").html('<span class="fa fa-circle-o-notch fa-spin"></span> ');
		$.ajax({
			url: "1261622387512781028128758912875128712581258",
			data: {u:'set', a:'<?php echo($krypton->encrypt('gen'))?>'},
			type: "POST",
			success: function (result) {
				$("#summ").html('');
				$('.sum').html(result);
			},
			error:function (){
				$("#summ").html('');
				new PNotify({
					title: 'Load Error',
					text: 'OOpse! Something went wrong, please check your internet connection and reload the page',
					type: 'error',
					styling: 'bootstrap3'
				});
			}
		});
	}); 
	
	
	

</script>
               
                        </div>
                        
                       


                      </div>
                    </div>
                             
                      <div class="clearfix"></div>
                      
               
                
                   
                  </div>
                  
                  
                  <!-- xcontent ends -->
                  </div>
                </div>
              </div>



                     
            </div>
          </div>
        </div>
        <!-- /page content -->

       