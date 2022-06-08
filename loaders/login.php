<body class="masthead">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      

      <div class="login_wrapper">
      <div class="animate form login_form">
          <section class="login_content">
              <div id="loadsig" class="text-center shadz" style="padding: 20px; border-radius: 10px">
            <form id="sign-in-diex">
				<img src="<?php echo($base_url) ; ?>/images/logo.svg" height="200px">
				<h1 style="color: #3f73c2">Sign In  </h1>
              <div>
                <input type="text" name="usr" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" name="pwr" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
				  <button class="btn btn-default " type="button"  id="lgin" onClick="loadsignlock()"><i class="fa fa-lock"></i> Sign in</button>
                  
                  <a href="#signup" class="to_register" id="srup" > <button class="btn btn-default "  type="button"  >
                  <i class="fa fa-user"></i> Sign Up</button> </a>
                  
                       
               
               <script>
					 
					function loadsignlock() {
                            document.getElementById("signup").disabled="disabled";
                            document.getElementById("srup").disabled="disabled";
                            document.getElementById("lgin").disabled="disabled";
                            document.getElementById("fgrt").disabled="disabled";
                            $("#lgin").html('<span class="fa fa-circle-o-notch fa-spin"></span>');
                            var data = $("#sign-in-diex").serialize();
                            jQuery.ajax({
                              url: '<?php echo loader ; ?>?u=do_login',
                              data:data,
                              type: "POST",
                              success:function(data){
                                if(data==1){
                                  new PNotify({
                                    title: 'Sign in  Successful',
                                    text: 'Redirecting',
                                    type: 'success',
                                    nonblock: {
                                      nonblock: true
                                    },
                                    styling: 'bootstrap3'
                                  });
                                  $("#lgin").html('<span class="fa fa-check"> Redirecting</span>');
                                  setTimeout(function(){// wait for 5 secs(2)
                                    location.reload(); // then reload the page.(3)
                                  }, 5000);
                                  //document.getElementById("srinq").disabled="";
                                  //document.getElementById("fgrt").disabled="";
                                } else {
                                  document.getElementById("signup").disabled="";
                                  document.getElementById("srup").disabled="";
                                  document.getElementById("lgin").disabled="";
                                  document.getElementById("fgrt").disabled="";
                                  $("#lgin").html('<i class="fa fa-lock"></i> Sign in');
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
                                    document.getElementById("signup").disabled="";
                                    document.getElementById("srup").disabled="";
                                    document.getElementById("lgin").disabled="";
                                    document.getElementById("fgrt").disabled="";
                                    $("#lgin").html('<i class="fa fa-lock"></i> Sign in');
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
               
               
                <button class="btn btn-warning "  type="button" ><i class="fa fa-refresh"></i>
                
                </i> &nbsp; Forgot Password?</button>
       
               
              </div>

              <div class="clearfix"></div>

             
            </form> 
		  </div> 
           
           
          </section>
        </div>

       
       
      </div>
    </div>
  
    
    
 
</body>
  
   
   