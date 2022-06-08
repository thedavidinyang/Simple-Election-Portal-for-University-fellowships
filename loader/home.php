  <body id="page-top" class="  pace-done"><div class="pace  pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
  <div class="pace-progress-inner"></div>
</div>
<div class="pace-activity"></div></div>
    
    
<div class="diex-page-now">
    <header class="masthead">
      <div class="container h-100">
        <div class="row h-100">
          <div class="col-lg-7 my-auto center">
            <div class="header-content mx-auto">
              
              <br>
              <br>
               <div class=" col-md-12 col-lg-12 ">
                <div class="panel panel-default text-center shadz">
                    <div class="panel-heading">
                      
                <img src="<?php echo($base_url) ; ?>/images/logo.JPG" height="200px">
                <hr>
                <h4>Election  Portal</h4>
                </div>
                    <div class="panel-body ">
                    
<div id="login_form" style="padding: 20px">
  
      
      <form id="ldm-login">
      
      
      
        <div class="form-group ">
        <input type="username" class="form-control" placeholder="Username" name="username">
        <span id="check-e"></span>
        </div>
        
        <div class="form-group ">
        <input type="password" class="form-control" placeholder="Password" name="password">
        </div>
       
     	<hr>
        
        <div class="form-group">
            <button type="button" class="btn btn-danger" name="btn-login" id="btn-login" onclick="login()">
    		<i class="fa fa-lock"></i> Sign In
			</button> 
             
        </div>  
      
      </form>
      
      
<script>
//load page messages services
function login() {
		
	
	document.getElementById("btn-login").disabled="disabled";

	$("#btn-login").html('<i class="fa fa-circle-o-notch fa-spin"></i>');
	
	
		var data = $("#ldm-login").serialize();
	jQuery.ajax({
	url: '<?php echo loader ; ?>?u=do_login',
	data:data,
	type: "POST",
	success:function(data){
		
		if(data==1){
						
	new PNotify({
                                  title: '<i class="fa fa-lock"></i> Succesfull',
                                  text: 'You have succesfully signed in',
                                  type: 'success',
                                  styling: 'bootstrap3'
                              });
			   $("#btn-login").html('<span class="fa fa-check"> Redirecting</span>');
			 setTimeout(function(){
									  window.location.href='<?php echo($base_url) ; ?>/dashboard';
                                  }, 2000);
			
			

		} else if(data==2){
			
				document.getElementById("btn-login").disabled="";

				$("#btn-login").html('<i class="fa fa-lock"></i> Sign in');
			
			
			
	new PNotify({
                                  title: '<i class="fa fa-lock"></i> Sign in failed',
                                  text: 'Wrong login details',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });
		
		} else{
			
				document.getElementById("btn-login").disabled="";

				$("#btn-login").html('<i class="fa fa-lock"></i> Sign in');
			
			
			
	new PNotify({
                                  title: '<i class="fa fa-lock"></i> Sign in failed',
                                  text: 'Please check your login details and try again'+data,
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });
		
		};
		
	},
	error:function (){
		document.getElementById("btn-login").disabled="";
		
				$("#btn-login").html('<i class="fa fa-lock"></i> Sign in');
		
	new PNotify({
                                  title: 'Load Error',
                                  text: 'Oopse! Something went wrong, please restart application',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });
		
		
	}
	});
}
</script>
     	
     	
      	
            </div>
                        
                    </div>
                
                </div>
                <br>
            </div>
              
              
              
            </div>
          </div>
          
         
        </div>
      </div>
    </header>

    </div>    

