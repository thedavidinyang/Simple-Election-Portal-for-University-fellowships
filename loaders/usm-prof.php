  <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><i class="fa fa-user"></i> My Account <small></small></h3>
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
                      <ul  class="nav nav-tabs " role="tablist">


                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-user"></i> My Profile</a>
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
                            <h4><b>My Profile</b></h4>
                            <hr>
                            <p> Full Name: <strong><?php echo(ucwords($me["name"])); ?></strong> </p>
                            <p> Email: <strong><?php echo($me["email"]); ?></strong> </p>
                            <p> Username: <strong><?php echo($me["uname"]); ?></strong> </p>
                            <p> Phone Number: <strong><?php echo($me["phone"]); ?></strong> </p>
                            <p> Current Level: <strong><?php echo($me["lev"]); ?> L</strong> </p>


                        </div>




                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                           <h4><b>Edit Profile</b></h4>
                            <hr>

                        <form id="profile1"  class="form-horizontal "  name="updatedata" >

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3" for="first-name">Full Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-3"  placeholder="Enter your full name" value="<?php echo(ucwords($me["name"])); ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="phone" type="text"  name="email"  placeholder="Enter your email" class="form-control col-md-7 col-xs-12" value="<?php echo($me["email"]); ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Phone <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="phone" type="number"  name="number"  placeholder="Enter phone number" class="form-control col-md-7 col-xs-12" value="<?php echo($me["phone"]); ?>">
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-3 col-md-offset-3">
                          <button type="button" class="btn btn-primary" onclick="profvend1()" id="diexinvad1" > <i class="fa fa-check-circle"></i> Save</button>
                        </div>
                      </div>
                      <input type="hidden" name="u" value="usm-bts" >

                    <input type="hidden" name="a" value="<?php echo $krypton->encrypt("edit_profile") ; ?>" >


                    </form>
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









                        <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="profile-tab">


                            <h4><b>Change Password</b></h4>
                            <hr>


                         <form id="profile4"  data-parsley-validate class="form-horizontal " >

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3" >Current Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password"  name="cp" required="required" class="form-control col-md-7 col-xs-3" placeholder="Enter current password">
                        </div>
                      </div>
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
                             <input type="hidden" name="u" value="usm-bts" >
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





                  </div>


                  <!-- xcontent ends -->
                  </div>
                </div>
              </div>




            </div>
          </div>
        </div>
        <!-- /page content -->
